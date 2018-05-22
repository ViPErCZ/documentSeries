<?php

namespace ViPErCZ\DocumentSeries\Models\Drivers\UnitTest;

use DateTime;
use ViPErCZ\DocumentSeries\DriverException;
use ViPErCZ\DocumentSeries\Entity\AccountingYear;
use ViPErCZ\DocumentSeries\Models\IAccountingYearModel;

/**
 * Class AccountingYearModel
 * @package ViPErCZ\DocumentSeries\Models\Drivers\UnitTest
 */
final class AccountingYearModel implements IAccountingYearModel {

	/** @var AccountingYear[] */
	private $accountingYears = [];

	/**
	 * AccountingYearModel constructor.
	 */
	public function __construct() {
		$accountingYear = new AccountingYear();
		$accountingYear->setId(1);
		$accountingYear->setActive(true);
		$accountingYear->setYear(date('Y'));
		$accountingYear->setDateInserted(new DateTime());

		$this->accountingYears[] = $accountingYear;

		$accountingYear2 = new AccountingYear();
		$accountingYear2->setId(2);
		$accountingYear2->setActive(false);
		$accountingYear2->setYear('2017');
		$accountingYear2->setDateInserted(new DateTime());

		$this->accountingYears[] = $accountingYear2;
	}

	/**
	 * @param $id
	 * @return null|AccountingYear
	 */
	public function getAccountingYear($id): ?AccountingYear {
		/** @var AccountingYear $accountingYear */
		foreach ($this->accountingYears as $accountingYear) {
			if ($accountingYear->getId() === $id) {
				return $accountingYear;
			}
		}

		return null;
	}

	/**
	 * @return null|AccountingYear
	 */
	public function getActualYear(): ?AccountingYear {
		return $this->getYear(new DateTime());
	}

	/**
	 * @param DateTime $dateTime
	 * @return null|AccountingYear
	 */
	public function getYear(DateTime $dateTime): ?AccountingYear {
		foreach ($this->accountingYears as $accountingYear) {
			if ($accountingYear->isActive() && $accountingYear->getYear() === $dateTime->format('Y')) {
				return $accountingYear;
			}
		}

		return null;
	}

	/**
	 * @param int $year
	 * @return bool
	 */
	public function hasYear(int $year): bool {
		foreach ($this->accountingYears as $accountingYear) {
			if ((int)$accountingYear->getYear() === $year) {
				return true;
			}
		}

		return false;
	}

	/**
	 * @param AccountingYear $accountingYear
	 * @throws DriverException
	 */
	public function insertAccountingYear(AccountingYear $accountingYear): void {
		if ($this->hasYear($accountingYear->getYear())) {
			throw new DriverException('Duplicate year ' . $accountingYear->getYear() . ' !');
		}

		$this->accountingYears[] = $accountingYear;
	}

}