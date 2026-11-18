<?php

if (!isset($_POST['enviar'])) {
    include_once("402formulario.html");
} else {
    $nombre = $_POST['nombre'] ?? "";
    $email = $_POST['email'] ?? "";
    $url = $_POST['url'] ?? "";
    $sexo = $_POST['sexo'] ?? "";
    $convivientes = $_POST['convivientes'] ?? "";
    $aficiones = $_POST['aficiones'] ?? [];
    $menu = $_POST['menu'] ?? [];

    //Validación
    $errores = [];
    //nombre
    if (trim($nombre) === "") {
        $errores ['nombre'] = "Error en nombre";
    }
    //email
    if(filter_var(trim($email), FILTER_VALIDATE_EMAIL)===false){
        $errores ['email'] = "Error en email";
    }

    //url
    if (filter_var(trim($url), FILTER_VALIDATE_URL) === false) {
        $errores['url'] = "Error en URL";
    }
    //sexo
    $valoresSexo = ["hombre", "mujer", "otro"];
    if(!in_array($sexo, $valoresSexo, true)){
        $errores ['sexo'] = "Error en sexo";
    }

    //convivientes
    $valor = filter_var($convivientes, FILTER_VALIDATE_INT);
    if ($valor === false || $valor < 0 || $valor > 20) {
        $errores['convivientes'] = "Fallo en convivientes";
    }

    //aficiones
    $valores = ["lectura", "deporte", "cine", "musica"];
    if (!is_array($aficiones) || count($aficiones) == 0 || count(array_diff($aficiones, $valores)) !=0){
        $errores ['aficiones'] = "Fallo en aficiones!!!!!";
    }
    //menú
    $comidas = ["paella", "tortilla", "pasta", "ensalada"];
    if (!is_array($menu)|| count($menu) == 0 || count(array_diff($menu, $comidas)) !=0){
        $errores ['menu'] = "Fallo en menú";
    }

    if (!is_array($aficiones)) {
        $aficiones = [];
    }
    if (!is_array($menu)) {
        $menu = [];
    }


    if(empty($errores)){
            //formulario enviado correctamente
        ?>
        <style>
            table, thead, tbody, th, td{
                border-collapse: collapse;
                border: 1px solid black;
                text-align: center;
            }
        </style>
        <table>
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Url</th>
                <th>Sexo</th>
                <th>Convivientes</th>
                <th>Aficiones</th>
                <th>Menú</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?php echo $nombre ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $url ?></td>
                <td><?php echo $sexo ?></td>
                <td><?php echo $convivientes ?></td>
                <td><?php echo implode(",",$aficiones) ?></td>
                <td><?php echo implode(",", $menu) ?></td>
            </tr>
            </tbody>
        </table>
        <?php
    }else{
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

        <p>
            <label for="nombre">Nombre y apellidos:</label>
            <input type="text" name="nombre" id="nombre" value="<?= $nombre ?>" />
            <br>   <span class="error"><?= $errores['nombre'] ?? "" ?></span>
        </p>

        <p>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?= $email ?>" />
            <br>    <span class="error"><?= $errores['email'] ?? "" ?></span>

        </p>

        <p>
            <label for="url">URL página personal:</label>
            <input type="url" name="url" id="url" value="<?= $url ?>" />
            <br> <span class="error"><?= $errores['url'] ?? "" ?></span>

        </p>

        <p>
            <span>Sexo:</span><br>
            <input type="radio" name="sexo" id="sexoH" value="hombre" <?= ($sexo === 'hombre') ? 'checked' : '' ?> />
            <label for="sexoH">Hombre </label>

            <input type="radio" name="sexo" id="sexoM" value="mujer"  <?= ($sexo === 'mujer') ? 'checked' : '' ?> />
            <label for="sexoM">Mujer</label>

            <input type="radio" name="sexo" id="sexoO" value="otro"  <?= ($sexo === 'otro') ? 'checked' : '' ?> />
            <label for="sexoO">Otro</label>
            <br> <span class="error"><?= $errores['sexo'] ?? "" ?></span>

        </p>

        <p>
            <label for="convivientes">Número de convivientes en el domicilio:</label>
            <input type="number" name="convivientes" id="convivientes" min="0" value="<?= $convivientes?>"/>
            <br> <span class="error"><?= $errores['convivientes'] ?? "" ?></span>

        </p>

        <p>
            <span>Aficiones:</span><br>
            <input type="checkbox" name="aficiones[]" id="aficionLectura" value="lectura" <?php if(in_array("lectura", $aficiones)) echo 'checked ="checked"';?>/>
            <label for="aficionLectura">Lectura</label><br>

            <input type="checkbox" name="aficiones[]" id="aficionDeporte" value="deporte" <?php if(in_array("deporte", $aficiones)) echo 'checked ="checked"';?>/>
            <label for="aficionDeporte">Deporte</label><br>

            <input type="checkbox" name="aficiones[]" id="aficionCine" value="cine" <?php if(in_array("cine", $aficiones)) echo 'checked ="checked"';?>/>
            <label for="aficionCine">Cine</label><br>

            <input type="checkbox" name="aficiones[]" id="aficionMusica" value="musica" <?php if(in_array("musica", $aficiones)) echo 'checked ="checked"';?>/>
            <label for="aficionMusica">Música</label>
            <br><span class="error"><?= $errores['aficiones'] ?? "" ?></span>

        </p>

        <p>
            <label for="menu">Menú favorito (mantén Ctrl o Cmd para elegir varios):</label><br>
            <select name="menu[]" id="menu" multiple size="4">
                <option value="paella" <?= in_array("paella", $menu)?'selected' : '' ?>>Paella</option>
                <option value="tortilla" <?= in_array("tortilla", $menu)?'selected' : '' ?>>Tortilla de patatas</option>
                <option value="pasta" <?= in_array("pasta", $menu)?'selected' : '' ?>>Pasta carbonara</option>
                <option value="ensalada"<?= in_array("ensalada", $menu)?'selected' : '' ?>>Ensalada César</option>
            </select>
            <br>  <span class="error"><?= $errores['menu'] ?? "" ?></span>

        </p>

        <input type="submit" value="Enviar" name="enviar" />

    </form>
<?php  }
}?>