<?php

include_once 'Pasajero.php';
class Viaje
{
    private $codigo;
    private $destino;
    private $cantidadMaximaPasajeros;

    // Crear instancias de la clase Pasajero y almacenarlas en un array
    private $pasajeros = [];


    public function __construct()
    {
        $this->pasajeros=[];
        $this->codigo="N/A";
        $this->destino="N/A";
        $this->cantidadMaximaPasajeros=0;
    }


    public function __construct($codigo, $destino, $cantidadMaximaPasajeros, $pasajeros)
    {
        $this->pasajeros=$pasajeros;
        $this->codigo=$codigo;
        $this->destino=$destino;
        $this->cantidadMaximaPasajeros=$cantidadMaximaPasajeros;
    }

    public function __destruct()
    {
        $this->codigo=null;
        $this->destino=null;
        $this->cantidadMaximaPasajeros=0;
        $this->pasajeros=[];
    }

    /**
     * @return mixed
     */
    public function getDestino()
    {
        return $this->destino;
    }

    /**
     * @param mixed $destino
     */
    public function setDestino($destino): void
    {
        $this->destino = $destino;
    }

    /**
     * @return mixed
     */
    public function getCantidadMaximaPasajeros()
    {
        return $this->cantidadMaximaPasajeros;
    }

    /**
     * @param mixed $cantidadMaximaPasajeros
     */
    public function setCantidadMaximaPasajeros($cantidadMaximaPasajeros): void
    {
        $this->cantidadMaximaPasajeros = $cantidadMaximaPasajeros;
    }

    /**
     * @return mixed
     */
    public function getPasajeros()
    {
        return $this->pasajeros;
    }

    /**
     * @param mixed $pasajeros
     */
    public function setPasajeros($pasajeros): void
    {
        $this->pasajeros = $pasajeros;
    }

    public function addPasajero(Pasajero $pasajero): void
    {
        array_push($this->pasajeros, $pasajero);
    }

    // Crear instancias de la clase Pasajero y almacenarlas en un array

    public function listPasajeros(): void
    {
        // Acceder a los objetos en el array y mostrar información
        foreach ($this->pasajeros as $pasajero) {
            echo $pasajero->__toString() . "<br>";
        }
    }

    /**
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param mixed $codigo
     */
    public function setCodigo($codigo): void
    {
        $this->codigo = $codigo;
    }
}
