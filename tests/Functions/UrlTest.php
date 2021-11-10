<?php

namespace Gigadrive\PHPCommons\Tests\Functions;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use function str_extract_urls;
use function str_root_domain;
use function url_force_https;

class UrlTest extends TestCase {
	/**
	 * @author Mehdi Baaboura <mbaaboura@gigadrivegroup.com>
	 * @test
	 */
	public function testForceHttps() {
		$this->assertEquals("http://localhost/123/test.html", url_force_https("http://localhost/123/test.html"));
		$this->assertEquals("https://google.com/abc.xyz", url_force_https("https://google.com/abc.xyz"));
		$this->assertEquals("https://facebook.com/", url_force_https("http://facebook.com/"));
		$this->assertEquals("https://gigadrivegroup.com/projects", url_force_https("http://gigadrivegroup.com/projects"));
	}

	/**
	 * @author Mehdi Baaboura <mbaaboura@gigadrivegroup.com>
	 * @test
	 */
	public function testExtractUrls() {
		$this->assertEquals(["https://google.com", "https://twitter.com"], str_extract_urls("https://google.com\nthis is a test https://twitter.com"));
		$this->assertEquals(["http://youtube.com"], str_extract_urls("12318289\nabcabcdef\nthis is a test http://youtube.com"));


		$this->assertEquals([], str_extract_urls("this is a test\n1234\nthis is a test"));
		$this->assertEquals([], str_extract_urls("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi quis aliquam urna. Ut a libero."));
	}

	/**
	 * @author Mehdi Baaboura <mbaaboura@gigadrivegroup.com>
	 * @test
	 */
	public function testRootDomain() {
		// valid arguments
		$this->assertEquals("example.com", str_root_domain("www.example.com"));
		$this->assertEquals("hypixel.net", str_root_domain("mc.hypixel.net"));
		$this->assertEquals("domain.com", str_root_domain("sub.domain.com"));
		$this->assertEquals("test.de", str_root_domain("test.test.de"));
		$this->assertEquals("abcabc.com", str_root_domain("abc.abcabc.com"));
		$this->assertEquals("test.com", str_root_domain("this.isa.test.com"));

		// invalid arguments
		$this->expectException(InvalidArgumentException::class);
		str_root_domain("localhost");

		$this->expectException(InvalidArgumentException::class);
		str_root_domain("192.168.0.1");

		$this->expectException(InvalidArgumentException::class);
		str_root_domain("255.255.255.255");

		$this->expectException(InvalidArgumentException::class);
		str_root_domain("123.456.789.012");

		$this->expectException(InvalidArgumentException::class);
		str_root_domain("example");
	}
}