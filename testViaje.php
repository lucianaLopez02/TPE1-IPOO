<?php 

include_once "Viaje.php";

$objViaje = new Viaje ("","","",""); //inicializo el objeto

        //Menu Principal para Viajes y Pasajeros

        echo "----------------[Menu principal]------------\n";
        echo "1.Para Viajes\n";
        echo "2.Para Pasajeros\n";
        echo "3.Salir\n";
        echo "Eliga una opcion: \n";

        $numOpcion = trim(fgets(STDIN));

        //switch para las opciones
        switch ($numOpcion) {
            case 1:
                echo "¿Desea ingresar un viaje?(s/n)\n";
                $rta = trim(fgets(STDIN));
        
                while ($rta == "s") {
        
                    //Le pido al usuario que ingrese los datos
                    echo "-----------[INGRESE DATOS DEL VIAJE ]-----------\n";
                    echo "Ingrese el codigo de viaje: ";
                    $codViaje  = trim(fgets(STDIN));
        
                    echo "Ingrese destino del viaje: ";
                    $destinoViaje  = trim(fgets(STDIN));
        
                    echo "Ingrese cantidad maxima de pasajeros: ";
                    $cantMaxViaje = trim(fgets(STDIN));
        
                    //Cargo informacion al viaje
                    $objViaje->setCodigoViaje($codViaje);
                    $objViaje->setDestino($destinoViaje);
                    $objViaje->setCantidadMaxima($cantMaxViaje);
        
                    
                    echo "\n-----------[OPCIONES PARA EL VIAJE]------------\n";
                    echo "1.Modificar el viaje actual\n";
                    echo "2.Mostrar el viaje\n";
        
                    $opc = trim(fgets(STDIN));
                    
                    //Modificar viaje
                    if ($opc == 1) {
                        $objViaje->modificarViaje();//funcion para modificar viaje
                        echo "\n-----------[Datos viaje modificado]-----------\n";
                        echo ($objViaje); //muestro datos del viaje modificado
                        
                    }elseif($opc == 2){
                        echo "\n------------[Datos del viaje]--------------\n";
                        echo ($objViaje);//muestro datos del viaje sin modificar
        
                    }else{
                        echo "No corresponde a ninguna opcion";
                    }
        
                    echo "\n---------------------------------------------\n";
                    echo "Desea ingresar otro viaje?(s/n)\n";
                    $rta = trim(fgets(STDIN));
                }
        
                break;

            case 2:

                echo "------------[Menu para pasajeros]-------------\n";
                echo "1.Agregar nuevo pasajero \n"; //array push
                echo "2.Modificar pasajero \n";
                echo "3.Eliminar pasajero \n"; //funcion unset
                echo "4.Mostrar pasajero \n";

                $opc = trim(fgets(STDIN));

                if ($opc == 1) {
                    
                    echo "Ingrese nombre pasajero:\n";
                    $nombre = trim(fgets(STDIN));

                    echo "Ingrese su apellido \n";
                    $apellido = trim(fgets(STDIN));

                    echo "Ingrese su DNI \n";
                    $dni = trim(fgets(STDIN));

                    $unPasajero = $objViaje-> crearPasajero($nombre, $apellido, $dni); //agregar un pasajero a la lista

                    $objViaje->agregarPasajeroColeccion($unPasajero);

                }elseif($opc == 2){
                    echo "Que quiere editar del pasajero?";
                    echo "1.Nombre";
                    echo "2.Apellido";
                    $opc = trim(fgets(STDIN));
                    if ($opc == 1) {
                        echo "Ingrese el dni del pasajero para modificar: ";
                        $dniPasajero = trim(fgets(STDIN));
                        $objViaje->buscarPasajero($dniPasajero);
                        echo "Ingrese nuevo nombre: ";
                        $nomNuevo =  trim(fgets(STDIN));
                        $objViaje->modificarNombrePasajero($id,$nomNuevo);//buscar con el dni y (fijarse que no este en el arreglo pasajeros) despues modificar

                    }elseif($opc == 2){
                        echo "Ingrese el dni del pasajero para modificar: ";
                        $dniPasajero = trim(fgets(STDIN));
                        $objViaje->buscarPasajero($dniPasajero);
                        echo "Ingrese nuevo apellido: ";
                        $apeNuevo =  trim(fgets(STDIN));
                        $idPasajero = $objViaje->buscarPasajero($dniPasajero);
                        $objViaje->modificarApellidoPasajero($idPasajero,$nomNuevo);
                    }

                    
                    echo ($objViaje); //Muestra el listado de los pasajeros

                }elseif($opc == 3){
                    echo "Ingrese el dni del pasajero que quiere eliminar: \n";
                    $dniEliminar = trim(fgets(STDIN));

                    $idPasajero = $objViaje->buscarPasajero($dniEliminar);

                    if($objViaje->removerPasajero($idPasajero)){
                        echo "Pasajero encontrado y eliminado\n";
                    }else{
                        echo "No existe el psajero con ese dni\n";
                    }

                }elseif($opc == 4){
                    $objViaje->mostrarPasajeros(); //Muestra el listado de los pasajeros
                }
                        break;
        }