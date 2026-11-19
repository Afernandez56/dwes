<?php
/*• 602 · encuestaCine.php: película favorita (select), valoración de 1 a 5 (radio), géneros (select múltiple con 5 valores), comentario (textarea, máximo 200 caracteres) y un checkbox único «acepto las condiciones». Fíjate en cómo llega un checkbox único cuando no se marca. */

$pelicula = "";
$valoracion = "";
$generos = [];
$comentario = "";
$condiciones = "";
$errores = [];
$formularioCorrecto = false;

if (isset($_POST['boton'])){
    //se ha enviado
    $pelicula = trim($_POST['pelicula'] ?? "");
    $valoracion = $_POST['valoracion'] ?? "";
    $generos = $_POST['generos'] ??[];
    $comentario = trim($_POST['comentario'] ?? "");
    $condiciones = trim($_POST['condiciones'] ??"");

    //valido
    $valoresPeliculas = ['Goodfellas','El Padrino','Singing in the Rain'];
    if( !in_array($pelicula, $valoresPeliculas)){
        $errores ['pelicula'] = "La película está vacía";
    }

    $valoresValoracion = [1,2,3,4,5];
    if( filter_var($valoracion,FILTER_VALIDATE_INT) === false || !in_array($valoracion, $valoresValoracion)){
        $errores ['valoracion'] = "La valoración es incorrecta";
    }

    $valoresGeneros = ['terror','accion','mafia','romance'];
    if (!is_array($generos) || count($generos) === 0 || (count(array_diff($generos,$valoresGeneros))) > 0){
        $errores ['generos'] = "Error en la selección de género";
    }

    if($comentario === "" || mb_strlen($comentario) > 200){
        $errores ['comentario'] = "Debes añadir un comentario";
    }

    $condicionUnica = 'acepto';
    if ($condiciones !== $condicionUnica){
        $errores ['condiciones'] = "Debes aceptar las condiciones";
    }

    if(count($errores) === 0){
        $formularioCorrecto = true;
    }
} ?>

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

<?php
if(!$formularioCorrecto){ ?>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
    <p>
    <label for="pelicula">Elige tu película favorita</label><br>
    <select name="pelicula" id="pelicula">
        <option value="Goodfellas" id="Goodfellas" <?= $pelicula === 'Goodfellas' ? 'selected': '' ?>>Goodfellas</option>
        <option value="El Padrino" id="El Padrino" <?= $pelicula === 'El Padrino' ? 'selected': '' ?>>El Padrino</option>
        <option value="Singing in the Rain" id="Singing in the Rain" <?= $pelicula === 'Singing in the Rain' ? 'selected': '' ?>>Singing in the Rain</option>
    </select>
    </p>

    <p>
        <span>Nota</span><br>
    <input type="radio" name="valoracion" id="1" value="1" <?= $valoracion == 1 ? 'checked': '' ?>>
    <label for="1">1</label>
    <input type="radio" name="valoracion" id="2" value="2" <?= $valoracion == 2 ? 'checked': '' ?>>
    <label for="2">2</label>
    <input type="radio" name="valoracion" id="3" value="3" <?= $valoracion == 3 ? 'checked': '' ?>>
    <label for="3">3</label>
    <input type="radio" name="valoracion" id="4" value="4" <?= $valoracion == 4 ? 'checked': '' ?>>
    <label for="4">4</label>
    <input type="radio" name="valoracion" id="5" value="5" <?= $valoracion == 5 ? 'checked': '' ?>>
    <label for="5">5</label>
    </p>

    <p>
        <label for="generos">Elige el género</label><br>
        <select name="generos[]" id="generos" multiple>
            <option value="terror" id="terror" <?= in_array("terror",$generos) ? 'selected': '' ?>>Terror</option>
            <option value="accion" id="accion"  <?= in_array("accion",$generos) ? 'selected': '' ?>>Acción</option>
            <option value="mafia" id="mafia" <?= in_array("mafia",$generos) ? 'selected': '' ?>>Mafia</option>
            <option value="romance" id="romance" <?= in_array("romance",$generos) ? 'selected': '' ?>>Romance</option>
        </select>
    </p>

    <p>
        <label for="comentario">Comentarios:</label><br>
        <textarea name="comentario" id="comentario" cols="30" rows="10" maxlength="200" placeholder="Escribe aquí tu comentario sobre la película"  ><?= $comentario?></textarea>
    </p>
    <p>
        <input type="checkbox" name="condiciones" id="condiciones" value="acepto" <?= $condiciones == "acepto" ? 'checked' : '' ?>>
        <label for="condiciones">Acepto las condiciones</label>
    </p>

    <button type="submit" name="boton" id="boton">Enviar</button>
</form>

<?php } // Aqui haria un else si me pidiesen hacer algo con los datos ?>
</body>
</html>


