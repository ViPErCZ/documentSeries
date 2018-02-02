<?php

namespace ViPErCZ\DocumentSeries;

use ViPErCZ\DocumentSeries\Entity\Serie;
use ViPErCZ\DocumentSeries\Models\ISeriesModel;

/**
 * Class SeriesManager
 * @package ViPErCZ\DocumentSeries
 */
class SeriesManager {

	/** @var ISeriesModel */
	private $seriesModel;

	/**
	 * SeriesManager constructor.
	 * @param ISeriesModel $seriesModel
	 */
	public function __construct(ISeriesModel $seriesModel) {
		$this->seriesModel = $seriesModel;
	}

	/**
	 * @param $id
	 * @return null|Serie
	 */
	public function get($id): ?Serie {
		return $this->seriesModel->getSerie($id);
	}
}