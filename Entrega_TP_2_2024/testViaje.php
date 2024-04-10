<?php

include_once 'Pasajero.php';
include_once 'Viaje.php';


/*
 * Realiza el procesamiento de la opción seleccionada
 *
 * @param int $opcion opción seleccionada del menú
 * @return void
 */
function procesar(&$viaje, $opcion){


    switch ($opcion) {
        case 1:
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
            break;
        case 2:
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
                    $pasajero = new \Pasajero($_nombre,$_apellido,$_dni);
                    $viaje->addPasajero( $pasajero);
                    $viaje->listPasajeros();
                    $terminar = true;
                }
            }
            break;
        case 3:
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
            break;
        case 4:
            $viaje->mostrarInformacion();
            break;
        case 5:
            echo "PASAJEROS EN VIAJE.\n";
            $viaje->listPasajeros();
            break;
        case 99:
            //debug
         /*   mostrarEstructura($ventas);
            mostrarEstructura($paqMayorVenta);*/
            break;
        default:
            # code...
            break;
    }
}


function menuOpciones(&$viaje, $opcion){
    $opciones = [1,2,3,4,5,6];
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
    echo "2.- Ingresar pasajero.\n";
    echo "3.- Buscar pasajero por DNI.\n";
    echo "4.- Mostrar info del viaje.\n";
    echo "5.- Listar pasajeros del viaje.\n";
    echo "6.- Salir.\n";
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
            $terminar = $opcion == 6;
            if(!$terminar){
                menuOpciones( $viaje, $opcion);
            }
        } else {
            echo "Ingresar una opción válida.\n";
        }
    }

}


programaPrincipal();