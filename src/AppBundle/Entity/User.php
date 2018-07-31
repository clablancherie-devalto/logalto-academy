<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="USERS")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User extends BaseUser {
	/**
	 * @var int
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="country", type="string", length=50)
	 */
	private $country;

	public function __construct() {
		parent::__construct();
	}

	/**
	 * Get id.
	 *
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set country.
	 *
	 * @param string $country
	 *
	 * @return User
	 */
	public function setCountry($country) {
		$this->country = $country;

		return $this;
	}

	/**
	 * Get country.
	 *
	 * @return string
	 */
	public function getCountry() {
		return $this->country;
	}
}
