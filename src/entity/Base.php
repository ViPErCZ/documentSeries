<?php

namespace ViPErCZ\DocumentSeries\Entity;

use DateTime;

/**
 * Class Base
 * @package ViPErCZ\DocumentSeries\Entity
 */
abstract class Base {

	/** @var int */
	protected $id;

	/** @var DateTime */
	protected $dateInserted;

	/** @var DateTime|null */
	protected $dateUpdated;

	/**
	 * @return int
	 */
	public function getId(): int {
		return $this->id;
	}

	/**
	 * @param int $id
	 */
	public function setId($id): void {
		$this->id = $id;
	}

	/**
	 * @return DateTime
	 */
	public function getDateInserted(): DateTime {
		return $this->dateInserted;
	}

	/**
	 * @param DateTime $dateInserted
	 */
	public function setDateInserted(DateTime $dateInserted): void {
		$this->dateInserted = $dateInserted;
	}

	/**
	 * @return DateTime|null
	 */
	public function getDateUpdated(): ?DateTime {
		return $this->dateUpdated;
	}

	/**
	 * @param DateTime|null $dateUpdated
	 */
	public function setDateUpdated(DateTime $dateUpdated = null): void {
		$this->dateUpdated = $dateUpdated;
	}

}