<?php

require_once __DIR__ . '/../vendor/autoload.php';

try {
	$driverBuilder = new \ViPErCZ\DocumentSeries\Models\DriverBuilder(new \ViPErCZ\DocumentSeries\Models\Drivers\DriversList(), null);
	$seriesOperator = new \ViPErCZ\DocumentSeries\SeriesOperator($driverBuilder);
	$serie = $seriesOperator->getSerie(1);
	var_dump($serie);

	$series = $seriesOperator->getSeries(1);
	var_dump($series);

	$robot = $seriesOperator->getSerieForRobots(1, 'TV');
	var_dump($robot);

	if ($robot) {
		$number = $seriesOperator->generateNumber($robot);
		echo 'NUMBER: ' . $number . PHP_EOL;
	}

	$accountingYear = $seriesOperator->getActualYear();
	var_dump($accountingYear);

	$accountingYear2 = $seriesOperator->getYear(new DateTime('2017-01-01 00:00:00'));
	var_dump($accountingYear2);

	if ($accountingYear) {
		$actualSerieByAccountingYear = $seriesOperator->getSerie($accountingYear->getId(), 'TV');

		$number = $seriesOperator->generateNumber($actualSerieByAccountingYear);
		echo 'NUMBER: ' . $number . PHP_EOL;
	}

	$accountingYear = \ViPErCZ\DocumentSeries\Entity\AccountingYear::create(3, 2020, true);
	$accountingYear3 = $seriesOperator->getYear(new DateTime('2020-01-01 00:00:00'));
	var_dump($accountingYear3);
	$seriesOperator->insertAccountingYear($accountingYear);
	$accountingYear3 = $seriesOperator->getYear(new DateTime('2020-01-01 00:00:00'));
	var_dump($accountingYear3);

	$seriesOperator->insertAccountingYear($accountingYear); // exception violation

} catch (\ViPErCZ\DocumentSeries\DriverException $exception) {
	echo $exception->getMessage() . PHP_EOL;
}