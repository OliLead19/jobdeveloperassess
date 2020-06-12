<?php
namespace TissueSampler\Controllers;
class Admin {
	private $adminTable;

	public function __construct($adminTable) {
		$this->adminTable = $adminTable;
	}

	public function errorpage() {

			return ['template' => 'admin/404.html.php',
					'title' => 'Oops! Error',
					'variables' => []
					];
		}

	public function home() {
		if  (isset($_GET['query'])) {
			require '../database.php';

		$result = $this->adminTable->find('title', $_GET['query']);
		$collection = $result;
			return [
					'template' => 'individuallist.html.php',
					'variables' => ['collection' => $collection],
					'title' => 'Home - Collection Viewer'
				];
	}
	else  {

			$collections = $this->adminTable->findAll();
		return [
			'template' => 'home.html.php',
			'variables' => ['collections' => $collections],
			'title' => 'Home - Collection Viewer'
		];
	}
}
	public function delete() {
		$this->adminTable->delete($_POST['id']);

		header('location:/collections');
	}

	public function list() {
		if  (isset($_GET['query'])) {
			require '../database.php';

		$result = $this->adminTable->find('title', $_GET['query']);
		$collection = $result;
			return [
					'template' => 'individuallist.html.php',
					'variables' => ['collection' => $collection],
					'title' => 'Home - Collection Viewer'
				];
	}

		if  (isset($_GET['id'])) {

					$result = $this->adminTable->find('id', $_GET['id']);
					$collection = $result;
					return ['template' => 'individuallist.html.php',
					'variables' => ['collection' => $collection],
					'title' => 'List of animal '];
				}
				else  {
					$collection = false;
					$collection = $this->adminTable->findAll();

					return ['template' => 'admin/collectionlist.html.php',
							'title' => 'Admin - Collection List',
							'variables' => ['collection' => $collection]];
				}


			}

	public function edit() {
		if  (isset($_GET['query'])) {
			require '../database.php';

		$result = $this->adminTable->find('title', $_GET['query']);
		$collection = $result;
			return [
					'template' => 'individuallist.html.php',
					'variables' => ['collection' => $collection],
					'title' => 'Home - Collection Viewer'
				];
	}
	if (isset($_POST['collection'])) {
		if ($_FILES['image']['error'] == 0) {
		$fileName = $_POST['collection']['disease_term']. '.jpg';
		move_uploaded_file($_FILES['image']['tmp_name'], 'images/collections/'. $fileName);
	 }
	 var_dump($_POST['collection']);
		 //Submit's the information to the datbase
		$this->adminTable->save($_POST['collection']);
		//What area of the website will return the user too once complete
		header('location: /collections');
	}
	else {
		if  (isset($_GET['id'])) {
			$result = $this->adminTable->find('id', $_GET['id']);
			$collection = $result[0];
		}
		else  {
			$collection = false;
		}

		return [
			'template' => 'admin/editcollections.html.php',
			'variables' => ['collection' => $collection],
			'title' => 'Edit Collection'
		];
	}
	}

}
