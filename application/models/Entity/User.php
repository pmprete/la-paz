<?php

namespace Entity;

/**
 * User Model
 *
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

	/**
	 * @Column(type="string", length=255, unique=true, nullable=false)
	 */
	protected $email;

	/**
	 * @ManyToOne(targetEntity="UserGroup")
	 * @JoinColumn(name="group_id", referencedColumnName="id")
	 */
	protected $group;

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
	 * Assign the user to a group
	 *
	 * @param	Entity\UserGroup	$group
	 * @return	void
	 */
	public function setGroup(UserGroup $group)
	{
		$this->group = $group;

		// The association must be defined in both directions
		if ( ! $group->getUsers()->contains($this))
		{
			$group->addUser($this);
		}
	}

	/**
	 * Encrypt the password before we store it
	 *
	 * @param	string	$password
	 * @return	void
	 */
	public function setPassword($password)
	{
		$this->password = $this->hashPassword($password);
	}

	/**
	 * Encrypt a Password
	 *
	 * @param	string	$password
	 * @return	string
	 */
	public function hashPassword($password)
	{
		if ( ! $this->username)
		{
			throw new \Exception('The username must be set before the password can be hashed.');
		}

		return hash('sha256', $password . $this->username);
	}

	public function setUsername($username)
	{
		$this->username = $username;
		return $this;
	}

	public function setEmail($email)
	{
		$this->email = $email;
		return $this;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getUsername()
	{
		return $this->username;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * Get group
	 *
	 * @return Entity\UserGroup
	 */
	public function getGroup()
	{
		return $this->group;
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
