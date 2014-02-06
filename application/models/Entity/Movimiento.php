<?php

namespace Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * User Group Model
 *
 * @Entity
 * @Table(name="movimiento")
 * @author  Joseph Wynn <joseph@wildlyinaccurate.com>
 */
class Movimiento
{

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="decimal", precision=2, scale=1, nullable=false)
     */
    protected $importe;

    /**
     * @Column(type="date", nullable=false)
     */
    protected $fecha;

    /**
     * @ManyToOne(targetEntity="Cuenta")
     * @JoinColumn(name="cuenta_id", referencedColumnName="id")
     */
    protected $cuenta;

    /**
     *@OneToMany(targetEntity="Archivos", mappedBy="movimiento")
     */
    protected $archivos;

    /**
     * Initialize any collection properties as ArrayCollections
     *
     * http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/reference/association-mapping.html#initializing-collections
     *
     */
    public function __construct()
    {
        $this->movimiento = new ArrayCollection;
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
     * @param Entity\Archivo $archivo
     * @return Movimiento
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
     * Assign the movimiento to a cuenta
     *
     * @param	Entity\Cuenta	$cuenta
     * @return	void
     */
    public function setCuenta(Cuenta $cuenta)
    {
        $this->cuenta = $cuenta;

        // The association must be defined in both directions
        if ( ! $cuenta->getMovimientos()->contains($this))
        {
            $cuenta->addCuenta($this);
        }
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $importe
     */
    public function setImporte($importe)
    {
        $this->importe = $importe;
    }

    /**
     * @return mixed
     */
    public function getImporte()
    {
        return $this->importe;
    }



}
