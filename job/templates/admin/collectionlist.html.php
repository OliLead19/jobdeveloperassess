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
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Collections Manager</h6>
            </div>
            <div class="card-body">
              <form action="/collections/edit" method="POST">
                <button class="btn btn-primary btn-lg btn-block" aria-label="Add Collection" type="submit">Add New Collection</button>
              </form>

              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Picture</th>
                      <th>Title</th>
                      <th>Associated Disease</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                  <tbody>
                    <?php foreach ($collection as $collection) { ?>
                    <tr>
                      <td>
                        <?php
                					 if (file_exists('images/collections/' . $collection['disease_term'] . '.jpg')) {
                						 echo '<img class="card-img-top"  style="width:484px;height:253.3px;" src="images/collections/' . $collection['disease_term'] . '.jpg" /></a>';
                					 }
                					 else { echo '<img class="card-img-top" style="width:484px;height:253.3px;" alt="Coming Soon "src="images/collections/coming-soon.webp" />';} ?>
                      </td>
                      <td>
                        <a href="/collections?id=<?=$collection['id']?>"><?=$collection['title']?></a>

                      </td>
                      <td>
                        <a href="/collections?id=<?=$collection['id']?>"><?=$collection['disease_term']?></a>
                      </td>
                      <td><a style="float: right" href="/collections/edit?id=<?=$collection['id']?>">Edit</a></td>
                      <td>
                        <form action="/collections/delete" method="POST">
                          <input type="hidden" name="id" value="<?=$collection['id']?>" />
                          <button class="btn btn-primary" aria-label="Delete Collection" type="submit">Delete</button>
                        </form>
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
  <!-- Page level custom scripts -->
  <script src="../../js/demo/datatables-demo.js"></script>

</body>
