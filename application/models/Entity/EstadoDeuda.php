<?php

namespace Entity;

/**
 * User Model
 *
 * @Entity
 * @Table(name="estado_deuda")
 */
class EstadoDeuda
{

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=50, unique=false, nullable=false)
     */
    protected $nombre;

    /**
     * @Column(type="string", length=255, unique=false, nullable=false)
     */
    protected $descripcion;

    /**
     * @param string $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

}
