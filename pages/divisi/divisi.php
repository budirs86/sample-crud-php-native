<!DOCTYPE html>
<?php
logme('Mengakses Halaman Divisi');
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>My Virtual Office | Bluefox International</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href=" plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href=" plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href=" plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href=" plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href=" dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php?mod=home" class="nav-link">Home</a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->

      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
<?php include_once('sidebar.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Divisi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Divisi</li>
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
                <h3 class="card-title">Divisi</h3>
                <button type="button" class="btn btn-danger  float-right" data-toggle="modal" data-target="#create-divisi">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Divisi
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="10%">No</th>
                    <th width="80%">Divisi</th>
                    <th width="10%">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $query="select * from tbl_divisi order by div_id";
                  $rquery=mysqli_query($con,$query);
                  $no=1;
                  while ($data=mysqli_fetch_array($rquery)){
                    $id_div=$data['div_id'];
                  ?>
                  <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $data['name'];?></td>
                    <td>
                      <a href="#" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-div<?php echo md5($id_div);?>">Edit</a>
                      <a type="button" class="btn btn-danger btn-sm" href="proses/divisi/div_delete.php?id=<?php echo md5($id_div);?>">
                          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Delete
                      </a>
                    </td>

                  </tr>
                  <div class="modal fade" id="edit-div<?php echo md5($id_div);?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel">Edit Divisi</h4>
                              </div>
                              <div class="modal-body">
                                  <form data-toggle="validator" action="proses/divisi/div_edit.php" method="POST">
                                      <input  name="div_id"  class="div_id" type="hidden" value="<?php echo md5($id_div);?>">
                                      <div class="form-group">
                                          <label class="control-label" for="dep_name">Name</label>
                                          <input type="text" name="div_name" class="form-control" required value="<?php echo $data['name'];?>"/>
                                      </div>

                                      <div class="form-group">
                                        <button type="submit" class="btn btn-sm crud-submit btn-success">Save</button>
                                        <a type="button" class="btn btn-danger btn-sm float-right" data-dismiss="modal"><span aria-hidden="true">Cancel</span></a>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
                  <?php $no++;
                }?>


                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="modal fade" id="create-divisi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Add Divisi</h4>
                        </div>

                        <div class="modal-body">
                            <form data-toggle="validator" action="proses/divisi/div_save.php" method="POST">
                                <div class="form-group">
                                    <label class="control-label" for="divisi">Divisi</label>
                                    <input type="text" name="divisi" class="form-control" required />
                                </div>
                                <div class="form-group">
                                  <button type="submit" class="btn btn-sm crud-submit btn-success">Save</button>
                                  <a type="button" class="btn btn-danger btn-sm float-right" data-dismiss="modal"><span aria-hidden="true">Cancel</span></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
<!-- /.content-wrapper -->
  <?php
  include_once('footer.php')
  ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src=" plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src=" plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src=" plugins/datatables/jquery.dataTables.min.js"></script>
<script src=" plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src=" plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src=" plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src=" plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src=" plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src=" plugins/jszip/jszip.min.js"></script>
<script src=" plugins/pdfmake/pdfmake.min.js"></script>
<script src=" plugins/pdfmake/vfs_fonts.js"></script>
<script src=" plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src=" plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src=" plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src=" dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src=" dist/js/demo.js"></script>
<!-- Page specific script -->
<script>

  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });

</script>
</body>
</html>
