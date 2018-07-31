<?php

namespace AppBundle\Managers;

use AppBundle\Entity\User;
use AppBundle\Repository\UserRepository;
use AppBundle\Services\Tools\RollbarService;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\ORMException;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class UserManager
 *
 * This class manage all actions related User entity
 */
class UserManager extends AbstractManager {
	/**
	 * UserManager constructor.
	 *
	 * @param EntityManagerInterface $entityManager
	 * @param UserPasswordEncoderInterface $encoder
	 */
	public function __construct(
		EntityManagerInterface $entityManager
	) {
		parent::__construct($entityManager);
	}

	/**
	 * Save user registered to database
	 *
	 * @param User $user
	 *
	 * @return User|string
	 */
	public function save(User $user) {
		try {
			$this->entityManager->persist($user);
			$this->entityManager->flush();
		} catch (ORMException $exception) {
			return $exception->getMessage();
		}

		return $user;
	}

	public function findAll() {
		return $this->getRepository()->findAll();
	}

	/**
	 * @param array $criteria
	 * @param array $orderBy
	 * @param array $limit
	 * @return array
	 */
	public function findBy($criteria = [], $orderBy = [], $limit = []) {
		return $this->getRepository()->findBy($criteria, $orderBy, $limit);
	}

	/**
	 * @param array $criteria
	 * @return null|object
	 */
	public function findOneBy($criteria = []) {
		return $this->getRepository()->findOneBy($criteria);
	}

	/**
	 * @return UserRepository
	 */
	public function getRepository() {
		return $this->entityManager->getRepository(User::class);
	}
}
