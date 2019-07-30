<?php
require_once "php/conexion.php";
$conexion=conexion();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

    <title></title>
  </head>
  <body>
    <div class="card text-center">
    <div class="card-header">
      <ul class="nav nav-pills card-header-pills">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categorias.php">Categorias</a>
        </li>
      </ul>
    </div>
    <div class="card-body">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Agregar Categorias</button>
      <br>
      <br>
          <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Id Categoria</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Editar</th>
                            <th scipe="col">Eliminar</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <?php
                            $sql="SELECT * FROM categorias ";
                              $result=mysqli_query($conexion,$sql);
                              while($ver=mysqli_fetch_row($result)){
                             ?>
                            <tr>
                              <td scope="row" ><?php echo $ver[0] ?></td>
                              <td><?php echo $ver[1] ?></td>
                              <td><?php echo $ver[2] ?></td>
                              <td>
                                <a href="php/updatecategoria.php?id_catergoria=<?php echo $ver[0];?>" class="btn btn-primary glyphicon glyphicon-eye-open"></a>
                              </td>
                              <td>
                                <a href="php/deletecategoria.php?id_catergoria=<?php echo $ver[0];?>" class="btn btn-danger glyphicon glyphicon-eye-open"></a>
                              </td>
                            </tr>
                            <?php
                          }
                          ?>
                          </tr>
                        </tbody>
          </table>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar Categorias</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Nombre</label>
                <input type="text" required name="nombrecategoria" id="nombrecategoria" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Descripción</label>
                <input type="text" required name="descripcioncategoria" id="descripcioncategoria" class="form-control">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnenviar" name ="btnenviar" class="btnenviar btn btn-primary">Registrar</button>
          </div>
        </div>
      </div>
    </div>

</div>
  </body>
</html>


<script type="text/javascript">

   $(document).ready(function(){
        $("#btnenviar").click(function(){
            var nombrecategoria=$("#nombrecategoria").val();
            var descripcioncategoria=$("#descripcioncategoria").val();
            $.ajax({
                url:'php/addcategoria.php',
                method:'POST',
                data:{
                    nombrecategoria:nombrecategoria,
                    descripcioncategoria:descripcioncategoria
                },
               success:function(data){
                location.reload();
                // alert(data);
                 $("#nombrecategoria").val('');
                 $("#descripcioncategoria").val('');
               }
            });
        });
    });

   </script>
