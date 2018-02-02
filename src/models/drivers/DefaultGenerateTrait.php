<?php

namespace ViPErCZ\DocumentSeries\Models\Drivers;

use DateTime;
use ViPErCZ\DocumentSeries\Entity\Serie;

trait DefaultGenerateTrait {
	/**
	 * @param Serie $serie
	 * @return string
	 */
	public function generateNumber(Serie $serie): string {
		$now = new DateTime();
		$this->prepareNumber($serie, $now);
		$number = $this->formatNumber($serie, $now);
		$serie->setCurrentNumber($serie->getCurrentNumber() + 1);

		return $number;
	}

	/**
	 * @param Serie $serie
	 * @param DateTime $now
	 */
	private function prepareNumber(Serie $serie, DateTime $now): void {
		if ($serie->getLastUse() !== null) {
			if ($serie->getResetBy() === 'Y') {
				if ($now->format('Y') !== $serie->getLastUse()->format('Y')) {
					$serie->setCurrentNumber(1);
				}
			}

			if ($serie->getResetBy() === 'M') {
				if ($now->format('m') !== $serie->getLastUse()->format('m')) {
					$serie->setCurrentNumber(1);
				}
			}

			if ($serie->getResetBy() === 'D') {
				if ($now->format('d') !== $serie->getLastUse()->format('d')) {
					$serie->setCurrentNumber(1);
				}
			}
		}

		$serie->setLastUse($now);
	}

	/**
	 * @param Serie $serie
	 * @param DateTime $now
	 * @return string
	 */
	private function formatNumber(Serie $serie, DateTime $now): string {
		$mask = $serie->getMask();

		$search = ['YYYY', 'YY', 'MM', 'DD'];
		$dated = [$now->format('Y'), $now->format('y'), $now->format('m'), $now->format('d')];

		$mask = str_replace($search, $dated, $mask);
		$number = sprintf("%s%s%0{$serie->getNumbers()}d", $serie->getPrefix(), $mask, $serie->getCurrentNumber());

		return $number;
	}
}