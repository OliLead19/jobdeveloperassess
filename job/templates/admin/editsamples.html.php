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
            <h1 class="h3 mb-0 text-gray-800">Dashboard - Add/Edit sample</h1>
          </div>
          <div class="card-body p-0 text-center" style="width: 230rem;">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-7">
                <div class="p-5">
                  <form class="user" action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                      <input type="hidden" name="sample[id]" value="<?=$sample['id'] ?? ''?>" />
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Collection</label>
                        <select name="collectionpick" class="form-control" onchange="getcollection(this);" onchange="valueFind(this)"><?php  ?>

                          <option selected disabled>Choose a Collection </option>
                          <?php
                            require '../database.php';
                            $stmt = $pdo->prepare('SELECT * FROM collections');
                            $stmt->execute();
                            foreach ($stmt as $collectionname) {
                              if (isset($_GET['id'])&& $_GET['id'] == $collectionname['id']) {?>
                          <option name="sample[collection_id]" required value="<?=$collectionname['id'] ?? ''?>" selected>Disease Term - <?=$collectionname['disease_term'] ?> & Title - <?=$collectionname['title'] ?></option>
                          </option>
                          <?php }
                          else { ?>
                          <option name="sample[collection_id]" required value="<?=$collectionname['id'] ?? ''?>">Disease Term - <?=$collectionname['disease_term'] ?> & Title - <?=$collectionname['title'] ?></option><?php } ?>
                          <?php }?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row ">
                      <div class="col-lg-6">
                        <label> Donor Count</label>
                        <input type="number" required  min="1" max="5" class="form-control form-control-lg form-control-user" placeholder="Donor Count" name="sample[donor_count]" value="<?=$sample['donor_count'] ?? ''?>" />
                      </div>
                    </div>
                    <div class="form-group row ">
                      <div class="col-lg-6">
                        <label>Material Type</label>
                        <input type="text" required class="form-control form-control-lg form-control-user" placeholder="Material Type" name="sample[material_type]" value="<?=$sample['material_type'] ?? ''?>" />
                      </div>
                    </div>
                    <div class="form-group row ">
                      <div class="col-lg-6">
                        <label>Last Updated</label>
                        <input type="date" required class="form-control form-control-lg form-control-user" placeholder="Last Updated" name="sample[last_updated]" value="<?=$sample['last_updated'] ?? ''?>" />
                      </div>
                    </div>
                    <button class="btn btn-primary btn" name="submitsample" aria-label="Save Sample" type="submit">Save Sample </button>

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
