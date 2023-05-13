<?php 

//clase hijo de Pasajero

include_once 'Pasajero.php';

class PasajeroEspeciales extends Pasajero{
    
    private $sillaRuedas;
    private $asistencia;
    private $comidaEspecial;

    public function __construct($nombreP,$apellidoP, $documentoP,  $telefonoP, $numeroAsientoP,  $numeroTicketPasajeP, $sillaRuedasP, $asistenciaP, $comidaEspecialP){

        parent::__construct($nombreP,$apellidoP, $documentoP,  $telefonoP, $numeroAsientoP,  $numeroTicketPasajeP ); //construct  de Pasajero
        
        $this->sillaRuedas = $sillaRuedasP;
        $this->asistencia = $asistenciaP; //embarque y desembarque
        $this->comidaEspecial = $comidaEspecialP;
    }

    //getters
    public function getSillaRuedas(){
        return $this->sillaRuedas;
    }
    public function getAsistencia(){
        return $this->asistencia;
    }
    public function getComidaEspecial(){
        return $this->comidaEspecial;
    }

    //setters
    public function setSillaRuedas($sillaRuedasP){
        $this->sillaRuedas = $sillaRuedasP;
    }
    public function setAsistencia($asistenciaP){
        $this->asistencia = $asistenciaP;
    }
    public function setComidaEspecial($comidaEspecial){
        $this->comidaEspecial = $comidaEspecial;
    }

    public function darPorcentajeIncremento(){

        $porc = parent::darPorcentajeIncremento();

        if($this->getSillaRuedas()==true && $this->getAsistencia()==true && $this->getComidaEspecial()==true){

            $porcentajeIncremento = $porc + 30;

        }elseif($this->getSillaRuedas()==true && $this->getAsistencia()==false && $this->getComidaEspecial()==false){
            $porcentajeIncremento = $porc + 15;

        }elseif($this->getSillaRuedas()==false && $this->getAsistencia()==true && $this->getComidaEspecial()==false){
            $porcentajeIncremento = $porc + 15;

        }elseif($this->getSillaRuedas()==false && $this->getAsistencia()==false && $this->getComidaEspecial()==true){
            $porcentajeIncremento = $porc + 15;
        }
        return ($porcentajeIncremento);
    }


    public function __toString(){
        $cad = parent::__toString();
        $cad = $cad ."\n".$this->getSillaRuedas(). "\n Asistencia: ".$this->getAsistencia(). "\n Comida Especial: ".$this->getComidaEspecial();
        return $cad;
    }


}

?>
