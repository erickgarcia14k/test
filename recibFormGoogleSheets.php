<?php
if(($_SERVER["REQUEST_METHOD"] =="POST")){
    $jsondata = array();

    //Estableciendo conexion con el Servidor
    $usuario  = "root";
    $password = "";
    $servidor = "localhost";
    $basededatos = "landingkit";
    $con = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al Servidor");
    $db = mysqli_select_db($con, $basededatos) or die("Upps! Error en conectar a la Base de Datos");
    

    //Recibiendo la Data del Formulario
    date_default_timezone_set("America/Bogota");
    $dateCreate     = date('d-m-Y H:i:s A', time());
	$Nombre 		= $_REQUEST['Nombre'];
	$Correo         = $_REQUEST['Correo'];
	$Lenguajes  	    = $_REQUEST['Lenguajes'];
    $Calificacion  	    = $_REQUEST['Calificacion'];
	
    $queryInsertFormGoogleSheets  = ("INSERT INTO demo(Nombre,Correo,Lenguajes,Calificacion) 
        VALUES ('$Nombre','$Correo','$Lenguajes','$Calificacion')");
    $resultInsert = mysqli_query($con, $queryInsertFormGoogleSheets);
    
    if($resultInsert !=0){
        $jsondata['msj'] = true;
    }else{
        $jsondata['msj'] = false;
    }

    header('Content-type: application/json; charset=utf-8');
    echo json_encode($jsondata);
    exit();

}
	
?>