<?php

/*
 *codigo para mostrar una lista de datos
 */


$response = array();


// se incluye esta clase
require_once  '../Modelo/CapaDatos/ClassConexion.php';

// conectandose con la base de datos
  $objC =  new conexion();

   $conn =  $objC->ObtenerConexion();

     $sql = 'CALL Sp_samShwRegPers()';
           //run the store proc
     $result = mysqli_query($conn, $sql);


// comprueba si existen datos
if (mysqli_num_rows($result) > 0) {
    
    $response["datos"] = array();
    
    while ($row = mysqli_fetch_array($result)) {
        
//se igualan el valor de los datos con las variables

        $persona = array();
        $persona["SAM07CedUsr"] = $row["SAM07CedUsr"];
        $persona["SAM07NomPers"] = $row["SAM07NomPers"];
        $persona["SAM07CorrPers"] = $row["SAM07CorrPers"];
        
        array_push($response["datos"], $persona);
    }
    // si es exitosa la respuesta es un 1
    $response["success"] = '1';

    // eco de respuesta de JSON
    echo json_encode($response);
} else {
    // no se encontraron datos
    $response["success"] = '0';
    $response["message"] = "No person found";

    
    echo json_encode($response);
}
?>