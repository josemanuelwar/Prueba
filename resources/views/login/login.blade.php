<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <label for="">Nombre</label>
    <input type="text" name="usuario" class="form-control" id="usuario">
    <label for="">Contraseña</label>
    <input type="password" name="password" class="form-control" id="password">
    <button onclick="conexion();">enviar</button>
</body>
</html>
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script>
function conexion() {
    var usuario=document.getElementById('usuario').value;
    var contraseña=document.getElementById('password').value;
    var url = 'http://expertensoft.com/API/users/v1/login/archivo.json?callback=envoltorio'
$.ajax(
   { url: 'http://expertensoft.com',
     type: 'post',//tipo de petición
     dataType: 'jsonp', //tipo de datos
     jsonpCallback: 'envoltorio',  //nombre de la funcion que envuelve la respuesta
     error: function(xhr, status, error) {
        alert("error");
     },
     success: function(jsonp) {
        if(jsonp.usuario  == usuario && jsonp.password == contraseña){
          alert('Bienvenido');
        }else{
          alert("fallo");
        }

     }
    }
);
envoltorio({"usuario":"paco","password":"paco123"})
}
</script>