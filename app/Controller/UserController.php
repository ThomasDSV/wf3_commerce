<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Manager\UserManager;

class UserController extends Controller
{
	private $user_m;

	public function __construct() {
		$this->user_m = new UserManager;
		$this->user_m->setTable('users');
	}
	
	public function profile() {
		// Contrôle de l'accès
		$user = $this->getUser();
		// var_dump($loggedUser);
		if (!$user) {
			$this->redirectToRoute('security_signin');
		}

		// Récupération des données de l'utilisateur dans la BdD
		// Affichage de la vue du profil
		$this->show('users/profile', [
			"user" => $this->user_m->find($user['id'])
		]);
	}
}