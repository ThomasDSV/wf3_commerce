<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\ProductsManager;

class ProductsController extends Controller {



	public function index() {
		$products_m = new ProductsManager;

		$this->show('products/index', [
			'products' => $products_m->findAll()
		]);
	}



	public function create() {

		$name = null;
		$description = null;
		$image = null;
		$price = null;

		$save = true;

		if ($_SERVER['REQUEST_METHOD'] === "POST") {

			// Récupération des données du formulaire
			$name = $_POST['name'];
			$description = $_POST['description'];
			$image = $_POST['image'];
			$price = $_POST['price'];

			// Vérification des données


			if ($save) {
				// Enregistrement des données dans la BdD
				$products_m = new ProductsManager;
				$product = $products_m->insert([
					"name" => $name,
					"description" => $description,
					"image" => $image,
					"price" => $price
				]);

				// Redirection vers la page des infos du produit avec l'id du produit enregistré
				$this->redirectToRoute('product_read', ['id' => $product['id']]);
			}
		}
		
		// Affichage de la vue
		$this->show('products/create');
	}



	public function read($id) {

		// Instance du Manager
		$products_m = new ProductsManager;

		// Récupération du produit
		$product = $products_m->find($id);

		// Appel de la vue avec passage des données de l'article
		$this->show('products/read', [
			'product' => $product
		]);
	}



	public function edit($id) {

		$products_m = new ProductsManager;
		$product = $products_m->find($id);

		$name = $product['name'];
		$description = $product['description'];
		$image = $product['image'];
		$price = $product['price'];

		$save = true;

		if ($_SERVER['REQUEST_METHOD'] === "POST") {

			// Récupération des données du formulaire
			$name = $_POST['name'];
			$description = $_POST['description'];
			$image = $_POST['image'];
			$price = $_POST['price'];

			// Vérification des données


			if ($save) {
				// Mise à jour des données dans la BdD
				// $products_m = new ProductsManager;
				$product = $products_m->update([
					"name" => $name,
					"description" => $description,
					"image" => $image,
					"price" => $price
				], $id);

				// Redirection vers la page des infos du produit avec l'id du produit enregistré
				$this->redirectToRoute('product_read', ['id' => $product['id']]);
			}
		}
		
		// Affichage de la vue
		$this->show('products/edit');
	}



	public function delete($id) {

		$products_m = new ProductsManager;
		$product = $products_m->find($id);

		if ($_SERVER['REQUEST_METHOD'] === "POST") {
			$products_m = new ProductsManager;
			$products_m->delete($id);
			$this->redirectToRoute('products_index');
		} else {
			// $this->redirectToRoute('product_read');
		}

		$this->show('products/delete', ['product' => $product]);
	}
}