<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro usuarios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
</head>
<body >
    <div class="container">
        <!-- Content here -->
        <?php if(isset($mensaje)):?>
            <?php if(isset($tipo)):?>
                <?=$mensaje?>
            <?php endif?>
        <?php endif?>
        <a href="/lista" class="btn btn-secondary">Lista de usuarios</a>
        <div class="panel panel-default">
            <div class="panel-heading">Registro</div>
            <div class="panel-body">
                    <form action="Registrar" method="post">
                        @csrf
                        <?php if(isset($usuario)): ?>
                        <input type="hidden" name="id_usuario" value="<?=$usuario->ID_REGI?>">
                        <?php endif?>
                        <input type="hidden" name="id_usuario">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" name="nombre" minlength="1" maxlength="60" required value="<?php if(isset($usuario)){
                          echo $usuario->NOMBRE_REGI;
                        } ?>">
                        <label for="">Rfc</label>
                        <input type="text" class="form-control" name="rfc" id="rfc" minlength="1" maxlength="60" required value="<?php if(isset($usuario)){
                          echo $usuario->RFC_REGI;
                        } ?>">
                        <label for="">Correo</label>
                        <input type="email" class="form-control" name="correo" id="correo" minlength="1" maxlength="60" required value="<?php if(isset($usuario)){
                          echo $usuario->CORREO_REGI;
                        } ?>">
                        <label for="">Direccion</label>
                        <input type="text" class="form-control" name="direccion" id="direccion" minlength="1" maxlength="120" required value="<?php if(isset($usuario)){
                          echo $usuario->DIRECCION_REGI;
                        } ?>">
                        <label for="">Comentarios</label>
                        <textarea name="comentario" class="form-control" id="comentario" cols="10" rows="5" minlength="1" maxlength="1000" required><?php if(isset($usuario)){ echo $usuario->COMENTARIOS_REGI;} ?>
                        </textarea>
                        <label for="">Latitud</label>
                        <input type="text" class="form-control" name="latitud"  id="latitud" minlength="1" maxlength="120" required>
                        <label for="">Longitud</label>
                        <input type="text" class="form-control" name="longitud" id="longitud" minlength="1" maxlength="120" required>
                        <input type="submit" class="btn btn-primary" value="Enviar">
                    </form>
            </div>
        </div>
    </div>
</body>
</html>
<script>
function geoFindMe() {
  var output = document.getElementById("out");
  if (!navigator.geolocation){
    output.innerHTML = "<p>Geolocation is not supported by your browser</p>";
    return;
  }
  function success(position) {
    var latitude  = position.coords.latitude;
    var longitude = position.coords.longitude;
    document.getElementById('latitud').value=latitude;
    document.getElementById('longitud').value=longitude;
  };
  function error() {
    output.innerHTML = "Unable to retrieve your location";
  };
  navigator.geolocation.getCurrentPosition(success, error);
}
window.onload=geoFindMe;
</script>