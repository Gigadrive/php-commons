<?php

namespace Gigadrive\PHPCommons\Tests\Functions;

use PHPUnit\Framework\TestCase;
use function random_string;
use function str_camel_to_snake;
use function str_contains;
use function str_dashes_to_camel;
use function str_ends_with;
use function str_fix_encoding;
use function str_limit;
use function str_snake_to_camel;
use function str_starts_with;
use function strlen;

class StringTest extends TestCase {
	/**
	 * @author Mehdi Baaboura <mbaaboura@gigadrivegroup.com>
	 * @test
	 */
	public function testRandomString() {
		$this->assertEquals(16, strlen(random_string()));
		$this->assertEquals(28, strlen(random_string(28)));
		$this->assertEquals(34, strlen(random_string(34)));
	}

	/**
	 * @author Mehdi Baaboura <mbaaboura@gigadrivegroup.com>
	 * @test
	 */
	public function testContains() {
		$this->assertTrue(str_contains("This is a test.", "test"));
		$this->assertFalse(str_contains("This is a Test.", "test"));
	}

	/**
	 * @author Mehdi Baaboura <mbaaboura@gigadrivegroup.com>
	 * @test
	 */
	public function testStartsWith() {
		$this->assertTrue(str_starts_with("This is a test.", "This "));
		$this->assertFalse(str_starts_with("This is a test.", "this"));
	}

	/**
	 * @author Mehdi Baaboura <mbaaboura@gigadrivegroup.com>
	 * @test
	 */
	public function testEndsWith() {
		$this->assertTrue(str_ends_with("This is a test.", " test."));
		$this->assertFalse(str_ends_with("This is a test.", " Test."));
	}

	/**
	 * @author Mehdi Baaboura <mbaaboura@gigadrivegroup.com>
	 * @test
	 */
	public function testStringLimit() {
		$this->assertEquals("This ", str_limit("This is a test.", 5));
		$this->assertEquals("This ...", str_limit("This is a test.", 8, true));
	}

	/**
	 * @author Mehdi Baaboura <mbaaboura@gigadrivegroup.com>
	 * @test
	 */
	public function testDashesToCamel() {
		$this->assertEquals("camelCase", str_dashes_to_camel("camel-case"));
		$this->assertEquals("CamelCase", str_dashes_to_camel("camel-case", true));
		$this->assertEquals("thisIsACamelCaseTest", str_dashes_to_camel("this-is-a-camel-case-test"));
		$this->assertEquals("ThisIsACamelCaseTest", str_dashes_to_camel("this-is-a-camel-case-test", true));
	}

	/**
	 * @author Mehdi Baaboura <mbaaboura@gigadrivegroup.com>
	 * @test
	 */
	public function testCamelToSnake() {
		$this->assertEquals("snake_case", str_camel_to_snake("snakeCase"));
		$this->assertEquals("this_is_a_snake_case_test", str_camel_to_snake("thisIsASnakeCaseTest"));
	}

	/**
	 * @author Mehdi Baaboura <mbaaboura@gigadrivegroup.com>
	 * @test
	 */
	public function testSnakeToCamel() {
		$this->assertEquals("camelCase", str_snake_to_camel("camel_case"));
		$this->assertEquals("thisIsACamelCaseTest", str_snake_to_camel("this_is_a_camel_case_test"));
	}

	/**
	 * @author Mehdi Baaboura <mbaaboura@gigadrivegroup.com>
	 * @test
	 */
	public function testFixEncoding() {
		$this->assertEquals("test", str_fix_encoding("test"));
		$this->assertEquals("123 test", str_fix_encoding("123 test"));

		$this->assertEquals("😂😊🤣", str_fix_encoding("😂😊🤣"));
		$this->assertEquals("§m=", str_fix_encoding("\xC2\xa7\x6d\x3d"));
	}
}