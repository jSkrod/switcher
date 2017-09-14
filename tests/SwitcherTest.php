<?php
use PHPUnit\Framework\TestCase;
use Etermed\Switcher\Switcher;

final class SwitcherTest extends TestCase
{
	/**
	 * Check the output of conversion
	 * 
	 */
    public function testWorksForIntegers(): void
    {
    	$switcher = new Switcher();

        $this->assertEquals(
            $switcher->convert(1234),
            'tysiąc dwieście trzydzieści cztery PLN '
        );
        $this->assertEquals(
           $switcher->convert(1000501),
            'milion  pięćset  jeden PLN '
        );
    }

    /**
	 * Check the output of conversion with float values
	 * 
	 */
    public function testWorksForFloats(): void
    {
    	$switcher = new Switcher();

        $this->assertEquals(
            $switcher->convert(1234.23),
            'tysiąc dwieście trzydzieści cztery PLN  23/100'
        );
        $this->assertEquals(
            $switcher->convert(1000501.54),
            'milion  pięćset  jeden PLN  54/100'
        );
    }
}
    
