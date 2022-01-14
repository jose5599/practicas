<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API</title>
</head>
<body>
    <form action="" class="mt-3">
        <input type="submit" name="pers_femeninos" value="pers_femeninos">
        <input type="submit" name="pers_humanos_masc" value="pers_humanos_masc">
        <input type="submit" name="pers_imagenes" value="pers_imagenes">
        <input type="submit" name="nom_per_nohuman_convarita" value="nom_per_nohuman_convarita">
        <input type="submit" name="nom_per_actores" value="nom_per_actores">
        <br><br>
    </form>
    <hr>
    <br>
    <?php
        if (isset($_GET["pers_femeninos"])) {
            $femeninos="https://hp-api.herokuapp.com/api/characters";
            $personajes_femeninos = curl_init($femeninos);
            curl_setopt($personajes_femeninos, CURLOPT_HTTPGET, true);
            curl_setopt($personajes_femeninos, CURLOPT_RETURNTRANSFER, true);
            $response_json = curl_exec($personajes_femeninos);
            curl_close($personajes_femeninos);
            $respuesta=json_decode($response_json, true);
            p_femeninos($respuesta);
        }
        function p_femeninos($respuesta){ 
            $personajes_fem = 0;
            foreach ($respuesta as $v) {
                
                $gender = $v['gender'];
                $name = $v['name'];
                if ($gender == 'female'){
                    $personajes_fem++;
                    echo "<li>".$name."</li>";
                }
            }
            echo "<b>"."personajes femeninos: ".$personajes_fem."<b>";
        }

        if (isset($_GET["pers_humanos_masc"])) {
            $femeninos="https://hp-api.herokuapp.com/api/characters";
            $personajes_femeninos = curl_init($femeninos);
            curl_setopt($personajes_femeninos, CURLOPT_HTTPGET, true);
            curl_setopt($personajes_femeninos, CURLOPT_RETURNTRANSFER, true);
            $response_json = curl_exec($personajes_femeninos);
            curl_close($personajes_femeninos);
            $respuesta=json_decode($response_json, true);
            p_mas_human($respuesta);
        }
        function p_mas_human($respuesta){ 
            $p_mas_humanos = 0;
            foreach ($respuesta as $v) {
                $species = $v['species'];
                $gender = $v['gender'];
                $name = $v['name'];
                if (($species == 'human') && ($gender == 'male')){
                    $p_mas_humanos++;
                    echo "<li>".$name."</li>";
                }
            }
            echo "<b>"."personajes masculinos humanos: ".$p_mas_humanos."<b>";
        }

        if (isset($_GET["pers_imagenes"])) {
            $femeninos="https://hp-api.herokuapp.com/api/characters";
            $personajes_femeninos = curl_init($femeninos);
            curl_setopt($personajes_femeninos, CURLOPT_HTTPGET, true);
            curl_setopt($personajes_femeninos, CURLOPT_RETURNTRANSFER, true);
            $response_json = curl_exec($personajes_femeninos);
            curl_close($personajes_femeninos);
            $respuesta=json_decode($response_json, true);
            p_images($respuesta);
        }
        function p_images($respuesta){ 
            $p_images_c = 0;
            foreach ($respuesta as $v) {
                $image = $v['image'];
                $name = $v['name'];
                if ($image !== ''){
                    $p_images_c++;
                    echo "<img src='$image' width='70px' height='70px'style='padding-right:5px;'>";
                }
            }
            echo "<br>";
            echo "<b>"."personajes masculinos humanos: ".$p_images_c."<b>";
        }

        if (isset($_GET["nom_per_nohuman_convarita"])) {
            $femeninos="https://hp-api.herokuapp.com/api/characters";
            $personajes_femeninos = curl_init($femeninos);
            curl_setopt($personajes_femeninos, CURLOPT_HTTPGET, true);
            curl_setopt($personajes_femeninos, CURLOPT_RETURNTRANSFER, true);
            $response_json = curl_exec($personajes_femeninos);
            curl_close($personajes_femeninos);
            $respuesta=json_decode($response_json, true);
            nom_per_nohuman_convar($respuesta);
        }
        function nom_per_nohuman_convar($respuesta){ 
            $nom_per_nohuman_convar_contador = 0;
            foreach ($respuesta as $v) {
                $species = $v['species'];
                $wand = $v['wand']['length'];
                $name = $v['name'];
                if (($species != 'human') and ($wand !='')){
                    $nom_per_nohuman_convar_contador++;
                    echo "<li>".$name."</li>";
                }
            }
            echo "<br>";
            echo "<b>"."personajes no humanos con varita: ".$nom_per_nohuman_convar_contador."<b>";
        }

        if (isset($_GET["nom_per_actores"])) {
            $femeninos="https://hp-api.herokuapp.com/api/characters";
            $personajes_femeninos = curl_init($femeninos);
            curl_setopt($personajes_femeninos, CURLOPT_HTTPGET, true);
            curl_setopt($personajes_femeninos, CURLOPT_RETURNTRANSFER, true);
            $response_json = curl_exec($personajes_femeninos);
            curl_close($personajes_femeninos);
            $respuesta=json_decode($response_json, true);
            nom_per_actor($respuesta);
        }
        function nom_per_actor($respuesta){ 
            $nom_per_actoras = 0;
            foreach ($respuesta as $v) {
                $actor = $v['actor'];
                $name = $v['name'];
                $alternate_actors = $v['alternate_actors'];
                
                foreach($alternate_actors as $f){
                    $valor = $f;
                }
                if($actor!=""){
                    $nom_per_actoras++;
                    echo "<li>".$name." - ".$actor." - ".$valor."</li>";
                }
            }
            echo "<br>";
            echo "<b>"."Actores/ aletrnativos y personajes: ".$nom_per_actoras."<b>";
        }

?>