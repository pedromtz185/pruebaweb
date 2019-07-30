<?PHP
require_once "conexion.php";
$conexion=conexion();
 $nombreproducto = $_POST["nombreproducto"];
 $descripcionproducto = $_POST["descripcionproducto"];
 $id_categoria = $_POST["id_categoria"];
 $sql = "INSERT INTO productos(id_producto,id_categoria,nombreproducto,descripcionproducto) VALUES (NULL,'$id_categoria','$nombreproducto','$descripcionproducto')";
 if ($conexion->query($sql) === TRUE)
 {
   echo "La Categoria se agrego correctamente";
   header('Location: ../index.php');
 }else
 {
 echo "error";
 }
?>
