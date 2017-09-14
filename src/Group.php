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
		if ( $this->isEmpty() ) {
			return;
		} elseif ( $this->isOne() ) {
			return Words::getMagnitude($this->magnitude,-1);
		} elseif ( $this->hasTeen() ) {
			return Words::getHundreds( $this->hundreds ) . ' ' . Words::getTeen( $this->ones ) . ' ' . Words::getMagnitude( $this->magnitude );
		}

		return Words::getHundreds( $this->hundreds ) . ' ' . Words::getTens( $this->tens ) . ' ' . Words::getOnes( $this->ones ) . ' ' . Words::getMagnitude( $this->magnitude, $this->ones );
	}

	private function hasTeen() {
		return 1 == $this->tens;
	}

	private function isEmpty() {
		return ! ( $this->ones || $this->tens || $this->hundreds );
	}

	private function isOne() {
		return ( 1 == $this->ones && ! ( $this->tens || $this->hundreds ) );
	}
}