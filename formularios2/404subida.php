<?php
if (isset($_POST['btnSubir']) && $_POST['btnSubir'] == 'Subir') {

    $anchura = $_POST['anchura'] ?? "";
    $altura = $_POST ['altura'] ?? "";


$errores = [];

if (trim($anchura) === ""){
    $errores [] = "Error con la anchura";
}

if (trim($altura) === ""){
    $errores [] = "Error con la altura";
}
    if (is_uploaded_file($_FILES['archivoEnviado']['tmp_name']) && empty($errores)) {
        // subido con éxito
        $formatosAdmitidos = ["image/jpeg", "image/png", "image/webp"];
        if (in_array($_FILES['archivoEnviado']['type'], $formatosAdmitidos )){
            $nombre = $_FILES['archivoEnviado']['name'];
            if(move_uploaded_file($_FILES['archivoEnviado']['tmp_name'], "./archivosSubidos/{$nombre}")){
                echo "<p>Archivo $nombre subido con éxito</p><br>Altura $altura y anchura $anchura";

            }else{
                $errores [] = "Error con la carpeta mencionada";

            }


        }else{
            echo "El archivo debe ser una imagen";
            include_once "404subida.html";

    }
    }else{
    $errores [] =  "No ha llegado ningún archivo";
    foreach ($errores as $error){
        echo "$error <br>";
    }
}
} else {
    include_once "404subida.html";
}
