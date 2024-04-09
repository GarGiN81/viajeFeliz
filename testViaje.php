<?php

include_once ("Pasajeros.php");
include_once ("ResponsableV.php");
include_once ("Viaje.php");

//lista precargada de 5 pasajeros
$colPasajero=[
    new Pasajeros("JOSE","SUAREZ","16111464","5685894"),
    new Pasajeros("MARIA","MERINO","28122201","4586972"),
    new Pasajeros("SEBASTIAN","SAN MARTIN","16455533","4052783"),
    new Pasajeros("VIVIANA","GONZALEZ","98365787","6545368"),
    new Pasajeros("ROBERTO","LAVALLE","78563412","4523854")
];


//MENU INICIAL- carga de datos
echo "*********************************************************\n";
echo "Bienvenidx a Viaje Feliz: \n";
echo "*********************************************************\n";
echo "Para comenzar, por favor ingrese los siguientes datos: \n";
echo "Ingrese código del viaje: ";
$cod=trim(fgets(STDIN));
echo "Ingrese destino del viaje: ";
$dest=strtoupper(trim(fgets(STDIN)));
echo "Ingrese cantidad máxima de pasajeros que pueden abordar: ";
$cMax=trim(fgets(STDIN));
echo "A continuación ingrese los Datos del Responsable del Viaje: \n";
echo "Ingrese Número del empleado: ";
$nroEmpleado=trim(fgets(STDIN));
echo "Ingrese número de Licencia: ";
$nroLic=trim(fgets(STDIN));
echo "Ingrese Nombre: ";
$nombreRespV=strtoupper(trim(fgets(STDIN)));
echo "Ingrese Apellido: ";
$apellidoRespV=strtoupper(trim(fgets(STDIN)));
$objResponsableV=new ResponsableV($nroEmpleado,$nroLic,$nombreRespV,$apellidoRespV);

$objViaje=new Viaje($cod,$dest,$cMax,$objResponsableV,$colPasajero);




//lista precargada de 10 pasajeros(PRIMERA ENTREGA)
    //$colPasajero[0]=['Nombre'=>"JOSE",'Apellido'=>"SUAREZ",'DNI'=>'16111464','Telefono'=>'5685894'];
    //$colPasajero[1]=['Nombre'=>"MARIA",'Apellido'=>"MERINO",'DNI'=>'28122201','Telefono'=>'4586972'];
    //$colPasajero[2]=['Nombre'=>"JUAN",'Apellido'=>"SUAREZ",'DNI'=>'18222333','Telefono'=>'2536786'];
    //$colPasajero[3]=['Nombre'=>"JOSE",'Apellido'=>"GUTIERREZ",'DNI'=>'22122136','Telefono'=>'4457845'];
    //$colPasajero[4]=['Nombre'=>"MARIO",'Apellido'=>"VILLABLANCA",'DNI'=>'21145023','Telefono'=>'1256458'];
    //$colPasajero[5]=['Nombre'=>"SEBASTIAN",'Apellido'=>"SAN MARTIN",'DNI'=>'16455533','Telefono'=>'4052783'];
    //$colPasajero[6]=['Nombre'=>"ROBERTO",'Apellido'=>"LAVALLE",'DNI'=>'78563412','Telefono'=>'4523854'];
    //$colPasajero[7]=['Nombre'=>"VIVIANA",'Apellido'=>"GONZALEZ",'DNI'=>'98365787','Telefono'=>'6545368'];
    //$colPasajero[8]=['Nombre'=>"ANTONELA",'Apellido'=>"MARIN",'DNI'=>'45365452','Telefono'=>'5601037'];
    //$colPasajero[9]=['Nombre'=>"KEVIN",'Apellido'=>"FIGUEROA",'DNI'=>'36452785','Telefono'=>'4078980'];
    //$objViaje->setObjColPasajeros($colPasajero);




/**
 * menu de opciones-modificacion de datos
 * 
 */
function menuOpciones(){
    return $menu = 
    "***********************************************************\n
    1. Modificar el código del viaje.\n
    2. Modificar el destino del viaje.\n
    3. Modificar la cantidad de pasajeros que pueden abordar.\n
    4. Agregar Pasajero. \n
    5. Quitar Pasajero. \n
    6. Modificar Pasajero. \n
    7. Ver viaje. \n
    8. Salir. \n
    **************************************************************\n
    Elija una opción: ";
    
}


$bandera=true;
do{
    echo menuOpciones();
    $opcion=trim(fgets(STDIN));
  
    switch($opcion){
        case '1': //Modificar el código del viaje
            echo "El viaje actual posee el código: ".$objViaje->getCodigo()."\n";
            echo "Ingrese un nuevo código: ";
            $cod=trim(fgets(STDIN));
            $objViaje->setCodigo($cod);
            break;
        case '2': //Modificar el destino del viaje
            echo "El viaje actual posee el siguiente destino: {$objViaje->getDestino()}\n";
            echo "Ingrese un nuevo destino: ";
            $dest=trim(fgets(STDIN));
            $objViaje->setDestino($dest);
            break;
        case '3': //Modificar la cantidad de pasajeros que pueden abordar
            echo "El viaje posee: {$objViaje->getCantMaxPas()}\n";
            echo "Ingrese nueva cantidad máxima de pasajeros: ";
            $cMax=trim(fgets(STDIN));
            $objViaje->setCantMaxPas($cMax);
            break;
        case '4': //Agregar Pasajero
            if($objViaje->puedeAbordar()){
                echo "Ingrese los datos del pasajero: \n";
                echo "Nombre: ";
                $nombrePas= strtoupper(trim(fgets(STDIN)));
                echo "Apellido: ";
                $apellidoPas=strtoupper(trim(fgets(STDIN)));
                echo "DNI: ";
                $dniPas=trim(fgets(STDIN));
                echo "Telefono: ";
                $telefonoPas=trim(fgets(STDIN));
                if(!$objViaje->encontroPasajero($dniPas)){
                    $obtenerCol=$objViaje->getObjColPasajeros();
                    $colPasajero=[
                        new Pasajeros($nombrePas,$apellidoPas,$dniPas,$telefonoPas)
                    ];
                    $pasarColeccion[count($obtenerCol)]=$colPasajero;
                    if($objViaje->agregarPasajero($pasarColeccion)){
                    echo "Pasajero agregado. \n";
                    }
                }else{
                    echo "No se pudo agregar. \n";
                    echo "El Pasajero ingresado ya existe";
                }
                
            }else{
                echo "No se pudo agregar. \n";
                echo "Se ha alcanzado el límite de pasajeros";
            } 
            break;
        case '5': //Quitar Pasajero
            echo "Ingrese el DNI del pasajero a quitar: \n";
            $dniP=trim(fgets(STDIN));
            if($objViaje->eliminarPasajero($dniP)){
                echo "Pasajero eliminado.\n";
            }else{
                echo "El dato ingresado no se encontró o no existe.\n";
            }
            break;
        case '6': //Modificar Pasajero
            echo "Ingrese el DNI del pasajero que desea modificar: \n";
            $dniMod=trim(fgets(STDIN));
            if ($objViaje->encontroPasajero($dniMod)){
                echo "Ingrese los datos nuevos del pasajero: \n";
                echo "Nombre: ";
                $nombre= strtoupper(trim(fgets(STDIN)));
                echo "Apellido: ";
                $apellido=strtoupper(trim(fgets(STDIN)));
                echo "DNI: ";
                $dni=trim(fgets(STDIN));
                $esModificado=$objViaje->modificarPasajero($dni,$nombre,$apellido,$dniMod);
                if($esModificado>0){
                    echo "Los datos del pasajero se han actualizado";
                }
            }else{
                echo "El dato ingresado es incorrecto";
            }
            break;
        case '7': //Ver viaje
            echo $objViaje;
            break;
        default : //Salir
            $bandera=false;
            break;
    }

}while($bandera);
