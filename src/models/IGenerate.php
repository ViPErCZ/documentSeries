<?php

namespace ViPErCZ\DocumentSeries\Models;

use ViPErCZ\DocumentSeries\Entity\Serie;

/**
 * Interface IGenerate
 * @package ViPErCZ\DocumentSeries\Models
 */
interface IGenerate {
	public function generateNumber(Serie $serie): string;
}