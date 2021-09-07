<?php

if (!function_exists("validate_domain")) {
	/**
	 * Validates if a string is a valid domain.
	 *
	 * @param string $d The string to be checked
	 * @return bool
	 */
	function validate_domain(string $d): bool {
		return (bool)preg_match("/^(?:[-A-Za-z0-9]+\.)+[A-Za-z]{2,6}$/", $d);
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
			$var = self::fixString($var);

			return $var == "" || trim($var) == "" || str_replace(" ", "", str_replace(" ", "", $var)) == "" || strlen($var) == 0;
		} else {
			return empty($var);
		}
	}
}
