<?php 

class Pasajero{
    private $nombre;
    private $apellido;
    private $numeroDocumento;
    private $telefono;

    //metodo construct
    public function __construct($nombreP,$apellidoP, $documentoP,  $telefonoP){
        $this->nombre = $nombreP;
        $this->apellido = $apellidoP;
        $this->numeroDocumento = $documentoP;
        $this->telefono = $telefonoP;
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

    //metoodo toString
    public function __toString(){
       
        $nom = "Nombre: ".$this->getNombre();
        $ape = "Apellido: ".$this->getApellido();
        $numDoc = "Numero documento: ".$this->getNroDocumento();
        $tel = "Telefono: ".$this->getTelefono();
        $cad = $nom.$ape.$numDoc.$tel;
        return $cad;
    }
}

?>