<?php

namespace ViPErCZ\DocumentSeries\Models;

use DateTime;
use ViPErCZ\DocumentSeries\DriverException;
use ViPErCZ\DocumentSeries\Entity\AccountingYear;

/**
 * Interface IAccountingYearModelCapable
 * @package ViPErCZ\DocumentSeries\Models
 */
interface IAccountingYearModel {
	/**
	 * @param $id
	 * @return null|AccountingYear
	 */
	public function getAccountingYear($id): ?AccountingYear;

	/**
	 * @return null|AccountingYear
	 */
	public function getActualYear(): ?AccountingYear;

	/**
	 * @param DateTime $dateTime
	 * @return null|AccountingYear
	 */
	public function getYear(DateTime $dateTime): ?AccountingYear;

	/**
	 * @param AccountingYear $accountingYear
	 * @throws DriverException
	 * @return void
	 */
	public function insertAccountingYear(AccountingYear $accountingYear): void;
}