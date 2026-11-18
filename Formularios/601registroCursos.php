<?php
if(!isset($_POST['boton'])){
    include_once "601registroCursos.html";
}else{
    //creamos las variables de nuestro formulario
    $nombre = trim($_POST['nombre'] ?? "");
    $email = trim($_POST['email'] ?? "");
    $edad = trim($_POST['edad'] ?? "");
    $modalidad = $_POST['modalidad'] ?? "";
    $turnos = $_POST['turnos'] ?? [];
    $nivel = $_POST['nivel'] ?? "";

    //validaciones

}