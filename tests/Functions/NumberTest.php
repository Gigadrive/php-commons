<?php

namespace Gigadrive\PHPCommons\Tests\Functions;

use PHPUnit\Framework\TestCase;
use function is_even;
use function is_odd;

class NumberTest extends TestCase {
	/**
	 * @author Mehdi Baaboura <mbaaboura@gigadrivegroup.com>
	 * @test
	 */
	public function testIsEven() {
		$this->assertTrue(is_even(2));
		$this->assertTrue(is_even(4));
		$this->assertTrue(is_even(28));

		$this->assertFalse(is_even(1));
		$this->assertFalse(is_even(19));
		$this->assertFalse(is_even(71));
	}

	/**
	 * @author Mehdi Baaboura <mbaaboura@gigadrivegroup.com>
	 * @test
	 */
	public function testIsOdd() {
		$this->assertFalse(is_odd(2));
		$this->assertFalse(is_odd(4));
		$this->assertFalse(is_odd(28));

		$this->assertTrue(is_odd(1));
		$this->assertTrue(is_odd(19));
		$this->assertTrue(is_odd(71));
	}
}