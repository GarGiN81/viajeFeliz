<?php
class Viaje{
    private $codigo;
    private $destino;
    private $cantMaxPas;
    private $objColPasajeros;//referencia a objeto: pasajeros
    private $objResponsable; //referencia a objeto: responsableV


    //metodo constructor
    public function __construct($cod,$dest,$cMax,$objColPas,$objRespV) {
        $this-> codigo = $cod;
        $this->destino=$dest;
        $this->cantMaxPas=$cMax;
        $this->objColPasajeros=$objColPas;
        $this->objResponsable=$objRespV;
    }
//METODOS DE ACCESO
//metodos get 
    public function getCodigo(){
        return $this->codigo;
    }
    public function getDestino(){
        return $this->destino;
    }
    public function getCantMaxPas(){
        return $this->cantMaxPas;
    }
    public function getObjColPasajeros(){
        return $this->objColPasajeros;
    }
    public function getObjResponsable(){
        return $this->objResponsable;
    }
//metodos set
    public function setCodigo($codigo){
        $this->codigo=$codigo;
    }
    public function setDestino($destino){
        $this->destino=$destino;
    }
    public function setCantMaxPas($cantMaxPas){
        $this->cantMaxPas=$cantMaxPas;
    }
    public function setObjColPasajeros($objColPasajeros){
        $this->objColPasajeros=$objColPasajeros;
    }
    public function setObjResponsable($objResponsable){
        $this->objResponsable=$objResponsable;
    }
//*********FUNCIONES PARA VER DATOS CARGADOS***********
/**
 * Funcion que muestra los datos de pasajeros cargados
 * 
 */


public function mostrarDatosPasajero(){
    $cadena=" ";
    $colPas=$this->getObjColPasajeros();
    $cantidad=count($colPas);
    for($i=0;$i<$cantidad;$i++){
        $cadena=$cadena."Pasajero: ".$i."\n".$colPas[$i];
    }
    return $cadena;
   }
    
    /**
    * 
    */
    public function __toString() {
        
        $cadena="";
        $cadena="
        Datos del viaje: \n
        Código: ".$this->getCodigo()."\n 
        Destino: ".$this->getDestino()."\n
        Cantidad Maxima de Pasajeros: ".$this->getCantMaxPas()."\n
        Responsable: \n".$this->getObjResponsable()."\n
        Pasajeros: \n".$this->mostrarDatosPasajero()."\n";
        return $cadena;
    }
//**********************FUNCIONES DE CARGA***********************
/**
 * 
 */
    public function buscarPasajero($dni){
        $objColPas=$this->getObjColPasajeros();
        $i=0;
        $encontro=false;
        while($i<count($objColPas)&&!$encontro){
            $colPas=$objColPas[$i];
            if ($colPas->getNroDni()==$dni){
                $encontro=true;

            }
            $i++;
        }
        return $i-1;
}

public function encontroPasajero($buscaDni){
    $encontrado=false;
    $objColPas=$this->getObjColPasajeros();
    $indice=$this->buscarPasajero($buscaDni);
    if($indice>0 && $indice<(count($objColPas)-1)){
        $encontrado=true;
    }
    return $encontrado;
}

/**
 *Funcion para agregar pasajero
 *@param array $pasajeros ["Nombre"=>,"Apellido"=>"DNI"=>]
 *@return bool $puedeAgregar
*/
    public function agregarPasajero($colPasNuevo){
        $puedeAgregar=false;
        $objColPas=$this->getObjColPasajeros();
        $objPasajero=[];

        if($this->puedeAbordar()=="true"){
            echo $this->puedeAbordar();
            echo "lala";
            for ($i=0;$i<count($colPasNuevo);$i++){
                $objColPas[]=$colPasNuevo[$i];
            //    echo $objPasajero;
                //$objColPas[]=$objPasajero;
            }

       //    $coleccionPas[]=$colPasNuevo;

           
           print_r($objColPas);
//            $this->setObjColPasajeros($coleccionPas);
            $this->setObjColPasajeros($objColPas);
            $puedeAgregar=true;

        }
        return $puedeAgregar;

    }

/**
 * funcion que compara la cantidad disponible con los datos cargados     
*/
    public function puedeAbordar(){
        $aborda=false;
        $objColPas=$this->getObjColPasajeros();
        if($this->getCantMaxPas()>=count($objColPas)){
            $aborda=true;
        }
        return $aborda;
    }
/**
 *funcion que modfica un pasajero a partir de un dni buscado
 *  
 */
public function modificarPasajero($nombre,$apellido,$telefono,$buscarDni){
    $indice=$this->buscarPasajero($buscarDni);
    if($indice>0){
        $objColPas=$this->getObjColPasajeros();
        $objColPas[$indice]['Nombre']=$nombre;
        $objColPas[$indice]['Apellido']=$apellido;
        $objColPas[$indice]['Telefono']=$telefono;
        $this->setObjColPasajeros($objColPas);
    }
    return $indice;

   }
   public function eliminarPasajero($dni){
    $esEliminado=false;
    $nombreE=null;
    $apellidoE=null;
    $dniE=null;
    $telefonoE=null;
    $objColPas=$this->getObjColPasajeros();
    $indice=$this->buscarPasajero($dni);
    if($indice>0){
        $objColPas[$indice]['Nombre']=$nombreE;
        $objColPas[$indice]['Apellido']=$apellidoE;
        $objColPas[$indice]['DNI']=$dniE;
        $objColPas[$indice]['Telefono']=$telefonoE;
        $this->setObjColPasajeros($objColPas);
        $esEliminado=true;
    }
    return $esEliminado;
   }

}

?>

}