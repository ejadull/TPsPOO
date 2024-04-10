<?php
/*
 * Edgardo Jadull LEG FAI 2022
 */
class ResponsableV
{
    private $numeroEmpleado;
    private $numeroLicencia;
    private $nombre;
    private $apellido;

    public function __construct($numeroEmpleado, $numeroLicencia, $nombre, $apellido)
    {
        $this->numeroEmpleado = $numeroEmpleado;
        $this->numeroLicencia = $numeroLicencia;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }
    public function __destruct()
    {
        $this->numeroEmpleado = null;
        $this->numeroLicencia = null;
        $this->nombre = null;
        $this->apellido = null;
    }

    public function getNumeroEmpleado()
    {
        return $this->numeroEmpleado;
    }

    public function setNumeroEmpleado($numeroEmpleado)
    {
        $this->numeroEmpleado = $numeroEmpleado;
    }

    public function getNumeroLicencia(){
        return $this->numeroLicencia;
    }
    public function setNumeroLicencia($numeroLicencia){
        $this->numeroLicencia = $numeroLicencia;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function __toString()
    {
        return "Nombre: " . $this->getNombre() . ' , Apellido: ' . $this->getApellido() ."\nNum. Empleado: " .  $this->getNumeroEmpleado() .  "\nLicencia: " . $this->getNumeroLicencia();
    }
}