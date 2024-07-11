
<?php require RUTA_APP . '/vistas/inc/header.php'; ?>
	
<table class="table table-striped">
	<!-- Encabezados -->
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre(s)</th>
      <th>Apellido 1</th>
      <th>Apellido 2</th>
			<th>Correo</th>
			<th>Celular</th>
			<th>Acciones</th>
    </tr>
  </thead>
	
	<!-- Datos de la tabla -->
	<tbody>
		<?php foreach($datos['usuarios'] as $becario) : ?>	<!-- recorre los datos -->
			<tr>
				<td><?php echo $becario->id_becario; ?></td>
				<td><?php echo $becario->nombre; ?></td>
				<td><?php echo $becario->apellido1; ?></td>
				<td><?php echo $becario->apellido2; ?></td>
				<td><?php echo $becario->correo; ?></td>
				<td><?php echo $becario->celular; ?></td>
				<td><a href="<?php echo RUTA_URL; ?>paginas/editar/ <?php echo $becario->id_becario; ?>">Editar</a></td>
				<td><a href="<?php echo RUTA_URL; ?>paginas/borrar/ <?php echo $becario->id_becario; ?>">Borrar</a></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
  
</table>

<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>