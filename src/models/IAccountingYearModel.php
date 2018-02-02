<?php

namespace ViPErCZ\DocumentSeries\Models;

use DateTime;
use ViPErCZ\DocumentSeries\Entity\AccountingYear;

/**
 * Interface IAccountingYearModelCapable
 * @package ViPErCZ\DocumentSeries\Models
 */
interface IAccountingYearModel {
	public function getAccountingYear($id): ?AccountingYear;
	public function getActualYear(): ?AccountingYear;
	public function getYear(DateTime $dateTime): ?AccountingYear;
}