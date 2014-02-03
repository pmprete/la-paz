<?php

namespace Entity;

/**
 * @Entity
 * @Table(name="user")
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
    protected $username;

    /**
     * @Column(type="string", length=64, nullable=false)
     */
    protected $password;
	
	public function getId()
	{
		return $this->id;
	}
	
	public function setUsername($username)
	{
		$this->username = $username;
	}

	public function getUsername()
	{
		return $this->username;
	}
	
	public function setPassword($password)
	{
		$this->password = $password;
	}

	public function getPassword()
	{
		return $this->password;
	}


}