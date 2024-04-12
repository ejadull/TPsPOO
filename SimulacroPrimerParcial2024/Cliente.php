<?php

namespace SimulacroPrimerParcial2024;

class Cliente
{

    private $nombre;
    private $apellido;
    private $dadoDeBaja;//bool
    private $tipoDni;
    private $numDni;

    public function __construct($nombre, $apellido, $dadoDeBaja, $tipoDni, $numDni)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dadoDeBaja = $dadoDeBaja;
        $this->tipoDni = $tipoDni;
        $this->numDni = $numDni;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @param mixed $apellido
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    /**
     * @return mixed
     */
    public function getDadoDeBaja()
    {
        return $this->dadoDeBaja;
    }

    public function getDadoDeBajaString()
    {
        return $this->dadoDeBaja === true ? "SI" : "NO";
    }

    /**
     * @param mixed $dadoDeBaja
     */
    public function setDadoDeBaja($dadoDeBaja)
    {
        $this->dadoDeBaja = $dadoDeBaja;
    }

    /**
     * @return mixed
     */
    public function getTipoDni()
    {
        return $this->tipoDni;
    }

    /**
     * @param mixed $tipoDni
     */
    public function setTipoDni($tipoDni)
    {
        $this->tipoDni = $tipoDni;
    }

    /**
     * @return mixed
     */
    public function getNumDni()
    {
        return $this->numDni;
    }

    /**
     * @param mixed $numDni
     */
    public function setNumDni($numDni)
    {
        $this->numDni = $numDni;
    }

    public function __toString()
    {
        return $this->getTipoDni() . " : " . $this->getDni() . ",  Nombre: " . $this->getNombre() . ' , Apellido: ' . $this->getApellido() . ' , Activo: ' . $this->getDadoDeBajaString();
    }


}