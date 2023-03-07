<?php

Class Sesiones {

    // FUNCIÓN CONEXIÓN DB
    function conexion(){
        $servername = "bdpru.consorciopst.com/cintr";
        $username = "bitacora";
        $password = "b1t4c0r42023";

        $c = oci_connect($username, $password, $servername);
        if (!$c) {
           return 0;
        } else {
           return $c;
        }
    }

function consulta(){

        $c = $this->conexion();

        $query = "SELECT * FROM Bit_Usuario;";
        $results = oci_parse($c, $query);
        oci_execute($results);
        $row = oci_fetch_array($results, OCI_BOTH);

        if(empty($row) || is_null($row)){
            echo "NO HAY REGISTROS!";
        } else {
         $array = [
            '1' => $row[0],
            '2' => $row[1],
            '3' => $row[2]];
        echo "ID_USUARIO".$array['1'];
        }
    oci_close($c);
}

}
?>