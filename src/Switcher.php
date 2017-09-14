<?php
namespace Etermed\Switcher;

class Switcher {
	private $digits_array;

	public function convert( $number ) {
		$words = "";
		if($number < 0 ){
			$words .= 'minus ';
			$number = substr($number,1);
		}
		// Break number into 'before decimal' and 'after decimal' parts';
		$number = explode( '.', $number );

		$this->prepareInput( $number[0] );

		$words .= $this->performConversion( $this->digits_array );

		if ( isset( $number[1] ) ) {
			return $this->appendRest( $words, $number[1] );
		}

		return $words;
	}

	private function appendRest( $words, $rest ) {
		return $words . ' ' . $rest . '/100';
	}

	private function performConversion( $array ) {
		$words = '';

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