<?php

namespace Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Tasa Model
 *
 * @Entity
 * @Table(name="tasa")
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
	 * @Column(type="string", length=32, unique=true, nullable=false)
	 */
	protected $nombre;

	/**
	 * @Column(type="string", length=255, nullable=false)
	 */
	protected $descripcion;

	 /**
          * @ManyToMany(targetEntity="Deuda", mappedBy="tags")
          */
	protected $deudas;
	

	public function __construct() {
	        $this->deudas = new ArrayCollection;
	    }

	/**
	 * Assign the user to a group
	 *
	 * @param	Entity\Deuda	$deuda
	 * @return	void
	 */
	public function setDeuda(Deuda $deuda)
	{
		$this->deudas[] = $deuda;
	}

	/**
	 * Encrypt the password before we store it
	 *
	 * @param	string	$nombre
	 * @return	void
	 */
	public function setNombre($nombre)
	{
		$this->nombre = $this->hashPassword($nombre);
	}

	
	public function setDescripcion($descripcion)
	{
		$this->descripcion = $descripcion;
	}


	public function getId()
	{
		return $this->id;
	}

	public function getNombre()
	{
		return $this->nombre;
	}

	public function getDescripcion()
	{
		return $this->descripcion;
	}

	/**
	 * Get group
	 *
	 * @return Entity\Deuda
	 */
	public function getDeudas()
	{
		return $this->deudas;
	}

}
