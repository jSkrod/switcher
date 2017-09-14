<?php
namespace Etermed\Switcher\Data;

final class Words {
	const MAGNITUDE_ONE = [
		0 => 'PLN',
		1 => 'tysiąc',
		2 => 'milion',
		3 => 'miliard',
	];
	const MAGNITUDE_MANY = [
		0 => 'PLN',
		1 => 'tysięcy',
		2 => 'milionów',
		3 => 'miliardów',
	];
	const MAGNITUDE_CORNER_CASE = [
		0 => 'PLN',
		1 => 'tysiące',
		2 => 'miliony',
		3 => 'miliary',
	];
	const NUMBERS_AS_WORDS = [
		0 => [
			0 => '',
			1 => '',
			2 => '',
		],
		1 => [
			0 => 'jeden',
			1 => [
				0 => 'dziesięć',
				1 => 'jedenaście',
				2 => 'dwanaście',
				3 => 'trzynaście',
				4 => 'czternaście',
				5 => 'piętnaście',
				6 => 'szesnaście',
				7 => 'siedemnaście',
				8 => 'osiemnaście',
				9 => 'dziewiętnaście',
			],
			2 => 'sto',
		],
		2 => [
			0 => 'dwa',
			1 => 'dwadzieścia',
			2 => 'dwieście',
		],
		3 => [
			0 => 'trzy',
			1 => 'trzydzieści',
			2 => 'trzysta',
		],
		4 => [
			0 => 'cztery',
			1 => 'czterdzieści',
			2 => 'czterysta',
		],
		5 => [
			0 => 'pięć',
			1 => 'pięćdziesiąt',
			2 => 'pięćset',
		],
		6 => [
			0 => 'sześć',
			1 => 'sześćdziesiąt',
			2 => 'sześćset',
		],
		7 => [
			0 => 'siedem',
			1 => 'siedemdziesiąt',
			2 => 'siedemset',
		],
		8 => [
			0 => 'osiem',
			1 => 'osiemdziesiąt',
			2 => 'osiemset',
		],
		9 => [
			0 => 'dziewięć',
			1 => 'dziewięćdziesiąt',
			2 => 'dziewięćset',
		],

	];

	public static function getHundreds( $value ) {
		return self::NUMBERS_AS_WORDS[$value][2];
	}

	public static function getMagnitude( $magnitude, $value = 0 ) {
		switch ($value){
			case -1:
				return self::MAGNITUDE_ONE[$magnitude];
				break;
			case 2:
			case 3:
			case 4:
				return self::MAGNITUDE_CORNER_CASE[$magnitude];
				break;
			default:
				return self::MAGNITUDE_MANY[$magnitude];
				break;
		}
		return self::MAGNITUDE[$value];
	}

	public static function getOnes( $value ) {
		return self::NUMBERS_AS_WORDS[$value][0];
	}

	public static function getTeen( $value ) {
		return self::NUMBERS_AS_WORDS[1][1][$value];
	}

	public static function getTens( $value ) {
		return self::NUMBERS_AS_WORDS[$value][1];
	}
}