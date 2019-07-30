<?php
require_once "conexion.php";
$conexion=conexion();
$id_categoria = $_POST["actualizarid"];
$nombrecategoria = $_POST["actualizarcategoria"];
$actualizardescripcion = $_POST["actualizardescripcion"];
$sql = "UPDATE categorias SET nombrecategoria = '$nombrecategoria',	descripcioncategoria ='$actualizardescripcion' where id_categoria=$id_categoria";
if ($conexion->query($sql) === TRUE)
{
  echo "se actualizo correctamente";
  header('Location: ../categorias.php');
}else
    {
    echo "error";
    }
 ?>
