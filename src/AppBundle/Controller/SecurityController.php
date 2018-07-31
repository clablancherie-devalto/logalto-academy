<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends FOSRestController {
	/**
	 * Create an account on the Cosplay Group Matcher
	 * @TODO : This action must anonymous
	 * @param Request $request
	 * @return JsonResponse
	 */
	public function postRegisterAction(Request $request) {

		$userManager = $this->get('fos_user.user_manager');
		$data = $request->request->all();

		$email = $data['email'];
		$username = $data['username'];
		$password = $data['password'];
		$country = $data['country'];

		$email_exist = $userManager->findUserByEmail($email);
		$username_exist = $userManager->findUserByUsername($username);

		if ($email_exist || $username_exist) {
			$response = new JsonResponse();
			$response->setData("Username/Email " . $username . "/" . $email . " already exist");

			return $response;
		}

		/** @var User $user */
		$user = $userManager->createUser();
		$user->setUsername($username);
		$user->setEmail($email);
		$user->setEnabled(true);
		$user->setCountry($country);
		$user->setPlainPassword($password);
		$userManager->updateUser($user, true);

		$response = new JsonResponse();
		$response->setData("User: " . $user->getUsername() . " has been created");

		return $response;
	}

	public function postLoginAction(Request $request) {

		$response = new JsonResponse(['Trop stylé !'], 200);

		return $response;
	}
}
