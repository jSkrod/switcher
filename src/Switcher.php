<?php
namespace Etermed\Switcher;

class Switcher {
	private $digits_array;

	public function convert( $number ) {
		$words = '';
		$this->prepareInput( $number );
		foreach ( $this->digits_array as $key => $digits ) {
			$group = new Group( $digits, $key );
			$words = $group->convert() . ' ' . $words;
		}
		return $words;
	}

	private function prepareInput( $number ) {
		$digits_array = str_split( $number );

		// Fill array with 0's until we have 3 digits groups.
		while ( count( $digits_array ) % 3 ) {
			array_unshift( $digits_array, '0' );
		}

		$digits_array       = array_reverse( $digits_array );
		$this->digits_array = array_chunk( $digits_array, 3 );
	}
}