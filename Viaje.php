<?php 

class Viaje {

    //Atributos
    private $codigoViaje;
    private $destinoViaje;
    private $cantidadMaximaPasajeros;
    private $arregloPasajeros = []; //arreglo indexado de Pasajeros

    //Metodos de acceso
    public function __construct($codViaje,$destViaje,$cantMax,$arrayPasajeros){
        $this->codigoViaje = $codViaje;
        $this->destinoViaje = $destViaje;
        $this->cantidadMaximaPasajeros = $cantMax;
        $this->arregloPasajeros = $arrayPasajeros;
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
     * Permite modificar los datos de un viaje
     */
    function modificarViaje(){
        
        echo "¿Qué quiere cambiar del viaje?: \n";
        echo "1. codigo de viaje\n"; 
        echo "2. destino de viaje\n";
        echo "3. cantidad máxima de pasajeros\n";

        $opc =trim(fgets(STDIN));
        
        if ($opc == 1){ //switch
            echo "Ingrese nuevo código de viaje: \n";
            $nuevoCodigo = trim(fgets(STDIN));
            $this->setCodigoViaje($nuevoCodigo);  //se le asigna el nuevo cambio de codigo
        
        }elseif($opc == 2){
                echo "Ingrese el nuevo destino del viaje:\n";
                    $nuevoDestino = trim(fgets(STDIN));
                    $this->setDestino($nuevoDestino);
                
        }elseif($opc ==3){
                echo "Ingrese la nueva capacidad máxima de pasajeros: \n";
                $nuevaCantMaxima = trim(fgets(STDIN));
                $this->setCantidadMaxima($nuevaCantMaxima);
        }else{
            echo "No existe esa opcion";
        }
    }
    /**
     * Crear nuevo pasajero
     */
    function crearPasajero($nombre,$apellido,$dni){ 
        $pasajeroNuevo = ["nombre" => $nombre, "apellido" => $apellido, "dni" => $dni];//claves del arreglo Pasajeros
        return $pasajeroNuevo; //arreglo
    }
    /**
     * Agregar un pasajero a la coleccion
     * @param array $pasajeroNuevo
     */
    function agregarPasajeroColeccion($pasajeroNuevo){

        $coleccionPasajeros = $this->getArregloPasajeros(); // coleccion de pasajeros
        array_push($coleccionPasajeros,$pasajeroNuevo); //no me deja usar funcion array push
        //$coleccionPasajeros[($coleccionPasajeros)] = $pasajeroNuevo;
        $this->setArregloPasajeros($coleccionPasajeros); //Actualizo los datos

    }
    
    /**
     * Busca el dni del arreglo Pasajeros con la clave dni y devulve la id
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

    /**
     * Funcion para modificar el nombre del pasajero
     */
    function modificarNombrePasajero($id,$nombreNuevo){

        $coleccionPasajeros = $this->getArregloPasajeros(); // coleccion de pasajeros
    
        $this->$coleccionPasajeros[$id]["nombre"] = $nombreNuevo;
        
    }

    /**
     * Funcion para modificar el apellido del pasajero
     */
    function modificarApellidoPasajero($id,$apelllidoNuevo){

        $coleccionPasajeros = $this->getArregloPasajeros(); // coleccion de pasajeros
    
        $this->$coleccionPasajeros[$id]["apellido"] = $apelllidoNuevo;
        
    }


    //Eliminar pasajero del arreglo con el dni

    /**
     * Elimina un pasajero del arreglo Pasajeros con el id obtenido 
     */
    function removerPasajero($id){
        $coleccionPasajeros = $this->getArregloPasajeros(); //llama a la coleccion pasajeros

            unset($coleccionPasajeros[$id]);  
            $this->setArregloPasajeros($coleccionPasajeros); //Actualizo los datos
        
    }

    //Mostrar listado de pasajeros

    /**
     * Permite mostrar los datos de los pasajeros del arreglo
     */
    function mostrarPasajeros(){

        $textoPasajeros = "";
        for ($i=0; $i < count($this->getArregloPasajeros()); $i++) {  //recorremos el arreglo de funciones con for

            $unaFuncion = $this->getArregloPasajeros()[$i];
    
            $textoPasajeros = ($i + 1). $textoPasajeros."Arreglo Pasajero: \n". $unaFuncion["nombre"]."\n". $unaFuncion["apellido"]."\n".$unaFuncion["dni"]."/n";
            
        }

        return $textoPasajeros; //String
    }

    //Metodo para visualizar la informacion de la clase
    public function __toString(){
        
        $codigoViaje = "código: ".$this->getCodigoViaje();
        $destino = "destino: ".$this->getDestinoViaje();
        $cantidadMaximaPasajeros = "cantidad maxima pasajeros: ".$this->getCantidadMaxima();

        $listadoPasajeros = $this->mostrarPasajeros(); //invoco funcion 

        return $codigoViaje."\n".$destino."\n". $cantidadMaximaPasajeros."\n".$listadoPasajeros;
    }

}

?>