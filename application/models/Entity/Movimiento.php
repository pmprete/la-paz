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
class UserGroup
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
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

}
