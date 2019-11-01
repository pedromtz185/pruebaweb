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
    <script src="js/funciones1.js"></script>

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
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Agregar Productos</button>
      <br>
      <br>
          <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Id Produto</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Nombre categoria</th>
                            <th scope="col">Descripción Categoria</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <?php
                            $sql="SELECT productos.id_producto,
                                         productos.id_categoria,
                                         productos.nombreproducto,
                                         productos.descripcionproducto,
                                         categorias.id_categoria as categoria1,
                                         categorias.nombrecategoria,
                                         categorias.descripcioncategoria
                                         FROM productos
                                         INNER JOIN categorias ON categorias.id_categoria = productos.id_categoria";
                              $result=mysqli_query($conexion,$sql);
                              while($ver=mysqli_fetch_row($result)){
                                $datos=
                                     preg_replace('/[\x00-\x1F\x7F]/u', '\n', $ver[0])
                                     //$ver[0]
                                     ."||".
                                     preg_replace('/[\x00-\x1F\x7F]/u', '\n', $ver[1])
                                     //$ver[0]
                                     ."||".
                                     preg_replace('/[\x00-\x1F\x7F]/u', '\n', $ver[2])
                                     //$ver[0]
                                     ."||".
                                     preg_replace('/[\x00-\x1F\x7F]/u', '\n', $ver[3])
                                     //$ver[0]
                                     ."||".
                                     preg_replace('/[\x00-\x1F\x7F]/u', '\n', $ver[5])
                                     //$ver[0]
                                     ."||".
                                     preg_replace('/[\x00-\x1F\x7F]/u', '\n', $ver[6])
                                     //$ver[18]
                                     ;
                             ?>
                            <tr>
                              <td scope="row" ><?php echo $ver[0] ?></td>
                              <td><?php echo $ver[2] ?></td>
                              <td><?php echo $ver[3] ?></td>
                              <td><?php echo $ver[5] ?></td>
                              <td><?php echo $ver[6] ?></td>
                              <td>
                                <button class="btn btn-info " data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datos ?>')">Editar</button>
                              </td>
                              <td>
                                <a href="php/deleteproducto.php?id_producto=<?php echo $ver[0];?>" class="btn btn-danger glyphicon glyphicon-eye-open">Eliminar</a>
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
            <form method="post" action="php/addproductos.php">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Nombre</label>
                <input type="text" required name="nombreproducto" id="nombreproducto" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Descripción</label>
                <input type="text" required name="descripcionproducto" id="descripcionproducto" class="form-control">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Categoria</label>
                <select class="form-control" required name="id_categoria">
                  <?php
                  $sql="SELECT * FROM categorias ";
                    $result=mysqli_query($conexion,$sql);
                    while($ver=mysqli_fetch_row($result)){
                   ?>
                  <option value="<?php echo $ver[0] ?>"><?php echo $ver[1]," ",$ver[2] ?></option>
                <?php
                  }
                ?>
                </select>
              </div>
              <button type="submit"  class="btn btn-primary">Registrar</button>
            </form>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade"  id="modalEdicion"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
              <div class="modal-content">
                    <div class="modal-body">
                        <form>
                          <div class="form-group">
                            <label for=""><h4>Actualizar Producto</h4></label>
                            <br>
                            <label style="display:none" for="recipient-name" class="col-form-label">id</label>
                            <input style="display:none" type="text" required readonly name="id_productox" id="id_productox" class="form-control" >
                          </div>

                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nombre</label>
                            <input type="text" required name="nombreproductox" id="nombreproductox" class="form-control" >
                          </div>
                          <div class="form-group">
                            <label for="message-text" class="col-form-label">Descripción</label>
                            <input type="text" required name="descripcionproductox" id="descripcionproductox" class="form-control" >
                          </div>

                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Categoria</label>
                          <select class="form-control" required name="id_categoriax" id="id_categoriax">
                            <?php
                            $sql="SELECT * FROM categorias ";
                              $result=mysqli_query($conexion,$sql);
                              while($ver1=mysqli_fetch_row($result)){
                             ?>
                            <option value="<?php echo $ver1[0] ?>"><?php echo $ver1[1]," ",$ver1[2] ?></option>
                          <?php
                            }
                          ?>
                          </select>
                        </div>
                        <button type="button" id="btnenviar1" name ="btnenviar1" class="btnenviar1 btn btn-primary">Actualizar</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
  </body>
</html>

<script type="text/javascript">
$(document).ready(function(){
     $("#btnenviar1").click(function(){
         var id_productox=$("#id_productox").val();
         var nombreproductox=$("#nombreproductox").val();
         var descripcionproductox=$("#descripcionproductox").val();
         var id_categoriax=$("#id_categoriax").val();
         $.ajax({
             url:'php/uptproducto.php',
             method:'POST',
             data:{
                 id_productox:id_productox,
                 nombreproductox:nombreproductox,
                 descripcionproductox:descripcionproductox,
                 id_categoriax:id_categoriax
             },
            success:function(data){
              location.reload();
            }
         });
     });
 });
</script>
