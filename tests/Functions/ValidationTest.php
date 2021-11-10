<?php

namespace Gigadrive\PHPCommons\Tests\Functions;

use PHPUnit\Framework\TestCase;
use function is_empty;
use function validate_domain;

class ValidationTest extends TestCase {
	/**
	 * @author Mehdi Baaboura <mbaaboura@gigadrivegroup.com>
	 * @test
	 */
	public function testValidateDomain() {
		$this->assertEquals(true, validate_domain("google.com"));
		$this->assertEquals(true, validate_domain("test.facebook.com"));
		$this->assertEquals(true, validate_domain("twitter.de"));
		$this->assertEquals(true, validate_domain("mcskinhistory.net"));
		$this->assertEquals(false, validate_domain("123.123.123"));
		$this->assertEquals(false, validate_domain("test123"));
		$this->assertEquals(false, validate_domain("192.168.0.1"));
		$this->assertEquals(false, validate_domain("localhost"));
		$this->assertEquals(false, validate_domain("yo.o"));
		$this->assertEquals(true, validate_domain("123.234.de"));
		$this->assertEquals(true, validate_domain("meinewebseite.digital"));
		$this->assertEquals(true, validate_domain("www.meinewebseite.digital"));
		$this->assertEquals(true, validate_domain("www.test.meinewebseite.digital"));
		$this->assertEquals(true, validate_domain("blackplasma.community"));
		$this->assertEquals(true, validate_domain("www.blackplasma.community"));
		$this->assertEquals(true, validate_domain("www.test.blackplasma.community"));
	}

	/**
	 * @author Mehdi Baaboura <mbaaboura@gigadrivegroup.com>
	 * @test
	 */
	public function testIsEmpty() {
		$this->assertTrue(is_empty(""));
		$this->assertTrue(is_empty(" "));
		$this->assertTrue(is_empty("        "));

		$this->assertTrue(is_empty([]));

		$this->assertTrue(is_empty(null));
		$this->assertTrue(is_empty(false));
	}
}