<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\Type\ProfileFormType;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class UserController extends FOSRestController {
	/**
	 * /api/users (Method GET)
	 * Return all the user in the app
	 * @return JsonResponse
	 */
	public function getUsersAction() {
		$users = $this->getDoctrine()->getRepository(User::class)->findAll();

		if (!$users) {
			throw $this->createNotFoundException("No users found ");
		}

		$data = ['users' => []];

		foreach ($users as $user) {
			$data['users'][] = $this->serialize($user);
		}

		$response = new JsonResponse($data, 200);

		return $response;
	}

	/**
	 * /api/users/{username} (Method GET)
	 * Return user with this username
	 * @return JsonResponse
	 */
	public function getUserAction($username) {
		$user = $this->getDoctrine()->getRepository(User::class)->findOneBy(['username' => $username]);

		if (!$user) {
			throw $this->createNotFoundException("No user found for this username " . $username);
		}

		$data = $this->serialize($user);

		$response = new JsonResponse($data, 200);

		return $response;
	}

	/**
	 * /api/users(Method PUT)
	 * Update new user
	 * @param Request $request
	 * @return JsonResponse
	 */
	public function putUserAction(Request $request) {
			$body = $request->getContent();

			$data = json_decode($body, true);

			dump($request->getContent());die();

			$user = $this->getDoctrine()->getRepository(User::class)->findOneBy(['username' => $data['username']]);

			$form = $this->createForm(ProfileFormType::class, $user);
			$form->submit($data);

			$user->setUsername($form->getData()->getUsername());
			//$user->setPassword($data['password']);
			//$user->setEmail($data['email']);
			$user->setCountry($form->getData()->getCountry());

			$em = $this->getDoctrine()->getManager();
			$em->persist($user);
			$em->flush();

			$location = $this->generateUrl('get_user', [
				'username' => $user->getUsername(),
			]);

			$data = $this->serialize($user);

			$response = new JsonResponse($data, 201);
			$response->headers->set('Location', $location);

			return $response;
	}

	/**
	 * @param User $user
	 * @return array
	 */
	private function serialize(User $user) {
		return [
			'avatar' => $user->getUsername(),
			'country' => $user->getCountry(),
			'roles' => $user->getRoles(),
			'last_login' => $user->getLastLogin()->format('d/m/Y'),
		];
	}
}
