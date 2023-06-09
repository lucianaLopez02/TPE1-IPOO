<?php 

class Viaje {

    //Atributos
    private $codigoViaje;
    private $destinoViaje;
    private $cantidadMaximaPasajeros;
    private $arregloPasajeros ; //referencia a una coleccion de objetos de la clase Pasajero
    private $objResponsable; //referencia al responsable de realizar el viaje?

    private $costoViaje;
    private $sumaCostosAbonadosPasajeros;

    //Metodos de acceso
    public function __construct($codViaje,$destViaje,$cantMax, $responsable){
        $this->codigoViaje = $codViaje;
        $this->destinoViaje = $destViaje;
        $this->cantidadMaximaPasajeros = $cantMax;
        $this->arregloPasajeros = [];
        $this->objResponsable = $responsable;
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

    //objResponsable 
    public function getObjResponsable(){
        return $this->objResponsable;
        
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

    //set ObjResponsable
    public function setObjResponsable($responsable){
        $this->objResponsable = $responsable;
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
            $objPasajero =$coleccionPasajeros[$i];
            if ($objPasajero->getNroDocumento() == $dni) {
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
     * Verificar que el pasajero no se encuentre en la coleccion de Pasajeros o sea igual a otro pasajero
     * @return boolean
     */
    public function verificarPasajero($objPasajero){
        $verificacion = false;
        $colPasajeros = $this->getArregloPasajeros();
        //recorrer la coleccion de pasajeros
        foreach ($colPasajeros as $pasajero) {
            if ($objPasajero->getNroDocumento() == $pasajero->getNroDocumento()){
                $verificacion = true;
            }
        }
        
        return $verificacion; 
    }


    /**
     * Agregar un pasajero a la coleccion Pasajeros
     * @param object //array $pasajeroNuevo
     */
    function agregarPasajeroColeccion($objPasajero){  //recibe un obj
        $coleccionPasajeros = $this->getArregloPasajeros(); // coleccion de pasajeros
        if ($this->getCantidadMaxima()>= count($coleccionPasajeros)) {
            //$coleccionPasajeros[count($coleccionPasajeros)] = ["nombre" => $objPasajero->getNombre(), "apellido" => $objPasajero->getApellido(), "dni" => $objPasajero->getNroDocumento(), "telefono" => $objPasajero->getTelefono()];//claves del arreglo Pasajeros
            array_push($coleccionPasajeros, $objPasajero); //agrega un objPasajero a la coleccion de Pasajeros
            $this->setArregloPasajeros($coleccionPasajeros); //Actualizo los datos
        }
    }

    /**
     * Funcion para modificar el nombre del pasajero y apellido, dni
     */
    function modificarDatosPasajero($objPasajero, $pnombre, $papellido,  $ptelefono, $pdni, $dniBuscado){
        
        $coleccionPasajeros = $this->getArregloPasajeros(); // coleccion de pasajeros con objPasajero
        $indice = $this->buscarPasajero($dniBuscado);

        if($indice>=0 ){
            
            $objPasajero->setNombre($pnombre);

            $objPasajero->setApellido($papellido);

            $objPasajero->setNroDocumento($pdni);

            $objPasajero->setTelefono($ptelefono);

            $this->setArregloPasajeros($coleccionPasajeros);
        }
    }

    //Funciones del entregable 3
    /**
     * Registra la venta de un viaje al pasajero que es recibido por parametro
     */
    public function venderPasaje($objPasajero){
        
       $pasajeroAgregado  = $this->agregarPasajeroColeccion($objPasajero);


    
    }

    /**
     * retorna verdadero si la cantidad de pasajeros del viaje es menor a la cantidad máxima de pasajeros y falso caso contrario
     * @return boolean
     */
    public function hayPasajesDisponible(){
        $esMenor = false;
        
        $coleccionPasajeros = $this->getArregloPasajeros(); // coleccion de pasajeros
        if (count($coleccionPasajeros) < $this->getCantidadMaxima()){
            $esMenor = true;
        }
        return($esMenor);
    }

    

    //Mostrar listado de pasajeros
    /**
     * Permite mostrar los datos de los pasajeros del arreglo
     * @return String
     */
    function mostrarPasajeros(){ 
        //String $textoPasajeros
        $textoPasajeros = "";
        foreach ($this->getArregloPasajeros() as $unPasajero) {
           // $unPasajero = $this->getArregloPasajeros()[$Pasajero];
            $textoPasajeros =  $textoPasajeros."\n Pasajero: \n". $unPasajero->getNombre()."\n". $unPasajero->getApellido()."\n".$unPasajero->getNroDocumento()."\n".$unPasajero->getTelefono()."\n";
        }
        return $textoPasajeros; 
    }

    //Metodo para visualizar la informacion de la clase
    public function __toString(){
        $codigoViaje = "\nCódigo del viaje: ".$this->getCodigoViaje();
        $destino = "Destino del viaje: ".$this->getDestinoViaje();
        $cantidadMaximaPasajeros = "Cantidad maxima pasajeros: ".$this->getCantidadMaxima();
        $listadoPasajeros = $this->mostrarPasajeros(); //invoco funcion para mostrar pasajeros

        $responsableViaje = "Datos del responsable: \n".$this->getObjResponsable(); //informacion del responsable tenemos que recorrer el responsable?1

        $cad = $codigoViaje."\n".$destino."\n". $cantidadMaximaPasajeros."\n"
        .$listadoPasajeros."\n"
        .$responsableViaje;
        return $cad;   
    }

}

?>