<?php 

class Viaje {

    //Atributos
    private $codigoViaje;
    private $destinoViaje;
    private $cantidadMaximaPasajeros;
    private $arregloPasajeros ; //arreglo indexado de Pasajeros

    //Metodos de acceso
    public function __construct($codViaje,$destViaje,$cantMax){
        $this->codigoViaje = $codViaje;
        $this->destinoViaje = $destViaje;
        $this->cantidadMaximaPasajeros = $cantMax;
        $this->arregloPasajeros = [];
    }

    //Getters
    public function getCodigoViaje(){
        return $this->codigoViaje;
    }

    public function getDestinoViaje(){
        return $this->destinoViaje;
    }

    public function getCantidadMaxima(){
        return $this->cantidadMaximaPasajeros;
    }

    public function getArregloPasajeros(){
        return $this->arregloPasajeros;
    }

    //Setters
    public function setCodigoViaje($codViaje){
        $this->codigoViaje=$codViaje;
    }

    public function setDestino($destViaje){
        $this->destinoViaje=$destViaje;
    }

    public function setCantidadMaxima($cantMax){
        $this->cantidadMaximaPasajeros=$cantMax;
    }

    public function setArregloPasajeros($funcionPasajeros){
        $this->arregloPasajeros=$funcionPasajeros;
    }


    //FUNCIONES IMPLEMENTADAS


    /**
     * Busca el dni del arreglo Pasajeros con la clave dni y devulve la id, esta bien
     */
    function buscarPasajero($dni){
        $i = 0;
        $coleccionPasajeros = $this->getArregloPasajeros(); // coleccion de pasajeros
        $cant = count($coleccionPasajeros);
        $buscado =  false;

        while ($i < $cant && $buscado == false) {
            if ( $coleccionPasajeros[$i]["dni"] == $dni) {
                $buscado = true;
            }else{
                $i++;
            }
        }
        if ($buscado == false) {
            $i = -1;
        }
        return $i;
    }

    //FUNCIONES PARA PASAJERO

    /**
     * Agregar un pasajero a la coleccion Pasajeros
     * @param array $pasajeroNuevo
     */
    function agregarPasajeroColeccion($nombre,$apellido,$dni){ 
        $coleccionPasajeros = $this->getArregloPasajeros(); // coleccion de pasajeros
        if ($this->getCantidadMaxima()>= count($coleccionPasajeros)) {
            $coleccionPasajeros[count($coleccionPasajeros)] = ["nombre" => $nombre, "apellido" => $apellido, "dni" => $dni];//claves del arreglo Pasajeros
            $this->setArregloPasajeros($coleccionPasajeros); //Actualizo los datos
        }

    }

    /**
     * Funcion para modificar el nombre del pasajero y apellido, dni
     */
    function modificarDatosPasajero($indice, $pnombre, $papellido,$pdni){
       
        $coleccionPasajeros = $this->getArregloPasajeros(); // coleccion de pasajeros
        
        if($indice>=0 ){
            $coleccionPasajeros[$indice]["nombre"] = $pnombre;
            $coleccionPasajeros[$indice]["apellido"] = $papellido;
            $coleccionPasajeros[$indice]["dni"] = $pdni;
            $this->setArregloPasajeros($coleccionPasajeros);
        }
    }

    //Mostrar listado de pasajeros

    /**
     * Permite mostrar los datos de los pasajeros del arreglo
     * @return String
     */
    function mostrarPasajeros(){
        //String $textoPasajeros
        $textoPasajeros = "";
        for ($i=0; $i < count($this->getArregloPasajeros()); $i++) {  //recorremos el arreglo de funciones con for
            $unaFuncion = $this->getArregloPasajeros()[$i];
            $textoPasajeros =  $textoPasajeros.($i+1)." Pasajero: \n". $unaFuncion["nombre"]."\n". $unaFuncion["apellido"]."\n".$unaFuncion["dni"]."\n";
        }
        return $textoPasajeros; 
    }

    //Metodo para visualizar la informacion de la clase
    public function __toString(){
        $codigoViaje = "\nCódigo del viaje: ".$this->getCodigoViaje();
        $destino = "Destino del viaje: ".$this->getDestinoViaje();
        $cantidadMaximaPasajeros = "Cantidad maxima pasajeros: ".$this->getCantidadMaxima();

        $listadoPasajeros = $this->mostrarPasajeros(); //invoco funcion para mostrar pasajeros
        $cad = $codigoViaje."\n".$destino."\n". $cantidadMaximaPasajeros."\n".$listadoPasajeros;
        return $cad;
    }

}

?>