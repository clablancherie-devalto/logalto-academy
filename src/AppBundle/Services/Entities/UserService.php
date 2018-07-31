<?php

namespace AppBundle\Services\Entities;

use AppBundle\Managers\UserManager;
use AppBundle\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use AppBundle\Entity\User;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class UserService
 *
 * @package AppBundle\Services
 */
class UserService {
	/** @var EntityManagerInterface */
	protected $doctrine;

	/** @var FormFactoryInterface */
	protected $formFactory;

	/** @var SessionInterface */
	protected $session;

	/**  @var AuthorizationCheckerInterface */
	protected $authorizationChecker;

	/** @var EventDispatcherInterface */
	protected $eventDispatcher;

	/** @var RequestStack */
	protected $request;

	/** @var RouterInterface */
	protected $router;

	/** @var UserManager */
	protected $user_manager;

	/** @var UserPasswordEncoderInterface */
	protected $encoder;

	/**
	 * @param EntityManagerInterface $doctrine
	 * @param FormFactoryInterface $formFactory
	 * @param SessionInterface $session
	 * @param AuthorizationCheckerInterface $authorizationChecker
	 * @param EventDispatcherInterface $eventDispatcher
	 * @param RequestStack $request
	 * @param RouterInterface $router
	 * @param UserManager $userManager
	 * @param UserPasswordEncoderInterface $encoder
	 */
	public function __construct(
		EntityManagerInterface $doctrine,
		FormFactoryInterface $formFactory,
		SessionInterface $session,
		AuthorizationCheckerInterface $authorizationChecker,
		EventDispatcherInterface $eventDispatcher,
		RequestStack $request,
		RouterInterface $router,
		UserManager $userManager,
		UserPasswordEncoderInterface $encoder
	) {
		$this->doctrine = $doctrine;
		$this->formFactory = $formFactory;
		$this->session = $session;
		$this->authorizationChecker = $authorizationChecker;
		$this->eventDispatcher = $eventDispatcher;
		$this->request = $request;
		$this->router = $router;
		$this->user_manager = $userManager;
		$this->encoder = $encoder;
	}

	/**
	 * @param array $criteria
	 * @param array $orderBy
	 * @param array $limit
	 * @return array
	 */
	public function findBy($criteria = [], $orderBy, $limit) {
		return $this->user_manager->findBy($criteria, $orderBy, $limit);
	}

	/**
	 * @param array $criteria
	 * @return null|object
	 */
	public function findOneBy($criteria = []) {
		return $this->user_manager->findOneBy($criteria);
	}

	/**
	 * @return array
	 */
	public function findAll() {
		return $this->user_manager->findAll();
	}

	/**
	 * @param User $user
	 * @return User
	 */
	public function save(User $user) {
		$this->updatePassword($user, $user->getPlainPassword());

		return $this->user_manager->save($user);
	}

	/**
	 * @param User $user
	 * @param $plainPassword
	 */
	public function updatePassword(User $user, $plainPassword) {
		$user->setPassword(
			$this->encoder->encodePassword($user, $plainPassword)
		);

		return $user;
	}

	/**
	 * @return UserRepository
	 */
	public function getRepositoryClass() {
		return $this->doctrine->getRepository(User::class);
	}
}
