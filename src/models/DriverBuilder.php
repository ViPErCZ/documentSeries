<?php

namespace ViPErCZ\DocumentSeries\Models;

use ViPErCZ\DocumentSeries\DriverException;
use ViPErCZ\DocumentSeries\Models\Drivers\DriversList;
use ViPErCZ\DocumentSeries\Models\Drivers\IDriverList;

/**
 * Class DriverBuilder
 * @package ViPErCZ\DocumentSeries\Models
 */
final class DriverBuilder implements IDriverBuilder {

	/** @var array */
	private $drivers;

	/** @var mixed */
	private $connection;

	/** @var ISeriesModel */
	private $seriesModel;

	/** @var IAccountingYearModel */
	private $accountingYearModel;

	/**
	 * DriverBuilder constructor.
	 * @param IDriverList $driverList
	 * @param $connection
	 * @throws DriverException
	 */
	public function __construct(IDriverList $driverList, $connection) {
		$this->drivers = $driverList::getDrivers();

		if ($this->drivers === null) {
			throw new DriverException('Driver not found');
		}

		$this->connection = $connection;
	}

	/**
	 * @return ISeriesModel
	 */
	public function getSeriesModel(): ISeriesModel {
		if ($this->seriesModel === null) {
			$class = $this->drivers['documentSeries'];
			return new $class($this->connection);
		}

		return $this->seriesModel;
	}

	/**
	 * @return IAccountingYearModel
	 */
	public function getAccountingYearModel(): IAccountingYearModel {
		if ($this->accountingYearModel === null) {
			$class = $this->drivers['accountingYear'];
			$this->accountingYearModel = new $class($this->connection);
		}

		return $this->accountingYearModel;
	}
}