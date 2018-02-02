<?php

namespace ViPErCZ\DocumentSeries\Models\Drivers\UnitTest;

use DateTime;
use ViPErCZ\DocumentSeries\Entity\AccountingYear;
use ViPErCZ\DocumentSeries\Models\IAccountingYearModel;

/**
 * Class AccountingYear
 * @package ViPErCZ\DocumentSeries\Models\Drivers\UnitTest
 */
final class AccountingYearModel implements IAccountingYearModel {

	/** @var array */
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
		/** @var AccountingYear $accountingYear */
		foreach ($this->accountingYears as $accountingYear) {
			if ($accountingYear->isActive() && $accountingYear->getYear() === $dateTime->format('Y')) {
				return $accountingYear;
			}
		}

		return null;
	}

}