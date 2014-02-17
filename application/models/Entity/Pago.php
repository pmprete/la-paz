<?php

namespace Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Pago Model
 *
 * @Entity
 * @Table(name="pago")
 */
class Pago
{

	/**
	* @OneToOne(targetEntity="Deuda", inversedBy="pago")
	* @JoinColumn(name="pago_id", referencedColumnName="id")
	*/
	private $deuda;
	
	/**
     * @Column(type="date", nullable=false)
     */
    protected $fecha;
	
	/**
     * @param date $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return date
     */
    public function getFecha()
    {
        return $this->fecha;
    }

}