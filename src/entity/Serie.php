<?php

namespace ViPErCZ\DocumentSeries\Entity;

use DateTime;

/**
 * Class Series
 * @package ViPErCZ\DocumentSeries\Entity
 */
final class Serie extends Base {

	/** @var int|null */
	private $accountingYearId;

	/** @var string */
	private $documentType;

	/** @var string|null */
	private $prefix;

	/** @var string */
	private $mask;

	/** @var int */
	private $numbers = 2;

	/** @var int */
	private $currentNumber = 1;

	/** @var string|null */
	private $resetBy;

	/** @var bool */
	private $forRobots = false;

	/** @var DateTime|null */
	private $lastUse;

	/**
	 * @return int|null
	 */
	public function getAccountingYearId(): ?int {
		return $this->accountingYearId;
	}

	/**
	 * @param int|null $accountingYearId
	 */
	public function setAccountingYearId($accountingYearId = null) {
		$this->accountingYearId = $accountingYearId;
	}

	/**
	 * @return string
	 */
	public function getDocumentType(): string {
		return $this->documentType;
	}

	/**
	 * @param string $documentType
	 */
	public function setDocumentType($documentType) {
		$this->documentType = $documentType;
	}

	/**
	 * @return null|string
	 */
	public function getPrefix(): ?string {
		return $this->prefix;
	}

	/**
	 * @param null|string $prefix
	 */
	public function setPrefix($prefix) {
		$this->prefix = $prefix;
	}

	/**
	 * @return string
	 */
	public function getMask(): string {
		return $this->mask;
	}

	/**
	 * @param string $mask
	 */
	public function setMask($mask) {
		$this->mask = $mask;
	}

	/**
	 * @return int
	 */
	public function getNumbers(): int {
		return $this->numbers;
	}

	/**
	 * @param int $numbers
	 */
	public function setNumbers($numbers) {
		$this->numbers = $numbers;
	}

	/**
	 * @return int
	 */
	public function getCurrentNumber(): int {
		return $this->currentNumber;
	}

	/**
	 * @param int $currentNumber
	 */
	public function setCurrentNumber($currentNumber) {
		$this->currentNumber = $currentNumber;
	}

	/**
	 * @return null|string
	 */
	public function getResetBy(): ?string {
		return $this->resetBy;
	}

	/**
	 * @param null|string $resetBy
	 */
	public function setResetBy($resetBy) {
		$this->resetBy = $resetBy;
	}

	/**
	 * @return bool
	 */
	public function isForRobots(): bool {
		return $this->forRobots;
	}

	/**
	 * @param bool $forRobots
	 */
	public function setForRobots($forRobots) {
		$this->forRobots = $forRobots;
	}

	/**
	 * @return DateTime|null
	 */
	public function getLastUse(): ?DateTime {
		return $this->lastUse;
	}

	/**
	 * @param DateTime|null $lastUse
	 */
	public function setLastUse(DateTime $lastUse = null) {
		$this->lastUse = $lastUse;
	}

}