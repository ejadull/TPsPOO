<?php
/*
 * Edgardo Jadull LEG FAI 2022
 */
include_once 'Pasajero.php';
include_once 'ResponsableV.php';
class Viaje
{
    private $codigo;
    private $destino;
    private $cantidadMaximaPasajeros;

    private $responsable;

    // Crear instancias de la clase Pasajero y almacenarlas en un array
    private $pasajeros = [];

    public function __construct()
    {
        $this->codigo=null;
        $this->destino=null;
        $this->responsable=null;
        $this->cantidadMaximaPasajeros=0;
        $this->pasajeros=[];
    }

    public function __destruct()
    {
        $this->codigo=null;
        $this->destino=null;
        $this->responsable=null;
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
    public function setDestino($destino)
    {
        $this->destino = $destino;
    }

    /**
     * @return mixed
     */
    public function getResponsable()
    {
        return $this->responsable;
    }

    /**
     * @param mixed $responsable
     */
    public function setResponsable(ResponsableV $responsable)
    {
        $this->responsable = $responsable;
    }

    public function addResponsable(ResponsableV $responsable)
    {
        $this->responsable = $responsable;
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
    public function setCantidadMaximaPasajeros($cantidadMaximaPasajeros)
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
    public function setPasajeros($pasajeros)
    {
        $this->pasajeros = $pasajeros;
    }

    public function addPasajero(Pasajero $pasajero)
    {
        array_push($this->pasajeros, $pasajero);
    }

    // Crear instancias de la clase Pasajero y almacenarlas en un array

    public function listPasajeros()
    {
        // Acceder a los objetos en el array y mostrar información
        foreach ($this->pasajeros as $pasajero) {
            echo $pasajero->__toString() . "\n";
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
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }


    public function tieneViajeCompleto()
    {
        return !empty($this->codigo) && !empty($this->destino) && $this->cantidadMaximaPasajeros !== 0;// && count($this->pasajeros)>0;
    }

    public function viajeEstaCompleto()
    {
        return $this->cantidadMaximaPasajeros === count($this->pasajeros);
    }

    public function tieneResponsableCompleto()
    {
        return $this->responsable !== null;
    }

    public function existePasajero($dni){
        $result = false;

        foreach ($this->pasajeros as $pasajero) {
            $result =  $pasajero->getDni() === $dni;
            if($result) break;
        }
        return $result;
    }

    public function obtenerPasajero($dni)
    {
        $result = false;

        foreach ($this->pasajeros as $pasajero) {
            if($pasajero->getDni() === $dni){
                $result = $pasajero;
            };
        }

        return $result;
    }

    public function mostrarInformacion(){
        echo "INFORMACION DEL VIAJE.\n";
        echo "CODIGO <". $this->getCodigo() ."> \n";
        echo "DESTINO: " . $this->getDestino() . "\n";
        echo "NUM MAX PASAJEROS: " . $this->getCantidadMaximaPasajeros() ;

        echo "\n\nRESPONSABLE EN VIAJE.\n\n";
        if($this->getResponsable() !== null)
            echo $this->responsable->__toString();

        echo "\n\nPASAJEROS EN VIAJE.\n";
        $this->listPasajeros();
    }
}

