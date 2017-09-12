<?php
namespace Etermed\Switcher;

use Etermed\Switcher\Data\Words;

class Group {
	private $hundreds;

	private $magnitude;

	private $ones;

	private $tens;

	public function __construct( $arr, $magnitude ) {
		$this->magnitude = $magnitude;

		$this->ones     = $arr[0];
		$this->tens     = $arr[1];
		$this->hundreds = $arr[2];
	}

	public function convert() {
		if ( $this->isOne() ) {
			//dd($this->hundreds . " " . $this->tens . " " . $this->ones);
			return Words::MAGNITUDE[$this->magnitude];
		} elseif ( $this->hasTeen() ) {
			//dd($this->hundreds . " " . $this->tens . " " . $this->ones);
			return Words::getHundreds( $this->hundreds ) . ' ' . Words::getTeen( $this->ones ) . ' ' . Words::getMagnitude( $this->magnitude );
		}

		return Words::getHundreds( $this->hundreds ) . ' ' . Words::getTens( $this->tens ) . ' ' . Words::getOnes( $this->ones ) . ' ' . Words::getMagnitude( $this->magnitude );
	}

	private function hasTeen() {
		return 1 == $this->tens;
	}

	private function isOne() {
		return ( 1 == $this->ones && ! ( $this->tens || $this->hundreds ) );
	}
}