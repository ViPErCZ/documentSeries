<?php

namespace ViPErCZ\DocumentSeries\Entity;

use DateTime;

/**
 * Class AccountingYear
 * @package ViPErCZ\DocumentSeries\Entity
 */
final class AccountingYear extends Base {

	/** @var bool */
	private $active;

	/** @var DateTime */
	private $year;

	/**
	 * @return bool
	 */
	public function isActive(): bool {
		return $this->active;
	}

	/**
	 * @param bool $active
	 */
	public function setActive($active): void {
		$this->active = $active;
	}

	/**
	 * @return string
	 */
	public function getYear(): string {
		return $this->year->format('Y');
	}

	/**
	 * @param int|string $year
	 */
	public function setYear($year) {
		$this->year = new DateTime($year . '-01-01 00:00:00');
	}

	/**
	 * @return bool
	 */
	public function isActual(): bool {
		if ($this->year) {
			return $this->year->format('Y') === date('Y');
		}

		return false;
	}
}