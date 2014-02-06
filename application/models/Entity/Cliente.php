<?php

namespace Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * User Model
 *
 * @Entity
 * @Table(name="cliente")
 */
class Cliente
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
     * @Column(type="string", length=100, nullable=false)
     */
    protected $calle;

    /**
     * @Column(type="int", nullable=true)
     */
    protected $altura;

    /**
     * @Column(type="string", length=50, nullable=false)
     */
    protected $piso;

    /**
     * @Column(type="int", nullable=true)
     */
    protected $telefono_fijo;

    /**
     * @Column(type="int", nullable=true)
     */
    protected $telefono_movil;

    /**
     * @OneToMany(targetEntity="Cuenta", mappedBy="cliente")
     */
    protected $cuentas;

    /**
     * Initialize any collection properties as ArrayCollections
     *
     * http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/reference/association-mapping.html#initializing-collections
     *
     */
    public function __construct()
    {
        $this->cuentas = new ArrayCollection;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add users
     *
     * @param Entity\Cuenta $cuenta
     * @return Cliente
     */
    public function addCuenta(\Entity\Cuenta $cuenta)
    {
        $this->cuentas[] = $cuenta;
        return $this;
    }

    /**
     * Get users
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->cuentas;
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