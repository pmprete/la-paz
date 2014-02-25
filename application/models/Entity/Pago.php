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
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
	
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