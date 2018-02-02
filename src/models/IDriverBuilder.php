<?php

namespace ViPErCZ\DocumentSeries\Models;

/**
 * Trait IBuilder
 * @package ViPErCZ\DocumentSeries\Models
 */
interface IDriverBuilder {
	public function getSeriesModel(): ISeriesModel;
	public function getAccountingYearModel(): IAccountingYearModel;
}