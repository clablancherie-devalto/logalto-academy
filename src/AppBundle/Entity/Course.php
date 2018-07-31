<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comiccon
 *
 * @ORM\Table(name="COMICCONS")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ComicconRepository")
 */
class Course {
	/**
	 * @var int
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=255)
	 */
	private $name;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="started_on", type="date")
	 */
	private $startedOn;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="ended_on", type="date")
	 */
	private $endedOn;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="address", type="string", length=255)
	 */
	private $address;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="city", type="string", length=255)
	 */
	private $city;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="zip_code", type="string", length=255)
	 */
	private $zipCode;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="province", type="string", length=255, nullable=true)
	 */
	private $province;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="state", type="string", length=255, nullable=true)
	 */
	private $state;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="country", type="string", length=255)
	 */
	private $country;

	/**
	 * Get id
	 *
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set name
	 *
	 * @param string $name
	 *
	 * @return Course
	 */
	public function setName($name) {
		$this->name = $name;

		return $this;
	}

	/**
	 * Get name
	 *
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Set startedOn
	 *
	 * @param \DateTime $startedOn
	 *
	 * @return Course
	 */
	public function setStartedOn($startedOn) {
		$this->startedOn = $startedOn;

		return $this;
	}

	/**
	 * Get startedOn
	 *
	 * @return \DateTime
	 */
	public function getStartedOn() {
		return $this->startedOn;
	}

	/**
	 * Set endedOn
	 *
	 * @param \DateTime $endedOn
	 *
	 * @return Course
	 */
	public function setEndedOn($endedOn) {
		$this->endedOn = $endedOn;

		return $this;
	}

	/**
	 * Get endedOn
	 *
	 * @return \DateTime
	 */
	public function getEndedOn() {
		return $this->endedOn;
	}

	/**
	 * Set address
	 *
	 * @param string $address
	 *
	 * @return Course
	 */
	public function setAddress($address) {
		$this->address = $address;

		return $this;
	}

	/**
	 * Get address
	 *
	 * @return string
	 */
	public function getAddress() {
		return $this->address;
	}

	/**
	 * Set city
	 *
	 * @param string $city
	 *
	 * @return Course
	 */
	public function setCity($city) {
		$this->city = $city;

		return $this;
	}

	/**
	 * Get city
	 *
	 * @return string
	 */
	public function getCity() {
		return $this->city;
	}

	/**
	 * Set zipCode
	 *
	 * @param string $zipCode
	 *
	 * @return Course
	 */
	public function setZipCode($zipCode) {
		$this->zipCode = $zipCode;

		return $this;
	}

	/**
	 * Get zipCode
	 *
	 * @return string
	 */
	public function getZipCode() {
		return $this->zipCode;
	}

	/**
	 * Set province
	 *
	 * @param string $province
	 *
	 * @return Course
	 */
	public function setProvince($province) {
		$this->province = $province;

		return $this;
	}

	/**
	 * Get province
	 *
	 * @return string
	 */
	public function getProvince() {
		return $this->province;
	}

	/**
	 * Set state
	 *
	 * @param string $state
	 *
	 * @return Course
	 */
	public function setState($state) {
		$this->state = $state;

		return $this;
	}

	/**
	 * Get state
	 *
	 * @return string
	 */
	public function getState() {
		return $this->state;
	}

	/**
	 * Set country
	 *
	 * @param string $country
	 *
	 * @return Course
	 */
	public function setCountry($country) {
		$this->country = $country;

		return $this;
	}

	/**
	 * Get country
	 *
	 * @return string
	 */
	public function getCountry() {
		return $this->country;
	}
}

