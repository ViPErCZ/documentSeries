<?php

namespace ViPErCZ\DocumentSeries\Models;

use ViPErCZ\DocumentSeries\Entity\Serie;

/**
 * Interface IStorage
 * @package ViPErCZ\DocumentSeries\Storage
 */
interface ISeriesModel {
	public function getSerie($id): ?Serie;
	public function getSeries($accountingYearId, $documentType = null): array;
	public function getSerieForRobots($accountingYearId, $documentType): ?Serie;
}