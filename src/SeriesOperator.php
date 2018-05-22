<?php

namespace ViPErCZ\DocumentSeries;

use DateTime;
use ViPErCZ\DocumentSeries\Entity\AccountingYear;
use ViPErCZ\DocumentSeries\Entity\Serie;
use ViPErCZ\DocumentSeries\Models\IAccountingYearModel;
use ViPErCZ\DocumentSeries\Models\IDriverBuilder;
use ViPErCZ\DocumentSeries\Models\IGenerate;
use ViPErCZ\DocumentSeries\Models\ISeriesModel;

/**
 * Class SeriesOperator
 * @package ViPErCZ\DocumentSeries
 */
final class SeriesOperator implements ISeriesModel, IAccountingYearModel, IGenerate {

	/** @var IDriverBuilder */
	private $builder;

	/**
	 * SeriesOperator constructor.
	 * @param IDriverBuilder $builder
	 */
	public function __construct(IDriverBuilder $builder) {
		$this->builder = $builder;
	}

	/**
	 * @param $id
	 * @return null|Serie
	 */
	public function getSerie($id): ?Serie {
		return $this->builder->getSeriesModel()->getSerie($id);
	}

	/**
	 * @param int $accountingYearId
	 * @param null|string $documentType
	 * @return array
	 */
	public function getSeries($accountingYearId, $documentType = null): array {
		return $this->builder->getSeriesModel()->getSeries($accountingYearId, $documentType);
	}

	/**
	 * @param $accountingYearId
	 * @param $documentType
	 * @return null|Serie
	 */
	public function getSerieForRobots($accountingYearId, $documentType): ?Serie {
		return $this->builder->getSeriesModel()->getSerieForRobots($accountingYearId, $documentType);
	}

	/**
	 * @param Serie $serie
	 * @return string
	 */
	public function generateNumber(Serie $serie): string {
		return $this->builder->getSeriesModel()->generateNumber($serie);
	}

	/**
	 * @param $id
	 * @return null|AccountingYear
	 */
	public function getAccountingYear($id): ?AccountingYear {
		return $this->builder->getAccountingYearModel()->getAccountingYear($id);
	}

	/**
	 * @return null|AccountingYear
	 */
	public function getActualYear(): ?AccountingYear {
		return $this->builder->getAccountingYearModel()->getActualYear();
	}

	/**
	 * @param DateTime $dateTime
	 * @return null|AccountingYear
	 */
	public function getYear(DateTime $dateTime): ?AccountingYear {
		return $this->builder->getAccountingYearModel()->getYear($dateTime);
	}

	/**
	 * @param AccountingYear $accountingYear
	 * @throws DriverException
	 */
	public function insertAccountingYear(AccountingYear $accountingYear): void {
		$this->builder->getAccountingYearModel()->insertAccountingYear($accountingYear);
	}

}