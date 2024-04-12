<?php

namespace SimulacroPrimerParcial2024;

class Venta
{
    private $numero;
    private $fecha;
    private $objCliente;
    private $colMotos = [];//coleccion motos
    private $precioFinal;

    public function __construct($numero, $fecha, $objCliente, $colMotos, $precioFinal)
    {
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->objCliente = $objCliente;
        $this->colMotos = $colMotos;
        $this->precioFinal = $precioFinal;
    }


    public function addMonos($moto)
    {
        return array_push($this->colMotos, $moto);
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getReferenciaAlCliente()
    {
        return $this->referenciaAlCliente;
    }

    /**
     * @param mixed $referenciaAlCliente
     */
    public function setReferenciaAlCliente($referenciaAlCliente)
    {
        $this->referenciaAlCliente = $referenciaAlCliente;
    }

    /**
     * @return mixed
     */
    public function getColMotos()
    {
        return $this->colMotos;
    }

    /**
     * @param mixed $colMotos
     */
    public function setColMotos($colMotos)
    {
        $this->colMotos = $colMotos;
    }

    /**
     * @return mixed
     */
    public function getPrecioFinal()
    {
        return $this->precioFinal;
    }

    /**
     * @param mixed $precioFinal
     */
    public function setPrecioFinal($precioFinal)
    {
        $this->precioFinal = $precioFinal;
    }


}