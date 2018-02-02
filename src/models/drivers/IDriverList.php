<?php

namespace ViPErCZ\DocumentSeries\Models\Drivers;

/**
 * Trait IDriverList
 * @package ViPErCZ\DocumentSeries\Models\Drivers
 */
interface IDriverList {

	/**
	 * @return array|null
	 * return [
			'accountingYear' => AccountingYearModel::class,
			'documentSeries' => SeriesModel::class
		];
	 */
	public static function getDrivers(): array;
}