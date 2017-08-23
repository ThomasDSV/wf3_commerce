<?php

namespace Controller;

use \W\Controller\Controller;

class ProductsController extends Controller {

	public function index() {
		$this->show('products/index');
	}

	public function create() {
		$this->show('products/create');
	}

	public function read() {
		$this->show('products/read');
	}

	public function edit() {
		$this->show('products/edit');
	}

	public function delete() {
		$this->show('products/delete');
	}
}