<?php 

include_once "Viaje.php";

        //Le pido al usuario que ingrese los datos
        echo "-----------[INGRESE DATOS DEL VIAJE ]-----------\n";
        echo "Ingrese el codigo de viaje: ";
        $codViaje  = trim(fgets(STDIN));

        echo "Ingrese destino del viaje: ";
        $destinoViaje  = trim(fgets(STDIN));

        echo "Ingrese cantidad maxima de pasajeros: ";
        $cantMaxViaje = trim(fgets(STDIN));

        $objViaje = new Viaje($codViaje, $destinoViaje, $cantMaxViaje); 

        do{
        echo "\n-----------[OPCIONES]------------\n";
        echo "1.Mostrar el viaje\n";
        echo "2.Modificar el viaje actual\n";
        echo "3.Agregar pasajero al viaje\n";
        echo "4.Modificar pasajero del viaje \n";
        echo "5.Mostrar listado de pasajeros del viaje\n"; 
        echo "6.Salir \n";

        $opc = trim(fgets(STDIN));

        //Modificar viaje
            switch ($opc) {
                case '1': // Mostrar datos viaje
                    echo "\n------------[Datos del viaje]--------------\n";
                    echo($objViaje);//muestro datos del viaje sin modificar
                    $seguir = true;
                    break;
                case '2':
                    echo "¿Qué quiere cambiar del viaje?: \n";
                    echo "1. codigo de viaje\n";
                    echo "2. destino de viaje\n";
                    echo "3. cantidad máxima de pasajeros\n";
    
                    $opcViaje = trim(fgets(STDIN));
    
                    if ($opcViaje == 1) {
                        echo "Ingrese nuevo código de viaje: \n";
                        $nuevoCodigo = trim(fgets(STDIN));
                        $objViaje->setCodigoViaje($nuevoCodigo);  //se le asigna el nuevo cambio de codigo
                        echo($objViaje);//muestro datos del viaje modificado
                    } elseif ($opcViaje == 2) {
                        echo "Ingrese el nuevo destino del viaje:\n";
                        $nuevoDestino = trim(fgets(STDIN));
                        $objViaje->setDestino($nuevoDestino);
                        echo($objViaje);//muestro datos del viaje modificado
                    } elseif ($opcViaje == 3) {
                        echo "Ingrese la nueva capacidad máxima de pasajeros: \n";
                        $nuevaCantMaxima = trim(fgets(STDIN));
                        $objViaje->setCantidadMaxima($nuevaCantMaxima);
                        echo($objViaje);//muestro datos del viaje modificado
                    } else {
                        echo "No existe esa opcion";
                    }
                    $seguir = true;
                    break;
                case '3': //cargar pasajero a la coleccion Pasajeros
    
                    echo "\n-----------[Ingrese datos del pasajero]------------\n";
                    echo "Ingrese nombre pasajero: \n";
                    $nombre = trim(fgets(STDIN));
    
                    echo "Ingrese su apellido: \n";
                    $apellido = trim(fgets(STDIN));
    
                    echo "Ingrese su DNI: \n";
                    $dni = trim(fgets(STDIN));
    
                    $unPasajero = crearPasajero($nombre, $apellido, $dni); //agregar un pasajero a la lista
    
                    agregarPasajeroColeccion($objViaje, $unPasajero);
    
                    //echo $objViaje;

                    $seguir = true;
                    break;
                case '4':

                    echo "Ingrese el dni del pasajero que quiere modificar: ";
                    $dniPasajero = trim(fgets(STDIN));

                    $idPasajero = $objViaje->buscarPasajero($dniPasajero); //bucamos el pasajero

                    echo "Que quiere editar del pasajero?".$idPasajero."\n";
                    echo "1.Nombre\n";
                    echo "2.Apellido\n";
                    echo "3.dni\n";
                    $opcPasajero = trim(fgets(STDIN));
    
                    
    
                    modificarDatosPasajero($idPasajero,$objViaje,$opcPasajero);

                    //echo $objViaje;

                    $seguir = true;
                    break;
                case '5':
                    echo "--------------[Listado de pasajeros del viaje]--------------";
                    echo ($objViaje); //Muestra el listado de los pasajeros del viaje
    
                    $seguir = true;
                    break;     
                case '6':

                $seguir = false;
                break;       
            }
        }while($seguir);

        
        
    //FUNCIONES
    /**
     * Crear un nuevo pasajero
     */
    function crearPasajero($nombre,$apellido,$dni){ 
        $pasajeroNuevo = ["nombre" => $nombre, "apellido" => $apellido, "dni" => $dni];//claves del arreglo Pasajeros
        return $pasajeroNuevo; //arreglo
    }

    /**
     * Agregar un pasajero a la coleccion Pasajeros
     * @param array $pasajeroNuevo
     */
    function agregarPasajeroColeccion($objViaje, $pasajeroNuevo){ 
        $coleccionPasajeros = $objViaje->getArregloPasajeros(); // coleccion de pasajeros
        array_push($coleccionPasajeros,$pasajeroNuevo); 
        $objViaje->setArregloPasajeros($coleccionPasajeros); //Actualizo los datos
    }

    /**
     * Funcion para modificar el nombre del pasajero y apellido, dni
     */
    function modificarDatosPasajero($id,$objViaje,$opcPasajero){

        $coleccionPasajeros = $objViaje->getArregloPasajeros(); // coleccion de pasajeros
        if ($opcPasajero == 1){ //cambiar nombre
            
            echo "Ingrese el nuevo nombre: ";
            $nomNuevo =  trim(fgets(STDIN));

            $coleccionPasajeros[$id]["nombre"] = $nomNuevo;
            $objViaje->setArregloPasajeros($coleccionPasajeros); 

        }elseif($opcPasajero == 2){ //cambiar apellido  
            
            echo "Ingrese nuevo apellido: ";
            $apeNuevo =  trim(fgets(STDIN));

            $coleccionPasajeros[$id]["apellido"] = $apeNuevo;
            $objViaje->setArregloPasajeros($coleccionPasajeros);
            

        }elseif($opcPasajero == 3){    
            
            echo "Ingrese nuevo dni: ";
            $dniNuevo =  trim(fgets(STDIN)); 

            $coleccionPasajeros[$id]["nombre"] = $dniNuevo;
            $objViaje->setArregloPasajeros($coleccionPasajeros);
            
        }

    }
    