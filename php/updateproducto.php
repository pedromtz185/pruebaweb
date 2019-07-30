<?php
require_once "conexion.php";
$conexion=conexion();
$id_producto = $_GET["id_producto"];
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
            <a class="nav-link" href="../index.php">Productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../categorias.php">Categorias</a>
          </li>
        </ul>
      </div>
    <form>
      <form   >
        <?php
        $sql="SELECT
          productos.id_producto,
          productos.id_categoria,
          productos.nombreproducto,
          productos.descripcionproducto
          FROM productos WHERE id_producto = $id_producto";
          $result=mysqli_query($conexion,$sql);
          while($ver=mysqli_fetch_row($result)){
         ?>
         <br><br>
         <div class="jumbotron">
           <br>
        <div class="form-group">
          <label for=""><h4>Actualizar Producto</h4></label>
          <br>
          <label for="recipient-name" class="col-form-label">id</label>
          <input type="text" required readonly name="actualizarid" id="actualizarid" class="form-control" value="<?php echo $ver[0] ?>">
        </div>

        <div class="form-group">
          <label for="recipient-name" class="col-form-label">Nombre</label>
          <input type="text" required name="actualizarnombre" id="actualizarnombre" class="form-control" value="<?php echo $ver[2] ?>">
        </div>
        <div class="form-group">
          <label for="message-text" class="col-form-label">Descripción</label>
          <input type="text" required name="actualizardescripcion" id="actualizardescripcion" class="form-control" value="<?php echo $ver[3] ?>">
        </div>
        <?php
      }
      ?>
      <div class="form-group">
        <label for="recipient-name" class="col-form-label">Categoria</label>
        <select class="form-control" required name="id_categoria" id="id_categoria">
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
</form>
</div>
</div>
  </body>
</html>
<script type="text/javascript">
$(document).ready(function(){
     $("#btnenviar1").click(function(){
         var actualizarid=$("#actualizarid").val();
         var actualizarnombre=$("#actualizarnombre").val();
         var id_categoria=$("#id_categoria").val();
         var actualizardescripcion=$("#actualizardescripcion").val();
         $.ajax({
             url:'uptproducto.php',
             method:'POST',
             data:{
                 actualizarid:actualizarid,
                 actualizarnombre:actualizarnombre,
                 id_categoria:id_categoria,
                 actualizardescripcion:actualizardescripcion
             },
            success:function(data){
              location.href ="../index.php";
              //alert(data);
            }
         });
     });
 });
</script>
