<html>
<head>
  <title>Proueba tecnica</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>


<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4">
  	<center><h1>BUSCAR ARCHIVO</h1></center>
  	<form method="POST" action="buscararchivo.php" >

  	<div class="form-group">
	    <label for="doc">Id</label>
	    <input type="text" name="id" class="form-control" id="id">
	</div>

	<div class="form-group">
	    <label for="nombre">Nombre </label>
	    <input type="text" name="nombre" class="form-control" id="nombre">
	</div>

   <div class="form-group">
	    <label for="dir">Autor </label>
	    <input type="text" name="autor" class="form-control" id="autor">
	</div>
	
	<div class="form-group">
	    <label for="nombre">Tipo </label>
	    <input type="text" name="tipo" class="form-control" id="tipo">
	</div>

   <div class="form-group">
	    <label for="dir">Extencion </label>
	    <input type="text" name="ext" class="form-control" id="ext">
	</div>

    
    <center>
	<input type="submit" value="Enviar" class="btn btn-success" name="btn1">
	<input type="submit" value="Consultar informacion" class="btn btn-info" name="btn2">
	<input type="submit" value="Consultar tipo" class="btn btn-info" name="btn3">
	<input type="submit" value="Consultar cantidad" class="btn btn-info" name="btn4">
	</center>

  </form>

  <?php
 
  	if(isset($_POST['btn1']))
  	{
  		include("abrir_conexion.php");

  		$id=$_POST['id'];
  		$nombre=$_POST['nombre'];
		$autor=$_POST['autor'];
  		$tipo=$_POST['tipo'];
  		$ext=$_POST['ext'];

		$insertar1=$conexion->query("INSERT INTO $tabla_db1  VALUES ('$id','$nombre','$autor')");
		if ($insertar1=true)
		{
			$insertar2=$conexion->query("INSERT INTO $tabla_db2  VALUES ('$id','$tipo','$ext')");
		}
		if ($insertar2=true)
		{
			echo "datos guardados correctamente";
		}
		
  		include("cerrar_conexion.php");
		
  	}
	
	if(isset($_POST['btn2']))
	{
		include("abrir_conexion.php");
		$id=$_POST['id'];
		 $resultados1 = mysqli_query($conexion,"SELECT * FROM $tabla_db1 WHERE id = $id");
		while($consulta1 = mysqli_fetch_array($resultados1))
			{
				echo
				"
				<table width=\"100%\" border =\"1\">
				<tr>
				<td><b><center>ID</center></b></td>
				<td><b><center>Nombre</center></b></td>
				<td><b><center>Autor</center></b></td>
				</tr>
				<tr>
				<td>".$consulta1['id']." </td>
				<td>".$consulta1['nombre']." </td>
				<td>".$consulta1['autor']." </td>
				</tr>
				</table>
				";
			} 
		include("cerrar_conexion.php");
	}
	
	if(isset($_POST['btn3']))
	{
		include("abrir_conexion.php");
		$id=$_POST['id'];
			$resultados2 = mysqli_query($conexion,"SELECT * FROM $tabla_db2 WHERE id = $id");
		while($consulta2 = mysqli_fetch_array($resultados2))
			{
				echo
				"
				<table width=\"100%\" border =\"1\">
				<tr>
				<td><b><center>ID</center></b></td>
				<td><b><center>Tipo</center></b></td>
				<td><b><center>Extencion</center></b></td>
				</tr>
				<tr>
				<td>".$consulta2['id']." </td>
				<td>".$consulta2['tipo']." </td>
				<td>".$consulta2['ext']." </td>
				</tr>
				</table>
				";
			} 
		include("cerrar_conexion.php");
	}
	
	if(isset($_POST['btn4']))
	{
		include("abrir_conexion.php");
		$resultados3 = mysqli_query($conexion,"SELECT ext FROM $tabla_db2");
		$consulta3 = mysqli_fetch_array($resultados3);
		$cantidades = array_count_values($consulta3);
		print_r ($cantidades);
		
		include("cerrar_conexion.php");
	}

  ?>



  </div>
  <div class="col-md-4"></div>
</div>



  
  
</body>
</html>
