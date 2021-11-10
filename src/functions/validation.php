<?php

if (!function_exists("validate_domain")) {
	/**
	 * Validates if a string is a valid domain.
	 *
	 * @param string $domain The string to be checked
	 * @return bool
	 */
	function validate_domain(string $domain): bool {
		// https://stackoverflow.com/a/24552759
		// note: november 11th 2021 by @Zeryther
		// today i learned that domain names are really hard to validate with 100% accuracy
		// since i'm really not good with regular expressions, i kept searching stackoverflow for one that passes all of my tests
		// this is the most accurate one i could find. it still fails some very specific things
		// if you find a better one, please let me know or submit a pull request
		return (bool)preg_match("/^(([a-zA-Z]{1})|([a-zA-Z]{1}[a-zA-Z]{1})|([a-zA-Z]{1}[0-9]{1})|([0-9]{1}[a-zA-Z]{1})|([a-zA-Z0-9][-_\.a-zA-Z0-9]{1,61}[a-zA-Z0-9]))\.([a-zA-Z]{2,13}|[a-zA-Z0-9-]{2,30}\.[a-zA-Z]{2,3})$/", $domain);
		//return (bool)preg_match("/^((?!-))(xn--)?[a-z0-9][a-z0-9-_]{0,61}[a-z0-9]{0,}\.?((xn--)?([a-z0-9\-.]{1,61}|[a-z0-9-]{1,30})\.?[a-z]{2,})$/i", $domain);
		//return (bool)preg_match("/^((?!-))(xn--)?[a-z0-9][a-z0-9-_]{0,61}[a-z0-9]?\.(xn--)?([a-z0-9\-]{1,61}|[a-z0-9-]{1,30}\.[a-z]{2,})$/", $domain);
		//return (bool)preg_match("/^(?:[-A-Za-z0-9]+\.)+[A-Za-z]{2,6}$/", $d);
	}
}

if (!function_exists("is_empty")) {
	/**
	 * Returns whether a string or array is empty
	 *
	 * @param string|array $var
	 * @return bool
	 */
	function is_empty($var): bool {
		if (is_array($var)) {
			return count($var) == 0;
		} else if (is_string($var)) {
			$var = str_fix_encoding($var);

			return $var == "" || trim($var) == "" || str_replace(" ", "", str_replace(" ", "", $var)) == "" || strlen($var) == 0;
		} else {
			return empty($var);
		}
	}
}
