<div class="container">
  <div class="row">
    <div class="col-md-12">


<?php
 echo form_open_multipart('paciente/agregar');
?>
 <button type="submit" class="btn btn-success btn-xs">Agregar Paciente</button>
<?php
 echo form_close();
?>


<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Primer Apellido</th>
      <th scope="col">Segundo Apellido</th>
      <th scope="col">Edad</th>
      <th scope="col">Modificar</th>
      <th scope="col">Eliminar</th>
    </tr>
  </thead>
  <tbody>


<?php
$indice=1;
foreach ($pacientes->result() as $row) {
?>
<tr>
      <th scope="row"><?php echo $indice; ?></th>
      <td><?php echo $row->nombre; ?></td>
      <td><?php echo $row->primerApellido; ?></td>
      <td><?php echo $row->segundoApellido; ?></td>
      <td><?php echo $row->edad; ?></td>
      <td>
        <?php
        echo form_open_multipart('paciente/modificar');
        ?>
        <input type="hidden" name="idPaciente" value="<?php echo $row->idPaciente; ?>">
        <button type="submit" class="btn btn-primary btn-xs">Modificar</button>
        <?php
        echo form_close();
        ?>
      </td>
      <td>
        <?php
        echo form_open_multipart('paciente/eliminarbd');
        ?>
        <input type="hidden" name="idPaciente" value="<?php echo $row->idPaciente; ?>">
        <button type="submit" class="btn btn-danger btn-xs">Eliminar</button>
        <?php
        echo form_close();
        ?>
      </td>
    </tr>
<?php

$indice++;
}

?>




    

  </tbody>
</table>


    </div>
  </div>
</div>



