<div class="container">
  <div class="row">
    <div class="col-md-12">

<?php
foreach ($infopaciente->result() as $row) 
{
  echo form_open_multipart('paciente/modificarbd');
?>

<input type="hidden" name="idPaciente" value="<?php echo $row->idPaciente; ?>">

<div class="mb-3">
    <label class="form-label">Primer Apellido</label>
    <input type="text" class="form-control" name="primerApellido" value="<?php echo $row->primerApellido; ?>">
  </div>

  <div class="mb-3">
    <label class="form-label">Segundo Apellido</label>
    <input type="text" class="form-control" name="segundoApellido" value="<?php echo $row->segundoApellido; ?>">
  </div>

  <div class="mb-3">
    <label class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre" value="<?php echo $row->nombre; ?>">
  </div>

  <button type="submit" class="btn btn-primary">Modificar</button>

<?php
echo form_close();
}
?>



    </div>
  </div>
</div>



