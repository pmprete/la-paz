<?php

namespace Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Deuda Model
 *
 * @Entity
 * @Table(name="deuda")
 */
class Deuda
{

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=255, nullable=true)
     */
    protected $detalle;

    /**
     * @Column(type="decimal", precision=10, scale=2, nullable=false)
     */
    protected $importe;
	
	 /**
     * @Column(type="decimal", precision=10, scale=2, nullable=false)
     */
    protected $multa;
	
	 /**
     * @Column(type="decimal", precision=10, scale=2, nullable=false)
     */
    protected $recargo;
	
	/**
     * @Column(type="integer", nullable=false)
     */
    protected $atraso;

    /**
     * @Column(type="date", nullable=false)
     */
    protected $periodo;
	
	 /**
     * @Column(type="date", nullable=false)
     */
    protected $fecha_vencimiento;

    /**
     * @ManyToOne(targetEntity="Contribuyente")
     * @JoinColumn(name="contribuyente_id", referencedColumnName="id")
     */
    protected $contribuyente;
	
	/**
     * @ManyToOne(targetEntity="PlanDePago")
     * @JoinColumn(name="plan_de_pago_id", referencedColumnName="id")
     */
    protected $plan_de_pago;
	
	/**
     * @ManyToOne(targetEntity="PlanDePago")
     * @JoinColumn(name="restructurada_en_plan_de_pago_id", referencedColumnName="id")
     */
    protected $restructurada_en_plan_de_pago;
	
	 /**
     * @OneToOne(targetEntity="Pago", mappedBy="deuda")
     */
    protected $pago;
	
    /**
     *@OneToMany(targetEntity="Archivo", mappedBy="deuda")
     */
    protected $archivos;

     /**
     * @ManyToOne(targetEntity="Tasa")
     * @JoinColumn(name="tasa_id", referencedColumnName="id")
     */
    protected $tasa;
	
	/**
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @ManyToOne(targetEntity="EstadoDeuda")
     * @JoinColumn(name="estado_deuda_id", referencedColumnName="id")
     */
    protected $estado;

    /**
     * @var datetime $created_on
     * @Column(type="datetime", nullable=false)
     */
    protected $created_on;

    //---------------------Comienzo de Funciones------------------------------------------

    /** @PrePersist */
    function onPrePersist()
    {
        $this->created_on = date('Y-m-d H:i:s');
    }

    /**
     * Initialize any collection properties as ArrayCollections
     *
     * http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/reference/association-mapping.html#initializing-collections
     *
     */
    public function __construct()
    {
        $this->movimiento = new ArrayCollection;
        $this->tasas = new ArrayCollection;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add archivo
     *
     * @param \Entity\Archivo $archivo
     * @return Archivo
     */
    public function addArchivo(\Entity\Archivo $archivo)
    {
        $this->archivos[] = $archivo;
        return $this;
    }

    /**
     * Get archivos
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getArchivos()
    {
        return $this->archivos;
    }


    /**
     * Assign the tasa to a deuda
     *
     * @param	\Entity\Tasa	$tasa
     * @return	void
     */
    public function setTasa(\Entity\Tasa $tasa)
    {
        $this->tasa = $tasa;
    }

   /** Get deudas
     *
     * @return \Entity\Tasa
     */
    public function getTasa()
    {
        return $this->tasa;
    }
    
	/**
     * Assign the deuda to a plan de pago
     *
     * @param	\Entity\PlanDePago	$plan_de_pago
     * @return	void
     */
    public function setPlanDePago(\Entity\PlanDePago $plan_de_pago)
    {
        $this->plan_de_pago = $plan_de_pago;

        // The association must be defined in both directions
        if ( ! $plan_de_pago->getDeudasRestructuradas()->contains($this))
        {
            $plan_de_pago->addDeudaRestructurada($this);
        }
    }

   /** Get RestrucutradaEnPlanDePago
     *
     * @return \Entity\PlanDePago
     */
    public function getRestrucutradaEnPlanDePago()
    {
        return $this->restructurada_en_plan_de_pago;
    }
	
	/**
     * Assign the deuda to a restrcutracion de plan de pago
     *
     * @param	\Entity\PlanDePago	$plan_de_pago
     * @return	void
     */
    public function setRestrucutradaEnPlanDePago(\Entity\PlanDePago $plan_de_pago)
    {
        $this->restructurada_en_plan_de_pago = $plan_de_pago;

        // The association must be defined in both directions
        if ( ! $plan_de_pago->getDeudasOriginales()->contains($this))
        {
            $plan_de_pago->addDeudaOriginal($this);
        }
    }

   /** Get PlanDePago
     *
     * @return \Entity\PlanDePago
     */
    public function getPlanDePago()
    {
        return $this->plan_de_pago;
    }


    /**
     * Assign the deuda to a contribuyente
     *
     * @param	\Entity\Contribuyente	$contribuyente
     * @return	void
     */
    public function setContribuyente(\Entity\Contribuyente $contribuyente)
    {
        $this->contribuyente = $contribuyente;

        // The association must be defined in both directions
        if ( ! $contribuyente->getDeudas()->contains($this))
        {
            $contribuyente->addDeuda($this);
        }
    }

   /** Get Contribuyente
     *
     * @return \Entity\Contribuyente
     */
    public function getContribuyente()
    {
        return $this->contribuyente;
    }

	/**
     * @param \DateTime $fecha
     */
    public function setPeriodo($fecha)
    {
        $this->periodo = $fecha;
    }

    /**
     * @return \DateTime
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }

    /**
     * @param \DateTime $fecha
     */
    public function setFechaVencimiento($fecha)
    {
        $this->fecha_vencimiento = $fecha;
    }

    /**
     * @return \v
     */
    public function getFechaVencimiento()
    {
        return $this->fecha_vencimiento;
    }

    /**
     * @param decimal $importe
     */
    public function setImporte($importe)
    {
        $this->importe = $importe;
    }

    /**
     * @return decimal
     */
    public function getImporte()
    {
        return $this->importe;
    }

    /**
     * @return decimal
     */
    public function getTotal()
    {
        return ($this->importe + $this->recargo);
    }
	
	/**
     * @param decimal $multa
     */
    public function setMulta($multa)
    {
        $this->multa = $multa;
    }

    /**
     * @return decimal
     */
    public function getMulta()
    {
        return $this->multa;
    }
	
	/**
     * @param decimal $recargo
     */
    public function setRecargo($recargo)
    {
        $this->recargo = $recargo;
    }

    /**
     * @return decimal
     */
    public function getRecargo()
    {
        return $this->recargo;
    }
	
	/**
     * @param integer $atraso
     */
    public function setAtraso($atraso)
    {
        $this->atraso = $atraso;
    }

    /**
     * @return integer
     */
    public function getAtraso()
    {
        return $this->atraso;
    }
	
	/**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return EstadoDeuda
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param EstadoDeuda $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
	
	/**
     * @param Pago $pago
     */
    public function setPago($pago)
    {
        $this->pago = $pago;
    }

    /**
     * @return Pago
     */
    public function getPago()
    {
        return $this->pago;
    }
    /**
     * @param string $detalle
     */
    public function setdetalle($detalle)
    {
        $this->detalle = $detalle;
    }

    /**
     * @return date
     */
    public function getDetalle()
    {
        return $this->detalle;
    }


}
