<?php

namespace Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * User Model
 *
 * @Entity
 * @Table(name="contribuyente")
 */
class Contribuyente
{

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=50, nullable=false)
     */
    protected $nombre;

    /**
     * @Column(type="string", length=13, nullable=false)
     */
    protected $cuit;

    /**
     * @Column(type="string", length=50, nullable=false)
     */
    protected $calle;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $altura;

    /**
     * @Column(type="string", length=50, nullable=false)
     */
    protected $piso;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $telefono_fijo;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $telefono_movil;

    /**
     * @OneToMany(targetEntity="Deuda", mappedBy="contribuyente")
     */
    protected $deudas;

    /**
     * Initialize any collection properties as ArrayCollections
     *
     * http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/reference/association-mapping.html#initializing-collections
     *
     */
    public function __construct()
    {
        $this->deudas = new ArrayCollection;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add deuda
     *
     * @param Entity\Deuda $deuda
     * @return Contribuyente
     */
    public function addDeuda(\Entity\Deuda $deuda)
    {
        $this->deudas[] = $deuda;
        return $this;
    }

    /**
     * Get deudas
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getDeudas()
    {
        return $this->deudas;
    }

    /**
     * @param mixed $cuit
     */
    public function setCuit($cuit)
    {
        $this->cuit = $cuit;
    }

    /**
     * @return mixed
     */
    public function getCuit()
    {
        return $this->cuit;
    }

    /**
     * @param mixed $telefono_movil
     */
    public function setTelefonoMovil($telefono_movil)
    {
        $this->telefono_movil = $telefono_movil;
    }

    /**
     * @return mixed
     */
    public function getTelefonoMovil()
    {
        return $this->telefono_movil;
    }

    /**
     * @param mixed $telefono_fijo
     */
    public function setTelefonoFijo($telefono_fijo)
    {
        $this->telefono_fijo = $telefono_fijo;
    }

    /**
     * @return mixed
     */
    public function getTelefonoFijo()
    {
        return $this->telefono_fijo;
    }

    /**
     * @param mixed $piso
     */
    public function setPiso($piso)
    {
        $this->piso = $piso;
    }

    /**
     * @return mixed
     */
    public function getPiso()
    {
        return $this->piso;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $calle
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;
    }

    /**
     * @return mixed
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * @param mixed $altura
     */
    public function setAltura($altura)
    {
        $this->altura = $altura;
    }

    /**
     * @return mixed
     */
    public function getAltura()
    {
        return $this->altura;
    }

}