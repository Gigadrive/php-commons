<?php

if (!function_exists("url_force_https")) {
	/**
	 * Forces HTTPS protocol on a URL string.
	 *
	 * @param string $url The URL to be updated.
	 * @return string
	 * @author Mehdi Baaboura <mbaaboura@gigadrivegroup.com>
	 */
	function url_force_https(string $url): string {
		if (str_contains($url, "http://localhost") || str_contains($url, "http://127.0.0.1")) {
			return $url;
		}

		return str_replace("http://", "https://", $url);
	}
}

if (!function_exists("str_extract_urls")) {
	/**
	 * Extracts all URLs in a string.
	 *
	 * @param string $text The string to check
	 * @return array The URLs that were found
	 * @author Mehdi Baaboura <mbaaboura@gigadrivegroup.com>
	 */
	function str_extract_urls(string $text): array {
		$pattern = "~[a-z]+://\S+~";
		if (preg_match_all($pattern, $text, $out)) {
			return $out[0];
		}

		return [];
	}
}