<?php

namespace Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Inmueble Model
 *
 * @Entity
 * @Table(name="inmueble")
 */
class User
{

	/**
	 * @Id
	 * @Column(type="integer", nullable=false)
	 * @GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
     * @Column(type="string", length=100, nullable=false)
     */
    protected $calle;

    /**
     * @Column(type="int", nullable=true)
     */
    protected $altura;

    /**
     * @Column(type="string", length=50, nullable=true)
     */
    protected $piso;
	
	/**
     * @Column(type="string", length=50, nullable=true)
     */
    protected $seccion;
	
	/**
     * @Column(type="int", nullable=true)
     */
    protected $manzana;
	
	/**
     * @Column(type="int", nullable=true)
     */
    protected $parcela;
	
	/**
     * @ManyToOne(targetEntity="Contribuyente")
     * @JoinColumn(name="contribuyente_id", referencedColumnName="id")
     */
    protected $contribuyente;



	public function getId()
	{
		return $this->id;
	}
	
	/**
     * @param Contribuyente $contribuyente
     */
    public function setContribuyente($contribuyente)
    {
        $this->contribuyente = $contribuyente;
    }

    /**
     * @return contribuyente
     */
    public function getContribuyente()
    {
        return $this->contribuyente;
    }

    /**
     * @param string $calle
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;
    }

    /**
     * @return string
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * @param int $altura
     */
    public function setAltura($altura)
    {
        $this->altura = $altura;
    }

    /**
     * @return int altura
     */
    public function getAltura()
    {
        return $this->altura;
    }
	
	/**
     * @param string $piso
     */
    public function setPiso($piso)
    {
        $this->piso = $piso;
    }

    /**
     * @return string
     */
    public function getPiso()
    {
        return $this->piso;
    }
	
	/**
     * @param string $seccion
     */
    public function setSeccion($seccion)
    {
        $this->seccion = $seccion;
    }

    /**
     * @return string
     */
    public function getSeccion()
    {
        return $this->seccion;
    }
	
	/**
     * @param int $manzana
     */
    public function setManzana($manzana)
    {
        $this->manzana = $manzana;
    }

    /**
     * @return int
     */
    public function getManzana()
    {
        return $this->manzana;
    }
	
	/**
     * @param int $parcela
     */
    public function setParcela($parcela)
    {
        $this->parcela = $parcela;
    }

    /**
     * @return int
     */
    public function getParcela()
    {
        return $this->parcela;
    }
	

}
