<?php
class ResponsableV{

    private $nroEmpleado;
    private $nroLicencia;
    private $nombre;
    private $apellido;

public function __construct($rNroEmpleado,$rNroLicencia,$rNombre,$rApellido){
    $this->nroEmpleado=$rNroEmpleado;
    $this->nroLicencia=$rNroLicencia;
    $this->nombre=$rNombre;
    $this->apellido=$rApellido;
}

// METODOS DE ACCESO
//METODOS SET
public function getNroEmpleado(){
    return $this->nroEmpleado;
}
public function getNroLicencia(){
    return $this->nroLicencia;
}
public function getNombre(){
    return $this->nombre;
}
public function getApellido(){
    return $this->apellido;
}
//METODOS SET
public function setNroEmpleado($nroEmpleado){
    $this->nroEmpleado=$nroEmpleado;
}
public function setNroLicencia($nroLicencia){
    $this->nroLicencia=$nroLicencia;
}
public function setNombre($nombre){
    $this->nombre=$nombre;
}
public function setApellido($apellido){
    $this->apellido=$apellido;
} 
//metodos de lectura
public function __toString(){
    $cadena="";
    return $cadena=
    "Nro Empleado: ".$this->getNroEmpleado()."\n
     Nro Licencia: ".$this->getNroLicencia()."\n
     Nombre: ".$this->getNombre()."\n
     Apellido: ".$this->getApellido()."\n";

}
}