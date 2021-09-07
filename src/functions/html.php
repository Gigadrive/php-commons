<?php

if (!function_exists("str_sanitize")) {
	/**
	 * Returns a sanitized string that avoids prepending or trailing spaces as well as XSS attacks.
	 *
	 * @param string $string
	 * @return string
	 * @author Mehdi Baaboura <mbaaboura@gigadrivegroup.com>
	 */
	function str_sanitize(string $string): string {
		return trim(htmlentities($string));
	}
}

if (!function_exists("str_desanitize")) {
	/**
	 * Returns the opposite of {@link str_sanitize()}.
	 *
	 * @param string $string
	 * @return string
	 * @author Mehdi Baaboura <mbaaboura@gigadrivegroup.com>
	 */
	function str_desanitize(string $string): string {
		return html_entity_decode($string);
	}
}

if (!function_exists("str_sanitize_html_attribute")) {
	/**
	 * Returns a sanitized string to use in HTML attributes.
	 *
	 * @param string $string
	 * @return string
	 * @author Mehdi Baaboura <mbaaboura@gigadrivegroup.com>
	 */
	function str_sanitize_html_attribute(string $string): string {
		return trim(htmlspecialchars($string, ENT_QUOTES | ENT_HTML5));
	}
}