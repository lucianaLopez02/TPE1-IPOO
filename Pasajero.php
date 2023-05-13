<?php 

class Pasajero{ //Pasajero ahora es la clase padre, hijas ViP Y Especiales
    private $nombre;
    private $apellido;
    private $numeroDocumento;
    private $telefono;

    private $numeroAsiento;
    private $numeroTicketPasaje;

    //metodo construct
    public function __construct($nombreP,$apellidoP, $documentoP,  $telefonoP, $numeroAsientoP,  $numeroTicketPasajeP ){
        $this->nombre = $nombreP;
        $this->apellido = $apellidoP;
        $this->numeroDocumento = $documentoP;
        $this->telefono = $telefonoP;

        $this->numeroAsiento = $numeroAsientoP;
        $this->numeroTicketPasaje = $numeroTicketPasajeP;
    }

    //Metodos de acceso
    //getters
    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getNroDocumento(){
        return $this->numeroDocumento;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function getNumeroAsiento(){
        return $this->numeroAsiento;
    }

    public function getNumeroTicketPasaje(){
        return $this->numeroTicketPasaje;
    }

    //setters

    public function setNombre($nombreP){
        $this->nombre = $nombreP;
    }

    public function setApellido($apellidoP){
        $this->apellido = $apellidoP;
    }

    public function setNroDocumento($documentoP){
        $this->numeroDocumento = $documentoP;
    }

    public function setTelefono($telefonoP){
        $this->telefono =  $telefonoP;
    }


    public function setNumeroAsiento($numeroAsientoP){
        $this->numeroAsiento = $numeroAsientoP;
    }

    public function setNumeroTicket($numeroTicketPasajeP){
        $this->numeroTicketPasaje = $numeroTicketPasajeP;
    }

    //Funciones del pasajero
    /**
     *  retorne el porcentaje que debe aplicarse como incremento según las características del pasajero.
     */
    public function darPorcentajeIncremento(){
        //incremento del 0
        return (0);
    }

    //metoodo toString
    public function __toString(){
       
        $nom = "Nombre: ".$this->getNombre();
        $ape = "Apellido: ".$this->getApellido();
        $numDoc = "Numero documento: ".$this->getNroDocumento();
        $tel = "Telefono: ".$this->getTelefono();

        $numAsiento = "Numero asiento: ".$this->getNumeroAsiento();
        $numTicket = "Numero de ticket es: ".$this->getNumeroTicketPasaje();


        $cad = $nom.$ape.$numDoc.$tel.$numAsiento.$numTicket;
        return $cad;
    }
}

?>