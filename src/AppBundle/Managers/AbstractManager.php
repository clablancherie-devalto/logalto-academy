<?php

namespace AppBundle\Managers;

use AppBundle\Services\Tools\RollbarService;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class AbstractManager
 */
abstract class AbstractManager {
	/** @var EntityManagerInterface */
	protected $entityManager;

	/**
	 * AbstractManager constructor.
	 *
	 * @param EntityManagerInterface $entityManager
	 */
	public function __construct(
		EntityManagerInterface $entityManager
	) {
		$this->entityManager = $entityManager;
	}

	/**
	 * @return EntityManagerInterface
	 */
	public function getEntityManager() {
		return $this->entityManager;
	}
}
