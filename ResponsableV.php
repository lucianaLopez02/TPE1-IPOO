<?php 

class ResponsableV{
    //Atributos
    private $numeroEmpleado;
    private $numeroLicencia;
    private $nombre;
    private $apellido;

    //metodo contruct
    public function __construct($numEmpleadoR, $numLicenciaR, $nombreR, $apellidoR)
    {
        $this->numeroEmpleado = $numEmpleadoR;
        $this->numeroLicencia = $numLicenciaR;
        $this->nombre = $nombreR;
        $this->apellido = $apellidoR;
    }

    //getters
    public function getNumeroEmpleado(){
        return $this->numeroEmpleado;
    }
    public function getNumeroLicencia(){
        return $this->numeroLicencia;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }

    //setters
    public function setNumeroEmpleado($numEmpleadoR){
        $this->numeroEmpleado = $numEmpleadoR;
    }
    public function setNumeroLicencia($numLicenciaR){
        $this->numeroLicencia = $numLicenciaR;
    }
    public function setNombre($nombreR){
        $this->nombre = $nombreR;
    }
    public function setApellido($apellidoR){
        $this->apellido = $apellidoR;
    }

    //metodo toString()

    public function __toString(){

        $numE = "El número de empleado es: ".$this->getNumeroEmpleado()."\n";
        $numL = "El número de licencia es: ".$this->getNumeroLicencia()."\n";
        $nom = "El nombre del responsable: ".$this->getNombre()."\n";
        $ape = "El apellido del responsable es: ".$this->getApellido()."\n";

        $cad = $numE.$numL.$nom.$ape;
        return $cad;
    }
}
?>