<?php

namespace Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Plan de Pago Model
 *
 * @Entity
 * @Table(name="plan-de-pago")
 */
class PlanDePago
{

	/**
     * @OneToMany(targetEntity="Deuda", mappedBy="restructurada_en_plan_de_pago")
     */
	private $deudas_originales;
	
	/**
     * @OneToMany(targetEntity="Deuda", mappedBy="plan_de_pagos)
     */
	private $deudas_restructuradas;
	
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
     * Assign the deuda to a deuda original
     *
     * @param	Entity\Deuda	$deuda
     * @return	void
     */
    public function addDeudaOriginal(\Entity\Tasa $deuda)
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
    public function addDeudaRestrucutrada(\Entity\Tasa $deuda)
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