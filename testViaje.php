<?php 

include_once "Viaje.php";

        //Le pido al usuario que ingrese los datos
        echo "-----------[Bienvenido a Viaje Feliz]-----------\n";
        echo "Ingrese los datos del viaje. \n";
        echo "Ingrese el codigo: ";
        $codViaje  = trim(fgets(STDIN));
        echo "Ingrese destino: ";
        $destinoViaje  = trim(fgets(STDIN));
        echo "Ingrese cantidad maxima de pasajeros: "; //cargar nuevos pasajeros parz llenar la lista?
        $cantMaxViaje = trim(fgets(STDIN));
        $objViaje = new Viaje($codViaje, $destinoViaje, $cantMaxViaje, []); //se crea el objeto Viaje
        
        do{
        echo "\n-----------[OPCIONES]------------\n";
        echo "1.Mostrar el viaje\n";
        echo "2.Modificar el viaje actual\n";
        echo "3.Agregar pasajero al viaje\n";
        echo "4.Modificar pasajero del viaje \n"; // que nos muestre un listados de que pasajeros queremos modificar
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
                        echo "Ingrese la nueva capacidad máxima de pasajeros: \n"; //puede ser que no se puede modificar?
                        $nuevaCantMaxima = trim(fgets(STDIN)); 
                        if ($nuevaCantMaxima < $objViaje->getCantidadMaxima()) {
                            echo "no se puede";
                        }else{
                            $objViaje->setCantidadMaxima($nuevaCantMaxima);
                            echo($objViaje);//muestro datos del viaje modificado
                        }
                        
                    } else {
                        echo "No existe esa opcion";
                    }
                    $seguir = true;
                    break;
                case '3': //cargar pasajero a la coleccion Pasajeros
    
                    echo "\n-----------[Ingrese datos del pasajero]------------\n";

                    if ($objViaje->getCantidadMaxima()<= count($coleccionPasajeros)) {
                        echo "Ingrese nombre pasajero: \n";
                        $nombre = trim(fgets(STDIN));
        
                        echo "Ingrese su apellido: \n";
                        $apellido = trim(fgets(STDIN));
        
                        echo "Ingrese su DNI: \n";
                        $dni = trim(fgets(STDIN));
                    
                   
                        $unPasajero = $objViaje->crearPasajero($nombre, $apellido, $dni); //agregar un pasajero a la lista
    
                        $objViaje->agregarPasajeroColeccion($objViaje, $unPasajero);
                    }
    
                    //echo $objViaje;

                    $seguir = true;
                    break;
                case '4':
                    //Listado de pasajeros para poder modificar
                    echo "-----------------[Listado de pasajeros para modificar]-----------------";
                    echo $objViaje;
                    echo "Ingrese el dni del pasajero que quiere modificar: ";
                    $dniPasajero = trim(fgets(STDIN));
                    $idPasajero = $objViaje->buscarPasajero($dniPasajero); //bucamos el pasajero

                    if ($idPasajero <> -1) {
                        echo "Que quiere editar del pasajero?".$idPasajero."\n";
                        echo "1.Nombre\n";
                        echo "2.Apellido\n";
                        echo "3.dni\n";
                        $opcPasajero = trim(fgets(STDIN));
                        $objViaje->modificarDatosPasajero($idPasajero,$objViaje,$opcPasajero);
                    }else{
                        echo "No se encontro el pasajero";
                    }
                    
                    //echo $objViaje;

                    $seguir = true;
                    break;
                case '5':
                    echo "--------------[Listado de pasajeros del viaje]--------------";
                    echo $objViaje; //Muestra el listado de los pasajeros del viaje
    
                    $seguir = true;
                    break;     
                case '6':

                $seguir = false;
                break;       
            }
        }while($seguir);

        
    