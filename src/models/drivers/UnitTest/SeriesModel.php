<?php

namespace ViPErCZ\DocumentSeries\Models\Drivers\UnitTest;

use DateTime;
use ViPErCZ\DocumentSeries\Entity\Serie;
use ViPErCZ\DocumentSeries\Models\Drivers\DefaultGenerateTrait;
use ViPErCZ\DocumentSeries\Models\IGenerate;
use ViPErCZ\DocumentSeries\Models\ISeriesModel;

/**
 * Class UnitTestStorage
 * @package ViPErCZ\DocumentSeries\Storage
 */
final class SeriesModel implements ISeriesModel, IGenerate {

	use DefaultGenerateTrait;

	/** @var array */
	private $series = [];

	/**
	 * UnitTestStorage constructor.
	 */
	public function __construct() {
		$serie = new Serie();
		$serie->setId(1);
		$serie->setDateInserted(new DateTime());
		$serie->setAccountingYearId(1);
		$serie->setCurrentNumber(1);
		$serie->setForRobots(false);
		$serie->setNumbers(5);
		$serie->setMask('YYMMDD');
		$serie->setPrefix('CR');
		$serie->setDocumentType('TV');

		$this->series[] = $serie;

		$serie2 = new Serie();
		$serie2->setId(2);
		$serie2->setDateInserted(new DateTime());
		$serie2->setAccountingYearId(2);
		$serie2->setCurrentNumber(2);
		$serie2->setForRobots(false);
		$serie2->setNumbers(5);
		$serie2->setMask('YYMMDD');
		$serie2->setPrefix('TV');
		$serie2->setDocumentType('TV');

		$this->series[] = $serie2;

		$serie3 = new Serie();
		$serie3->setId(3);
		$serie3->setDateInserted(new DateTime());
		$serie3->setAccountingYearId(1);
		$serie3->setCurrentNumber(2);
		$serie3->setForRobots(true);
		$serie3->setNumbers(5);
		$serie3->setMask('YYMMDD');
		$serie3->setPrefix('TV');
		$serie3->setDocumentType('TV');

		$this->series[] = $serie3;
	}

	/**
	 * @param $id
	 * @return null|Serie
	 */
	public function getSerie($id): ?Serie {
		/** @var Serie $serie */
		foreach ($this->series as $serie) {
			if ($serie->getId() === $id) {
				return $serie;
			}
		}

		return null;
	}

	/**
	 * @param $accountingYearId
	 * @param null|string $documentType
	 * @return array
	 */
	public function getSeries($accountingYearId, $documentType = null): array {
		$series = [];

		/** @var Serie $serie */
		foreach ($this->series as $serie) {
			if ($serie->getAccountingYearId() === $accountingYearId && ($documentType === null || $serie->getDocumentType() === $documentType)) {
				$series[] = $serie;
			}
		}

		return $series;
	}

	/**
	 * @param $accountingYearId
	 * @param $documentType
	 * @return null|Serie
	 */
	public function getSerieForRobots($accountingYearId, $documentType): ?Serie {
		/** @var Serie $serie */
		foreach ($this->series as $serie) {
			if ($serie->getAccountingYearId() === $accountingYearId && $serie->getDocumentType() === $documentType && $serie->isForRobots()) {
				return $serie;
			}
		}

		return null;
	}

}