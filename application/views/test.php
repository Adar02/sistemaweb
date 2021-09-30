  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="titular">DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">


            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
                <h3><?php echo "Hola ".$this->session->userdata('login'); ?></h3>
                <h3><?php echo "Hola ".$this->session->userdata('tipo'); ?></h3>
                <h3><?php echo "Hola ".$this->session->userdata('idusuario'); ?></h3>
                <br>
                <?php
                
                echo date('Y/m/d H:i:s');
                ?>
<?php
echo form_open_multipart('usuarios/logout');
?>
<button type="submit" class="btn btn-danger btn-block">Salir</button>
<?php
echo form_close();
?>

<br>
<a target="_blank" href="<?php echo base_url(); ?>index.php/paciente/listapdf">
  <button class="btn btn-success btn-block">Lista pacientes PDF</button>
</a>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>

                  <tr>
                    <th>No.</th>
                    <th>Nombre</th>
                    <th>Primer apellido</th>
                    <th>Segundo apellido</th>
                    <th>Edad</th>
                    <th>Fecha</th>
                  </tr>
                  </thead>
                  <tbody class="texto">

<?php
$indice=1;
foreach ($pacientes->result() as $row) {
?>


                  <tr>
                    <td><?php echo $indice; ?></td>
                    <td><?php echo $row->nombre; ?></td>
                    <td><?php echo $row->primerApellido; ?></td>
                    <td><?php echo $row->segundoApellido; ?></td>
                    <td><?php echo $row->edad; ?></td>
                    <td><?php echo formatearFecha($row->creado); ?></td>
                  </tr>
<?php

$indice++;
}

?>


                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Nombre</th>
                    <th>Primer apellido</th>
                    <th>Segundo apellido</th>
                    <th>Edad</th>
                    <th>Fecha</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>