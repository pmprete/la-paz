<?php

namespace DoctrineProxies\__CG__\Entity;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class User extends \Entity\User implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }

    /** @private */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    
    public function onPrePersist()
    {
        $this->__load();
        return parent::onPrePersist();
    }

    public function setGroup(\Entity\UserGroup $group)
    {
        $this->__load();
        return parent::setGroup($group);
    }

    public function setPassword($password)
    {
        $this->__load();
        return parent::setPassword($password);
    }

    public function hashPassword($password)
    {
        $this->__load();
        return parent::hashPassword($password);
    }

    public function setUsername($username)
    {
        $this->__load();
        return parent::setUsername($username);
    }

    public function setEmail($email)
    {
        $this->__load();
        return parent::setEmail($email);
    }

    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["id"];
        }
        $this->__load();
        return parent::getId();
    }

    public function getUsername()
    {
        $this->__load();
        return parent::getUsername();
    }

    public function getEmail()
    {
        $this->__load();
        return parent::getEmail();
    }

    public function getPassword()
    {
        $this->__load();
        return parent::getPassword();
    }

    public function getGroup()
    {
        $this->__load();
        return parent::getGroup();
    }

    public function setUser($user)
    {
        $this->__load();
        return parent::setUser($user);
    }

    public function getUser()
    {
        $this->__load();
        return parent::getUser();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'username', 'password', 'email', 'created_on', 'group', 'user');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields as $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}