<?php
		function conexion(){
			$servidor="localhost";
			$usuario="root";
			$password="root1234";
			$bd="pruebaweb";
			$conexion=mysqli_connect($servidor,$usuario,$password,$bd);
			return $conexion;
		}
 ?>
