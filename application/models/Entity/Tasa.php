<?php

namespace Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Tasa Model
 *
 * @Entity
 * @Table(name="tasa")
 */
class Tasa
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
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @var datetime $created_on
     * @Column(type="datetime", nullable=true)
     */
    protected $created_on;


    /** @PrePersist */
    function onPrePersist()
    {
        $this->created_on = date('Y-m-d H:i:s');
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
