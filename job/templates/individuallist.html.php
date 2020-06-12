<body>
	<!--================Single Collection Area =================-->
	<div class="container">
		<div class="row s_product_inner">
			<?php foreach($collection as $collection) {
			?>
			<div class="col-lg-6">
				<div class="single-prd-item">
					<?php
							 if (file_exists('images/collections/' . $collection['disease_term'] . '.jpg')) {
								 echo '<img class="card-img-top" src="images/collections/' . $collection['disease_term'] . '.jpg" /></a>';
							 }
							 else { echo '<img class="card-img-top style="width: 100px ; clear: both" alt="Coming Soon "src="images/collections/coming-soon.webp" />';} ?>
				</div>
			</div>
			<div class="col-lg-5 offset-lg-1">
				<div class="s_product_text">
					<h4>Disease Term:</h4>
					<h3><?=$collection['disease_term']?></h3>
					<hr>
					</hr>
					<h4>Title:</h4><strong><em>
							<h3><?=$collection['title']?></h3>
						</em></strong>

					<?php } ?>
					<hr>
					</hr>
					<h3><strong>Associated Samples:</strong></h3>
					<?php
					if (isset($_GET['id'])){
							require '../database.php';
							$stmt = $pdo->prepare("SELECT * FROM samples WHERE collection_id=:collectionid");
							$stmt->execute(['collectionid' => $_GET['id']]);
							$samplematch = $stmt->fetchAll(PDO::FETCH_ASSOC);
						}
					else if (isset($_GET['query'])){
							require '../database.php';
							$stmt1 = $pdo->prepare("SELECT * FROM collections WHERE title=:title");
							$stmt1->execute(['title' => $_GET['query']]);
							$getid = $stmt1->fetch();
						

							$stmt = $pdo->prepare("SELECT * FROM samples WHERE collection_id=:collectionid");
							$stmt->execute(['collectionid' => $getid['id']]);
								$samplematch = $stmt->fetchAll(PDO::FETCH_ASSOC);
						}
							if ($samplematch == false) {

								echo ' No Sample Yet!';
							}
							else {
							foreach ($samplematch as $collectionname) {?>
					<h4>Donor Count:</h4>
					<h3><?=$collectionname['donor_count']?></h3>
					<hr>
					</hr>
					<h4>Material Type:</h4>
					<h3><?=$collectionname['material_type']?></h3>
					<hr>
					</hr>
					<h4>Last Updated:</h4>
					<h3><?=$formattedDate = date("F j, Y", strtotime($collectionname['last_updated']));?></h3>
					<hr>
					</hr>
					<?php
					}}?>
				</div>
			</div>
		</div>


	</div>
	<hr>
	</hr>
	</div>
</body>

</html>
