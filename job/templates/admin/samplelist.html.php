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
              <h6 class="m-0 font-weight-bold text-primary">Sample Manager</h6>
            </div>
            <div class="card-body">
              <form action="/samples/edit" method="POST">
                <button class="btn btn-primary btn-lg btn-block"aria-label="Add New Sample" type="submit">Add New Sample</button>
              </form>

              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Collection ID</th>
                      <th>Collection Name</th>
                      <th>Donor Count</th>
                      <th>Material Type</th>
                      <th>Last Updated</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                  <tbody>
                    <?php foreach ($sample as $sample) { ?>
                    <tr>
                      <td>
                        <?=$sample['collection_id']?>
                      </td>
                      <td><?php 	require '../database.php';
          							$stmt = $pdo->prepare("SELECT * FROM collections WHERE id=:collectionid");
          							$stmt->execute(['collectionid' => $sample['collection_id']]);
          							$samplematch = $stmt->fetch(PDO::FETCH_ASSOC);?>
                        <?=$samplematch['title']?>
                      </td>
                      <td><?=$sample['donor_count']?></td>
                      <td>
                        <?=$sample['material_type']?>
                      </td>
                      <td>
                          <?=$formattedDate = date("F j, Y", strtotime($sample['last_updated']));?>

                      </td>
                      <td><a style="float: right" href="/samples/edit?id=<?=$sample['id']?>">Edit</a></td>
                      <td>
                        <form action="/samples/delete" method="POST">
                          <input type="hidden" name="id" value="<?=$sample['id']?>" />
                          <button class="btn btn-primary"aria-label="Delete" type="submit">Delete</button>
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
