<?php

namespace Entity;

/**
 * Archivo Model
 *
 * @Entity
 * @Table(name="archivo")
  */
class Archivo
{

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string",  nullable=false)
     */
    protected $file_name;


    /**
     * @var datetime $created_on
     * @Column(type="datetime", nullable=true)  */
    protected $created_on;


    /** @PrePersist */
    function onPrePersist()
    {
        $this->created_on = date('Y-m-d H:i:s');
    }



    public function getId()
    {
        return $this->id;
    }


    /**
     * @param mixed $fileName
     */
    public function setFileName($file_name)
    {
        $this->file_name = $file_name;
    }

    /**
     * @return mixed
     */
    public function getFileName()
    {
        return $this->file_name;
    }


}
