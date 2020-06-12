<?php
namespace TissueSampler\Controllers;
class Samples {
	private $sampleTable;

	public function __construct($sampleTable) {
		$this->sampleTable = $sampleTable;
	}
	public function delete() {
		$this->sampleTable->delete($_POST['id']);

		header('location:/samples');
	}

	public function list() {

		$sample = $this->sampleTable->findAll();

		return ['template' => 'admin/samplelist.html.php',
				'title' => 'Sample List',
				'variables' => [
						'sample' => $sample
					]
				];
	}
	public function edit() {
	if (isset($_POST['sample'])) {
		 //Submit's the information to the datbase
			 $_POST['sample']['collection_id'] = $_POST['collectionpick'];
		$this->sampleTable->save($_POST['sample']);
		//What area of the website will return the user too once complete
		header('location: /samples');
	}
	else {
		if  (isset($_GET['id'])) {
			$result = $this->sampleTable->find('id', $_GET['id']);
			$sample = $result[0];
		}
		else  {
			$sample = false;
		}

		return [
			'template' => 'admin/editsamples.html.php',
			'variables' => ['sample' => $sample],
			'title' => 'Edit Sample'
		];
	}
}
}
