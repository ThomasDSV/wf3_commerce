<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\AuthentificationManager;
use \W\Manager\UserManager;

class SecurityController extends Controller
{
	private $user_m;

	public function __construct() {
		$this->user_m = new UserManager;
		$this->user_m->setTable('users');
	}




	public function signin() {
		// Si la requête HTTP utilisée est POST


			// Récupération des données du formulaire


			// Vérification des données dans la BdD


			// Contrôle des identifiants (login & pwd)


			// Ajout de l'utilisateur à la $_SESSION


			// Redirection vers la page de profil de l'utilisateur


		// Affichage du formulaire d'identification
		$this->show('security/signin');

	}




	public function signup() {

		$username = null;
		$email = null;
		$password = null;
		$repeat_pwd = null;

		// Si la requête HTTP utilisée est POST
		if ($_SERVER['REQUEST_METHOD'] === "POST") {

			$save = true;

			// Récupération des données du formulaire
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$repeat_pwd = $_POST['repeat_pwd'];

			// Contrôle des données du POST
			// Contrôle l'adresse email
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$save = false;
				// Message d'erreur
			}

			// Contrôle des deux mots de passe
			if ($password != $repeat_pwd) {
				$save = false;
				// Message d'erreur
			}

			// Cryptage du mot de passe
			

			// Test de l'existence de l'utilisateur dans la BdD
			// Si l'utilisateur n'existe pas
			if ($save == true && !$this->user_m->emailExists($email)) {

				// Enregistrement des données dans la BdD
				$user = $this->user_m->insert([
					'username' => $username,
					'email' => $email,
					'password' => $password
				]);

				// Ajout de l'utilisateur à la $_SESSION
				$_SESSION['user'] = array(
					'id' => $user['id'],
					'email' => $user['email'],
					'username' => $user['username']
				);

				// Redirection de l'utilisateur vers sa page de profil
				$this->redirectToRoute('profile');
				}

			// Si l'utilisateur existe
			else {
				// Message d'erreur
			}
		}

		// Affichage du formulaire d'inscription
		$this->show('security/signup', [
			"username" => $username,
			"email" => $email
		]);

	}




	public function signout() {
		// Destruction de la $_SESSION


		// Redirection vers la page d'accueil


	}




	public function lostPwd() {
		// Si la requête HTTP utilisée est POST

		
			// Récupération des données du POST

		
			// Récupération de l'utilisateur dans la BdD


				// Génération du token


				// Envoi du mail avec process de renouvellement du mpd


				// Affichage du message de prise en compte de la demande

		
		// Affichage du formulaire (saisie de l'adresse email)
		$this->show('security/pwd/lost');

	}

	public function resetPwd() {
		// Si la requête HTTP utilisée est POST


			// Récupération des données du POST


			// Contrôle du token


			// Contrôle des mdp


			// Récupération de l'utilisateur dans la BdD


			// Mise à jour du mdp dans la BdD


			// Redirection de l'utilisateur vers la page de connexion


		// Affichage du formulaire (new mdp)
		$this->show('security/pwd/reset');

	}

}