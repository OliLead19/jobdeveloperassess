<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Custom styles for this page -->
  <link href="../../admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>


<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard - Collections</h1>
          </div>
          <div class="row">

            <div class="col-xl-6 col-md-6 mb-3">
              <div class="card h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-5">
                      <div class="text-l font-weight-bold text-primary text-uppercase mb-1">Collections</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">View A Collection</div>
                    </div>

                    <div class="col-auto">
                      <i class="fas fa-file-medical-alt fa-3x text-black-300"></i>
                    </div>
                  </div>
                </div>
                <a href="/collections" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm">View Collections</a>
              </div>
            </div>

            <!-- Add A New Sample -->
            <div class="col-xl-6 col-md-6 mb-3">
              <div class="card h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-l font-weight-bold text-primary text-uppercase mb-1">Samples</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">View Samples</div>
                    </div>

                    <div class="col-auto">
                      <i class="fas fa-vials fa-3x text-purple-300"></i>
                    </div>
                  </div>
                </div>
                <a href="/samples" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm">View Sample</a>
              </div>
            </div>
          </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Latest Collections Data</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Picture</th>
                      <th>Title</th>
                      <th>Associated disease</th>
                    </tr>
                  </thead>
                  <tbody>
                  <tbody>
                    <?php foreach ($collections as $collections) { ?>
                    <tr>
                      <td>
                        <?php
                           if (file_exists('images/collections/' . $collections['disease_term'] . '.jpg')) {
                             echo '<img  style="width:484px;height:253.3px;" class="card-img-top" src="images/collections/' . $collections['disease_term'] . '.jpg" /></a>';
                           }
                           else { echo '<img class="card-img-top" style="width:381px;height:253.3px;" alt="Coming Soon "src="images/collections/coming-soon.webp" />';} ?>
                      </td>
                      <td>
                        <a href="/collections?id=<?=$collections['id']?>"><?=$collections['title']?></a>
                      </td>
                      <td>
                        <a href="/collections?id=<?=$collections['id']?>"><?=$collections['disease_term']?></a>

                      </td>
                    </tr>
                  </tbody>
                  <?php } ?>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
  <!-- Content Row -->

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>


    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>
</body>
