<?php 

include_once "Viaje.php";
include_once "Pasajero.php";
include_once "ResponsableV.php";


        //Le pido al usuario que ingrese los datos
        echo "-----------[Bienvenido a Viaje Feliz]-----------\n";
        echo "Ingrese los datos del viaje. \n";
        echo "Ingrese el codigo: ";
        $codViaje  = trim(fgets(STDIN));
        echo "Ingrese destino: ";
        $destinoViaje  = trim(fgets(STDIN));
        echo "Ingrese cantidad maxima de pasajeros: "; //cargar nuevos pasajeros parz llenar la lista?
        $cantMaxViaje = trim(fgets(STDIN));

        echo "Ingrese datos del Responsable del Viaje:\n";
        echo "Numero empleado:\n";
        $numeroEmpleado = trim(fgets(STDIN));
        echo "Numero de licencia:\n";
        $numeroLicencia = trim(fgets(STDIN));
        echo "Nombre:\n";
        $nomResponsable = trim(fgets(STDIN));
        echo "Apellido:\n";
        $apeResponsable = trim(fgets(STDIN));

        $objResponsable = new ResponsableV($numeroEmpleado, $numeroLicencia, $nomResponsable, $apeResponsable);
      //  echo  "el responsable ".$objResponsable;
        $objViaje = new Viaje($codViaje, $destinoViaje, $cantMaxViaje, $objResponsable); //se crea el objeto Viaje

        echo $objViaje;
        
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
                    $arreglo = $objViaje->getArregloPasajeros();
                    if ((count($arreglo)) >= $objViaje->getCantidadMaxima() ) {
                        echo "No se puede agregar pasajeros al viaje";
                    }else{
                        echo "Ingrese nombre pasajero: \n";
                        $nombre = trim(fgets(STDIN));
                        echo "Ingrese su apellido: \n";
                        $apellido = trim(fgets(STDIN));
                        echo "Ingrese su DNI: \n";
                        $dni = trim(fgets(STDIN));
                        echo "Ingrese telefono: \n";
                        $telefono = trim(fgets(STDIN));

                        $objPasajero = new Pasajero($nombre, $apellido, $dni, $telefono);

                        $existe = $objViaje->verificarPasajero($objPasajero);

                        if ($existe == false) {
                            //se agrega
                            $objViaje->agregarPasajeroColeccion($objPasajero); //agregar un pasajero a la lista
                        }else{
                            //si es igual no se agrega
                            echo "Ya existe un pasajero con los mismo datos, no se agrega";
                        }
                    }
                        
                    $seguir = true;
                    break;
                case '4':
                    //Listado de pasajeros para poder modificar
                    echo "-----------------[Listado de pasajeros para modificar]-----------------";
                    echo $objViaje->mostrarPasajeros();
                    echo "\nIngrese el dni del pasajero que quiere modificar: ";
                    $dniPasajero = trim(fgets(STDIN));

                    $indice = $objViaje->buscarPasajero($dniPasajero);

                    if ($indice <> -1){
         
                        echo "Ingrese el nuevo nombre: "; //No tenes que pedir datos en la clase
                        $nomNuevo =  trim(fgets(STDIN));
                
                        echo "Ingrese nuevo apellido: ";
                        $apeNuevo =  trim(fgets(STDIN));
            
                        echo "Ingrese nuevo dni: ";
                        $dniNuevo =  trim(fgets(STDIN));    

                        echo "Ingrese nuevo telefono: ";
                        $telNuevo =  trim(fgets(STDIN));   

                        $objViaje->modificarDatosPasajero($objPasajero, $nomNuevo,$apeNuevo,$telNuevo, $dniNuevo, $dniPasajero);

                    }else{
                        echo "No se encontro el pasajero";
                    }
                
                    $seguir = true;
                    break;
                case '5':
                    echo "--------------[Listado de pasajeros del viaje]--------------";
                    echo $objViaje->mostrarPasajeros(); //Muestra el listado de los pasajeros del viaje, otra opcion $objViaje->mostrar
                    $seguir = true;
                    break;     
                case '6':
                $seguir = false;
                break;       
            }
        }while($seguir);
        