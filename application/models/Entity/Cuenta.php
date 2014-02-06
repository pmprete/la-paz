<?php

namespace Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * User Model
 *
 * @Entity
 * @Table(name="cuenta")
 */
class Cuenta
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
    protected $saldo;


    /**
     * @ManyToOne(targetEntity="Cliente")
     * @JoinColumn(name="cliente_id", referencedColumnName="id")
     */
    protected $cliente;

    /**
     *@OneToMany(targetEntity="Movimiento", mappedBy="cuenta")
     */
    protected $movimientos;

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
     * @return decimal
     */
    public function getSaldo()
    {
        return $this->saldo;
    }


    /**
     * Assign the cuenta to a cliente
     *
     * @param	Entity\Cliente	$cliente
     * @return	void
     */
    public function setCliente(Cliente $cliente)
    {
        $this->group = $cliente;

        // The association must be defined in both directions
        if ( ! $cliente->getCuentas()->contains($this))
        {
            $cliente->addCuenta($this);
        }
    }

    /**
     * Get cliente
     *
     * @return Entity\Cliente
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Add movimiento
     *
     * @param Entity\Movimiento $movimiento
     * @return Cuenta
     */
    public function addMovimiento(\Entity\Movimiento $movimiento)
    {
        $this->movimientos[] = $movimiento;
        return $this;
    }

    /**
     * Get movimientos
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getMovimientos()
    {
        return $this->movimientos;
    }
}
