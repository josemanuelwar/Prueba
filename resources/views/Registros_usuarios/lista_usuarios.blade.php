<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lista de usuarios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
</head>
<body>
<div  class="container">
<a href="/" class="btn btn-secondary">Atras</a>
    <table id="tabla" class="table">
        <thead  class="thead-dark">
            <tr>
                <th scope="col">N°</th>
                <th scope="col">Nombre</th>
                <th scope="col">Direccion</th>
                <th scope="col">Correo</th>
                <th scope="col">Comentario</th>
                <th scope="col">Aciones</th>
            </tr>
        </thead>
        <tbody>
        <?php if(isset($lista)): ?>
            <?php if($lista != null): ?>
                <?php foreach ($lista as $value) :?>
                    <tr>
                    <td><?=$value->ID_REGI?></td>
                    <td><?=$value->NOMBRE_REGI?></td>
                    <td><?=$value->DIRECCION_REGI?></td>
                    <td><?=$value->CORREO_REGI?></td>
                    <td><?=$value->COMENTARIOS_REGI?></td>
                    <td>
                        <!-- <a href="/Actulizar/<?=$value->ID_REGI?>"  class="btn btn-outline-primary">Actualizar</a> -->
                        <form action="/Actulizar" method="post">
                            @csrf
                            <input type="hidden" name="id_usuario" value="<?=$value->ID_REGI?>">
                            <input type="submit" class="btn btn-outline-primary" value="Actulizar">
                        </form>
                        <a href="/eliminar/<?=$value->ID_REGI?>"  class="btn btn-outline-primary">Eliminar</a>
                    </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        <?php endif ?>
        </tbody>
    </table>
</div>
</body>
</html>
<script>
    $(document).ready(function () {
        $("#tabla").DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "stateSave": true,
            "responsive": true,
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por p&aacute;gina",
                "search": "Buscar: ",
                "zeroRecords": "No hay registros",
                "info": "Mostrando _START_ de _END_ de un total de _TOTAL_ registros",
                "infoFiltered": "(Fitltrando de un total de _MAX_ registros)",
                "paginate": {
                    "first": "Inicio",
                    "last": "&Uacte;ltimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "infoEmpty": "Sin Registros",
            },

        });
    });
</script>
