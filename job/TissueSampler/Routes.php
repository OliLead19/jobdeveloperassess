<?php
namespace TissueSampler;

class Routes implements \CSY2028\Routes {
	public function callControllerAction($route) {
		require '../database.php';
		$adminTable = new \CSY2028\DatabaseTable($pdo, 'collections', 'id');
		$adminController = new \TissueSampler\Controllers\Admin($adminTable);
		$sampleTable = new \CSY2028\DatabaseTable($pdo, 'samples', 'id');
		$sampleController = new \TissueSampler\Controllers\Samples($sampleTable);

		// Customer Pages
		if ($route == '') {
			$page = $adminController->home();
		}
		//Sample Area, View, Edit, Delete & Add Functions All Here
		else if ($route == 'samples') {
			$page = $sampleController->list();
		}
		else if ($route == 'samples/edit') {
			$page = $sampleController->edit();
		}
		else if ($route == 'samples/delete') {
			$page = $sampleController->delete();
		}

		//Collcetion Area, View, Edit, Delete & Add Functions All Here
		else if ($route == 'collections') {
			$page = $adminController->list();
		}
		else if ($route == 'collections/edit') {
			$page = $adminController->edit();
		}
		else if ($route == 'collections/delete') {
			$page = $adminController->delete();
		}

		//Error Page if user navigates to page not on Routes
		else {
					$page = $adminController->errorpage();
				}

			return $page;
			}
		}
