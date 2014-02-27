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
    protected $deuda;
	
	/**
     * @Column(type="date", nullable=false)
     */
    protected $fecha_pago;

    /**
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;


    /**
     * @var datetime $created_on
     * @Column(type="datetime", nullable=true)  */
    protected $created_on;


    /** @PrePersist */
    function onPrePersist()
    {
        $this->created_on = date('Y-m-d H:i:s');
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
     * @param DateTime $fecha
     */
    public function setFechaPago($fecha)
    {
        $this->fecha_pago = $fecha;
    }

    /**
     * @return DateTime
     */
    public function getFechPago()
    {
        return $this->fecha_pago;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

}