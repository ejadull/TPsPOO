<?php

class Pasajero
{

    private $nombre;
    private $apellido;
    private $dni;

    private $telefono;

    public function __construct($nombre, $apellido, $dni,$telefono)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->telefono = $telefono;
    }

    public function __destruct()
    {
        $this->nombre = null;
        $this->apellido = null;
        $this->dni = null;
        $this->telefono = null;
    }

    public function __toString()
    {
        return "DNI: " .  $this->getDni() .  ",  Nombre: " . $this->getNombre() . ' , Apellido: ' . $this->getApellido() . ' , Teléfono: ' . $this->getTelefono();
    }


    public function setTelefono()
    {
        return $this->telefono;
    }

    public function getTelefono($telefono)
    {
        $this->telefono = $telefono;
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
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * @param mixed $dni
     */
    public function setDni($dni)
    {
        $this->dni = $dni;
    }

}