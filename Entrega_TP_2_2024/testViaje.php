<?php
/*
 * Edgardo Jadull LEG FAI 2022
 */
include_once 'Pasajero.php';
include_once 'Viaje.php';
include_once 'ResponsableV.php';



function procesarViaje(&$viaje)
{
    $terminar = false;

    while (!$terminar) {

        echo "Ingresar una código de viaje.\n";
        $_codigo = trim(fgets(STDIN));
        echo "Ingresar una destino de viaje.\n";
        $_destino = trim(fgets(STDIN));

        $_cantidadMaximaPasajeros = false;
        while (!is_numeric($_cantidadMaximaPasajeros)) {
            echo "Ingresar una cantidad máxima de pasajeros para este viaje.\n";
            $_cantidadMaximaPasajeros = trim(fgets(STDIN));
        }

        $viaje->setCodigo($_codigo);
        $viaje->setDestino($_destino);
        $viaje->setCantidadMaximaPasajeros(intval($_cantidadMaximaPasajeros));
        $terminar = true;

    }
}

function procesarResponsable(&$viaje)
{
    if ($viaje->tieneResponsableCompleto()) {
        echo "Ya existe un responsable paara este viaje. Se reemplazará la información del actual.\n";
    }
    $terminar = false;

    while(!$terminar) {

        echo "CARGAR RESPONSABLE.\n";
        echo "Nombre:\n";
        $_nombre = trim(fgets(STDIN));
        echo "Apellido:\n";
        $_apellido = trim(fgets(STDIN));

        $_numeroEmpleado=false;
        while(!is_numeric($_numeroEmpleado)){
            echo "Número de empleado:\n";
            $_numeroEmpleado = trim(fgets(STDIN));
        }

        $_numeroLicencia=false;
        while(!is_numeric($_numeroLicencia)){
            echo "Número de licencia.\n";
            $_numeroLicencia = trim(fgets(STDIN));
        }

        $responsable = new \ResponsableV($_numeroEmpleado, $_numeroLicencia, $_nombre, $_apellido);
        $viaje->setResponsable( $responsable);
        $terminar = true;
    }
    var_dump($viaje);
}

function procesarPasajero(&$viaje)
{
    if (!$viaje->tieneViajeCompleto()) {
        echo "Debe ingresar primero un los datos de un para un viaje.\n";
    } elseif ($viaje->viajeEstaCompleto()){
        echo "No es posible agregar más pasajeros. El viaje  se completo para un máximo de ".$viaje->getCantidadMaximaPasajeros().".\n";
    } else{
        $terminar = false;

        while(!$terminar) {

            echo "Nombre del pasajero.\n";
            $_nombre = trim(fgets(STDIN));
            echo "Apellido del pasajero.\n";
            $_apellido = trim(fgets(STDIN));

            $_dni=false;
            while(!is_numeric($_dni)){
                echo "DNI del pasajero.\n";
                $_dni = trim(fgets(STDIN));
            }
            $_telefono=false;
            while(!is_numeric($_telefono)){
                echo "Teléfono del pasajero.\n";
                $_telefono = trim(fgets(STDIN));
            }

            if($viaje->existePasajero( $_dni)){
                echo "El pasajero con ese DNI ya existe en este viaje.\n";
                $pasajero = $viaje->obtenerPasajero($_dni);
                echo "Los datos de ese DNI son:\n";
                echo $pasajero->__toString(). "\n";
            }else{
                $pasajero = new \Pasajero($_nombre,$_apellido,$_dni,$_telefono);
                $viaje->addPasajero( $pasajero);
                echo "El pasajero se agregó con éxito en este viaje.\n";
            }

            $terminar = true;
        }
    }
}


function procesarBusqueda(&$viaje)
{
    $terminar = false;

    while(!$terminar) {

        $_dni=false;
        while(!is_numeric($_dni)){
            echo "DNI del pasajero.\n";
            $_dni = trim(fgets(STDIN));
        }

        if($viaje->existePasajero( $_dni)){
            $pasajero = $viaje->obtenerPasajero($_dni);
            echo "Los datos de ese DNI son:\n";
            echo $pasajero->__toString(). "\n";
        }else{
            echo "El DNI no existe en este viaje.\n";
        }
        $terminar = true;
    }
}


/*
 * Realiza el procesamiento de la opción seleccionada
 *
 * @param int $opcion opción seleccionada del menú
 * @return void
 */
function procesar(&$viaje, $opcion){


    switch ($opcion) {
        case 1:
            procesarViaje($viaje);
            break;

        case 2:
            procesarResponsable($viaje);

            break;
        case 3:
            procesarPasajero($viaje);
            break;
        case 4:
            procesarBusqueda($viaje);
            break;
        case 5:
            $viaje->mostrarInformacion();
            break;
        case 6:
            echo "PASAJEROS EN VIAJE.\n";
            $viaje->listPasajeros();
            break;
        case 99:
            //debug

            break;
        default:
            # code...
            break;
    }
}


function menuOpciones(&$viaje, $opcion){
    $opciones = [1,2,3,4,5,6,7];
    //bool in_array ( mixed $needle , array $haystack [, bool $strict = FALSE ] )
    if(in_array($opcion, $opciones)){
        procesar($viaje,$opcion);
    } else {
        echo "La opción no se encuentra en el menú.\n";
    }
}

/*
 * Menu de opciones de usuario
 *
 * @return void
 */
function mostrarMenu(){
    echo "\n";
    echo "1.- Ingresar un nuevo viaje.\n";
    echo "2.- Ingresar responsable.\n";
    echo "3.- Ingresar pasajero.\n";
    echo "4.- Buscar pasajero por DNI.\n";
    echo "5.- Mostrar info del viaje.\n";
    echo "6.- Listar pasajeros del viaje.\n";
    echo "7.- Salir.\n";
}

/*
 * Programa principal que realiza la inicializacion de estructuras y despliega el menu de usuario
 *
 * @return void
 */
function programaPrincipal(){
    $terminar = false;
    $viaje = new \Viaje();

    echo "\n\nBienvenido a VIAJE FELIZ :: Transporte de Pasajeros\n";
    echo "Ingrese una opción del menú: \n\n";

    while(!$terminar){

        mostrarMenu();

        $opcion = trim(fgets(STDIN));
        if(is_numeric($opcion)){
            $terminar = $opcion == 7;
            if(!$terminar){
                menuOpciones( $viaje, $opcion);
            }
        } else {
            echo "Ingresar una opción válida.\n";
        }
    }

}


programaPrincipal();