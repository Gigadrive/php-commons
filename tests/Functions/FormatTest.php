<?php

namespace Gigadrive\PHPCommons\Tests\Functions;

use PHPUnit\Framework\TestCase;
use function format_uuid;

class FormatTest extends TestCase {
	/**
	 * @author Mehdi Baaboura <mbaaboura@gigadrivegroup.com>
	 * @test
	 */
	public function testFormatUUID() {
		$this->assertEquals("73b417dc-d1e6-45d8-af06-895eeb5222a5", format_uuid("73b417dcd1e645d8af06895eeb5222a5"));
		$this->assertEquals("b5505978-e522-474d-a9fc-c04c8303d745", format_uuid("b5505978e522474da9fcc04c8303d745"));
	}
}