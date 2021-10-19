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

if (!function_exists("str_root_domain")) {
	/**
	 * Extracts the root domain of a string that is either a domain or a subdomain.
	 * E.g.: "www.example.com" returns "example.com"
	 *
	 * @param string $host The hostname, must either be a domain or a subdomain.
	 * @return string The root domain of the subdomain.
	 * @throws InvalidArgumentException Thrown if $host is not a valid domain.
	 * @author Mehdi Baaboura <mbaaboura@gigadrivegroup.com>
	 * @see https://stackoverflow.com/a/49338205
	 */
	function str_root_domain(string $host): string {
		if (!validate_domain($host)) {
			throw new InvalidArgumentException("Host must be a valid domain.");
		}

		$host = strtolower(trim($host));
		$count = substr_count($host, '.');

		if ($count === 2) {
			if (strlen(explode('.', $host)[1]) > 3) $host = explode('.', $host, 2)[1];
		} else if ($count > 2) {
			$host = str_root_domain(explode('.', $host, 2)[1]);
		}

		return $host;
	}
}