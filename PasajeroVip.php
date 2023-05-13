<?php 

//clase hijo de Pasajero

include_once 'Pasajero.php';

class PasajeroVip extends Pasajero{

    private $numeroViajeRecurrente;
    private $cantidadMillasPasajero;

    public function __construct($nombreP,$apellidoP, $documentoP,  $telefonoP, $numeroAsientoP,  $numeroTicketPasajeP,$numeroViajeRecurrenteVip, $cantidadMillasPasajeroVip ){

        parent::__construct($nombreP,$apellidoP, $documentoP,  $telefonoP, $numeroAsientoP,  $numeroTicketPasajeP ); //construct  de Pasajero

        $this->numeroViajeRecurrente = $numeroViajeRecurrenteVip;
        $this->cantidadMillasPasajero = $cantidadMillasPasajeroVip;

    }

    //metodos de acceso propios de la clase
    public function getNumeroViajeRecurrente(){
        return $this->numeroViajeRecurrente;
    }

    public function getCantidadMillasPasajero(){
        return $this->cantidadMillasPasajero;
    }

    //setters
    public function setNumeroViajeRecurrente($numeroViajeRecurrenteVip){
        $this->numeroViajeRecurrente = $numeroViajeRecurrenteVip;
    }
    public function setCantidadMillasPasajero($cantidadMillasPasajeroVip){
        $this->cantidadMillasPasajero = $cantidadMillasPasajeroVip;
    }

    public function darPorcentajeIncremento(){

        $porc = parent::darPorcentajeIncremento();

        $porcentajeIncremento = $porc + 35;

        if ($this->getCantidadMillasPasajero() > 300) {
            $porcentajeIncremento = $porc + 30;
        }
        return ($porcentajeIncremento);
    }



    public function __toString(){
        $cad = parent::__toString();
        $cad = $cad."\n ".$this->getNumeroViajeRecurrente(). "\n Cant millas:".$this->getCantidadMillasPasajero();

        return $cad;
    }


}

?>
