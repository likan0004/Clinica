<?php
	session_start();
	include_once('../config/dbconect.php');

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$codpaci  = $_GET['codpaci'];
			$dnipa = $_POST['dnipa'];
			$nombre = $_POST['nombre'];
			$seguro = $_POST['seguro'];
			$tele = $_POST['tele'];
			$sexo = $_POST['sexo'];
			$usuario = $_POST['usuario'];
			$password = $_POST['password'];
			$estado = $_POST['estado'];
			

			$sql = "UPDATE customers SET dnipa = '$dnipa',nombre = '$nombre',seguro = '$seguro',tele = '$tele',sexo = '$sexo' ,usuario = '$usuario',password = '$password',estado = '$estado' WHERE codpaci = '$codpaci'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Área actualizado correctamente' : 'No se puso actualizar el área';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar la conexión
		$database->close();
	}
	else{
		$_SESSION['message'] = 'Complete el formulario de edición';
	}

	header('location: ../../folder/customers.php');

?>