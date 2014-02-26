<?php

namespace Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Pago Model
 *
 * @Entity
 * @Table(name="plan_de_pago")
 */
class PlanDePago
{

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

	/**
     * @OneToMany(targetEntity="Deuda", mappedBy="restructurada_en_plan_de_pago")
     */
	private $deudas_originales;
	
	/**
     * @OneToMany(targetEntity="Deuda", mappedBy="deudas_plan_de_pago")
     */
	private $deudas_restructuradas;

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



    //---------------------Comienzo de Funciones------------------------------------------


	 /**
     * Initialize any collection properties as ArrayCollections
     *
     * http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/reference/association-mapping.html#initializing-collections
     *
     */
    public function __construct()
    {
        $this->deudas_originales = new ArrayCollection;
		$this->deudas_restructuradas = new ArrayCollection;
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

	 /**
     * Assign the deuda to a deuda original
     *
     * @param	Entity\Deuda	$deuda
     * @return	void
     */
    public function addDeudaOriginal(\Entity\Deuda $deuda)
    {
        $this->deudas_originales[] = $deuda;
    }

   /** Get deudas originales
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getDeudasOriginales()
    {
        return $this->deudas_originales;
    }
	
	  /**
     * Assign the deuda to a deuda restrucutrada
     *
     * @param	Entity\Deuda	$deuda
     * @return	void
     */
    public function addDeudaRestrucutrada(\Entity\Deuda $deuda)
    {
        $this->deudas_restructuradas[] = $deuda;
    }

   /** Get deudas restrucutradas
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getDeudasRestucutradas()
    {
        return $this->deudas_restructuradas;
    }
    


}