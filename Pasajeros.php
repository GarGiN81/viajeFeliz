<?php
class Pasajeros{
//atributos de la clase
private $nombre;
private $apellido;
private $nroDni;
private $telefono;
//método constructor
public function __construct($pNombre,$pApellido,$pDni,$pTelefono){
$this->nombre=$pNombre;
$this->apellido=$pApellido;
$this->nroDni=$pDni;
$this->telefono=$pTelefono;
} 
//MÉTODOS DE ACCESO

//metodos GET
public function getNombre(){
return $this->nombre;
}
public function getApellido(){
return $this->apellido;
}
public function getNroDni(){
return $this->nroDni;
}
public function getTelefono(){
return $this->telefono;
}

//metodos SET
public function setNombre($nombre){
$this->nombre=$nombre;
}
public function setApellido($apellido){
$this->apellido=$apellido;
}
public function setNroDni($nroDni){
$this->nroDni=$nroDni;
}
public function setTelefono($telefono){
$this->telefono=$telefono;
}

//metodos de visualización de datos
//metodo toString
public function __toString(){
$cadena="";
$cadena="Nombre: ".$this->getNombre()."\n
         Apellido: ".$this->getApellido()."\n
         DNI: ".$this->getNroDni()."\n
         Telefono: ".$this->getTelefono()."\n";
return $cadena;
}


}


?>
