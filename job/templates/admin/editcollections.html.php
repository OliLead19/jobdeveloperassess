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
            <h1 class="h3 mb-0 text-gray-800">Dashboard - Add/Edit collection</h1>
          </div>
          <div class="card-body p-0 text-center" style="width: 230rem;">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-7">
                <div class="p-5">
                  <form class="user" action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                      <input type="hidden" name="collection[id]" value="<?=$collection['id'] ?? ''?>" />
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Disease Term</label>
                        <input type="text" required class="form-control form-control-lg form-control-user" placeholder="Disease Term" name="collection[disease_term]" value="<?=$collection['disease_term'] ?? ''?>" />
                      </div>
                    </div>
                    <div class="form-group row ">
                      <div class="col-lg-6">
                        <label>Title</label>
                        <input type="text" required class="form-control form-control-lg form-control-user" placeholder="Title" name="collection[title]" value="<?=$collection['title'] ?? ''?>" />
                      </div>
                    </div>
                    <div class="form-group row">
                      <?php
                        if (file_exists('images/collections/' . $collection['disease_term'] . '.jpg')) {
                          echo '<img src="../../images/collections/' . $collection['disease_term'] . '.jpg" width="180" height="140" />';}
                          ?>
                      <input type="file" name="image" />
                    </div>
                    <button class="btn btn-primary btn" name="submitcollection" aria-label="Save Collection" type="submit">Save collection </button>

                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
  </div>

  <!-- Bootstrap core JavaScript-->

  <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- Page level custom scripts -->
  <script src="../../js/demo/datatables-demo.js"></script>
</body>
