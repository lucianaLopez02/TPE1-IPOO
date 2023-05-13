<?php 

//clase hijo de Pasajero

include_once 'Pasajero.php';

class PasajeroEstandar extends Pasajero{
    
    //Por el momento sin atributos

    public function __construct($nombreP,$apellidoP, $documentoP,  $telefonoP, $numeroAsientoP,  $numeroTicketPasajeP){

        parent::__construct($nombreP,$apellidoP, $documentoP,  $telefonoP, $numeroAsientoP,  $numeroTicketPasajeP ); //construct  de Pasajero
    }

    public function darPorcentajeIncremento(){
        $porc = parent::darPorcentajeIncremento();
        $porcentajeIncremento = $porc + 10;
        return ($porcentajeIncremento);
    }

    public function __toString(){
        $cad = parent::__toString();
        return $cad;
    }
    
}

?>

