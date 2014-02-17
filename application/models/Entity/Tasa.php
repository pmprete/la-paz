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



}
