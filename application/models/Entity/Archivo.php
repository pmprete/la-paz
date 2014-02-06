<?php

namespace Entity;

/**
 * User Model
 *
 * @Entity
 * @Table(name="user")
 * @author  Joseph Wynn <joseph@wildlyinaccurate.com>
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
     * @Column(type="object",  nullable=false)
     */
    protected $objeto;

    /**
     * @ManyToOne(targetEntity="Movimiento")
     * @JoinColumn(name="movimiento_id", referencedColumnName="id")
     */
    protected $movimiento;


    public function getId()
    {
        return $this->id;
    }

    /**
     * Assign the user to a group
     *
     * @param	Entity\Movimiento	$movimiento
     * @return	void
     */
    public function setMovimiento(\Movimientos $movimiento)
    {
        $this->movimiento = $movimiento;

        // The association must be defined in both directions
        if ( ! $movimiento->getArchivos()->contains($this))
        {
            $movimiento->addArchivo($this);
        }
    }
    /**
     * Get group
     *
     * @return Entity\Movimiento
     */
    public function getMovimiento()
    {
        return $this->movimiento;
    }

    /**
     * @param mixed $objeto
     */
    public function setObjeto($objeto)
    {
        $this->objeto = $objeto;
    }

    /**
     * @return mixed
     */
    public function getObjeto()
    {
        return $this->objeto;
    }


}
