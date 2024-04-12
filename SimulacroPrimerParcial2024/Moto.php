<?php

namespace SimulacroPrimerParcial2024;

class Moto
{

    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $porcentajeIncrementoAnual;
    private $activa; //bool (atributo que va a contener un valor true, si la moto está disponible para la venta y false en caso contrario).

    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa)
    {
        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anioFabricacion = $anioFabricacion;
        $this->descripcion = $descripcion;
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
        $this->activa = $activa;

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
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    /**
     * @return mixed
     */
    public function getCosto()
    {
        return $this->costo;
    }

    /**
     * @param mixed $costo
     */
    public function setCosto($costo)
    {
        $this->costo = $costo;
    }

    /**
     * @return mixed
     */
    public function getAnioFabricacion()
    {
        return $this->anioFabricacion;
    }

    /**
     * @param mixed $anioFabricacion
     */
    public function setAnioFabricacion($anioFabricacion)
    {
        $this->anioFabricacion = $anioFabricacion;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getPorcentajeIncrementoAnual()
    {
        return $this->porcentajeIncrementoAnual;
    }

    /**
     * @param mixed $porcentajeIncrementoAnual
     */
    public function setPorcentajeIncrementoAnual($porcentajeIncrementoAnual)
    {
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
    }

    /**
     * @return mixed
     */
    public function getActiva()
    {
        return $this->activa;
    }

    public function getActivaString()
    {
        return $this->activa  === true ? "SI" : "NO";;
    }

    /**
     * @param mixed $activa
     */
    public function setActiva($activa)
    {
        $this->activa = $activa;
    }

    //cantidad de años transcurridos desde que se fabricó la moto
    public function cantidadeAniosMoto(){


    }
    public function darPrecioVenta()
    {
        //realiza el siguiente cálculo: $_venta = $_compra + $_compra * (anio * por_inc_anual)
        $_venta = -1;
        if($this->getActiva()){
            $_compra= $this->getCosto();
            $_anio= $this->cantidadeAniosMoto();
            $_por_inc_anual = $this->getPorcentajeIncrementoAnual();

            $_venta = $_compra + $_compra * ($_anio * $_por_inc_anual);
        }

        return $_venta;
    }

    public function __toString(){
        return "Código: " .$this->getCodigo() . " \n"
            . "Descripcion: " . $this->getDescripcion()  . " \n"
            . "Costo: " . $this->getCosto()  . " \n"
            . "Año Fabricación: " . $this->getAnioFabricacion()  . " \n"
            . "% incrementa anual: " . $this->getPorcentajeIncrementoAnual()  . " \n"
            . "Activa: " . $this->getActivaString();
    }

}
