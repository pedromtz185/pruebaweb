<?php
		function conexion(){
			$servidor="localhost";
			$usuario="root";
			$password="root";
			$bd="pruebaweb";
			$conexion=mysqli_connect($servidor,$usuario,$password,$bd);
			return $conexion;
		}
 ?>
