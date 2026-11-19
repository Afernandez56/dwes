<?php

$nombre = "";
$email = "";
$edad = "";
$modalidad = "";
$turnos = [];
$nivel = "";
$formularioCorrecto = false;
$errores = [];

if(isset($_POST['boton'])){
    //creamos las variables de nuestro formulario
    $nombre = trim($_POST['nombre'] ?? "");
    $email = trim($_POST['email'] ?? "");
    $edad = trim($_POST['edad'] ?? "");
    $modalidad = $_POST['modalidad'] ?? "";
    $turnos = $_POST['turnos'] ?? [];
    $nivel = $_POST['nivel'] ?? "";

    //validaciones



    if ($nombre === ""){
        $errores ['nombre'] = "Fallo verificando el nombre";
    }

    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false){
        $errores ['email'] = "Fallo verificando el email";
    }


    if(filter_var($edad, FILTER_VALIDATE_INT) === false  || ($edad < 16 || $edad > 99 ) ){
        $errores ['edad'] = "Fallo verificando la edad";
    }

    $valoresModalidad = ["presencial","online"];

    if (!in_array($modalidad, $valoresModalidad)){
        $errores ['modalidad'] = "Fallo verificando la modalidad";
    }

    $valoresTurno = ["mañana","tarde","noche"];

    if (!is_array($turnos) || (count(array_diff($turnos,$valoresTurno))>0 || count($turnos) === 0)){
        $errores ['turnos'] = "Fallo verificando el turno";
    }

    $valoresNivel = ["basico","medio","avanzado"];

    if (!in_array($nivel, $valoresNivel)){
        $errores ['nivel'] = "Fallo verificando el nivel";
    }


    if(count($errores) === 0 ) {
        $formularioCorrecto = true;
    }

}


//CREO EL FORMULARIO STICKY
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>formulario</title>
</head>
<body>

<?php if (!$formularioCorrecto){ ?>
    <form action="" method="POST">
        <p>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="<?= $nombre ?>" required>
        </p>
        <p>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= $email ?>" required>
        </p>
        <p>
            <label for="edad">Edad</label>
            <input type="number" name="edad" id="edad" min="16" max="99" value="<?= $edad ?>" required>
        </p>
        <p>
            <input type="radio" name="modalidad" id="presencial" value="presencial" <?= $modalidad === 'presencial' ? 'checked':'' ?> required>
            <label for="presencial">Presencial</label>

            <input type="radio" name="modalidad" id="online" value="online" <?= $modalidad === 'online' ? 'checked':'' ?> required>
            <label for="online">Online</label>
        </p>
        <p>
            <input type="checkbox" name="turnos[]" id="mañana" value="mañana" <?= in_array('mañana',$turnos) ? 'checked':'' ?>>
            <label for="mañana">Mañana</label>

            <input type="checkbox" name="turnos[]" id="tarde" value="tarde" <?= in_array('tarde',$turnos) ? 'checked':'' ?>>
            <label for="tarde">Tarde</label>

            <input type="checkbox" name="turnos[]" id="noche" value="noche" <?= in_array('noche',$turnos) ? 'checked':'' ?>>
            <label for="noche">Noche</label>
        </p>
        <p>
            <label for="nivel">Selecciona tu nivel de inglés</label><br>
            <select name="nivel" id="nivel" size="3" "" required>
                <option value="basico" <?= $nivel === 'basico' ? 'selected':'' ?>>Básico</option>
                <option value="medio" <?= $nivel === 'medio' ? 'selected':'' ?>>Intermedio</option>
                <option value="avanzado" <?= $nivel === 'avanzado' ? 'selected':'' ?>>Avanzado</option>
            </select>
        </p>

        <button type="submit" name="boton">Enviar</button>
        <br>
        <?php
        foreach ($errores as $item) {
            echo "$item <br>";
        } ?>

    </form>
<?php }else{ ?>
    <style>
        table,th,td{
            border: black 1px solid;
        }
    </style>

    <table>
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Edad</th>
            <th>Modalidad</th>
            <th>Turnos</th>
            <th>Nivel</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?= $nombre ?></td>
            <td><?= $email ?></td>
            <td><?= $edad ?></td>
            <td><?= $modalidad ?></td>
            <td><?= join(",",$turnos) ?></td>
            <td><?= $nivel ?></td>
        </tr>
        </tbody>
    </table>


<?php } ?>
</body>
</html>


