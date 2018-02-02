<?php

namespace ViPErCZ\DocumentSeries\Models\Drivers;

use ViPErCZ\DocumentSeries\Models\Drivers\UnitTest\AccountingYearModel;
use ViPErCZ\DocumentSeries\Models\Drivers\UnitTest\SeriesModel;

/**
 * Class DriversList
 * @package ViPErCZ\DocumentSeries\Models\Drivers
 */
final class DriversList implements IDriverList {

	/**
	 * @return array
	 */
	public static function getDrivers(): array {
		return [
			'accountingYear' => AccountingYearModel::class,
			'documentSeries' => SeriesModel::class
		];
	}

}