<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\ContactsManager;

class DefaultController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$this->show('default/home');
	}

	// Page de contact
	public function contact()
	{
		$name = null;
		$email = null;
		$message = null;

		$save = true;

		if ($_SERVER['REQUEST_METHOD'] === "POST") {

			// Récupération des données du formulaire
			$name = $_POST['name'];
			$email = $_POST['email'];
			$message = $_POST['message'];

			// Vérification des données


			if ($save) {
				// Enregistrement des données dans la BdD
				$contact_m = new ContactsManager;
				$contact_m->insert([
					"name" => $name,
					"email" => $email,
					"message" => $message
				]);

				// Redirection vers la page d'accueil


			}
		}
		
		// Affichage de la vue
		$this->show('default/contact', [
			"name" => $name,
			"email" => $email,
			"message" => $message
		]);
	}

}