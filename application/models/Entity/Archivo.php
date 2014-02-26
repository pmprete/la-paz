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
     * @Column(type="object",  nullable=false)
     */
    protected $objeto;

    /**
     * @ManyToOne(targetEntity="Deuda")
     * @JoinColumn(name="deuda_id", referencedColumnName="id")
     */
    protected $deuda;

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
     *
     * @param	Entity\Deuda	$deuda
     * @return	void
     */
    public function setDeuda(Entity\Deuda $deuda)
    {
        $this->deuda = $deuda;

        // The association must be defined in both directions
        if ( ! $deuda->getArchivos()->contains($this))
        {
            $deuda->addArchivo($this);
        }
    }
    /**
     * Get group
     *
     * @return Entity\Deuda
     */
    public function getDeuda()
    {
        return $this->deuda;
    }

    /**
     * @param mixed $objeto
     */
    public function setObjeto($objeto)
    {
        $this->objeto = $objeto;
    }

    /**
     * @return mixed
     */
    public function getObjeto()
    {
        return $this->objeto;
    }


}
