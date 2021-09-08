<?php

if (!function_exists("random_string")) {
	/**
	 * Generates a random string of characters.
	 *
	 * @param int $length The length of characters the string should have
	 * @return string
	 */
	function random_string(int $length = 16): string {
		$characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$charactersLength = strlen($characters);
		$randomString = "";
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
}

if (!function_exists("str_contains")) {
	/**
	 * Checks whether a string contains another string
	 *
	 * @param string $haystack The full string
	 * @param string $needle The substring to be checked
	 * @return bool
	 */
	function str_contains(string $haystack, string $needle): bool {
		return strpos($haystack, $needle) !== false;
	}
}

if (!function_exists("str_starts_with")) {
	/**
	 * Gets whether a string starts with another
	 *
	 * @param string $haystack The string in subject
	 * @param string $needle The string to be checked whether it is the start of $string
	 * @return bool
	 */
	function str_starts_with(string $haystack, string $needle): bool {
		if (strlen($needle) <= strlen($haystack)) {
			return strtolower(substr($haystack, 0, strlen($needle))) == strtolower($needle);
		} else {
			return false;
		}
	}
}

if (!function_exists("str_ends_with")) {
	/**
	 * Gets whether a string ends with another
	 *
	 * @access public
	 * @param string $haystack The string in subject
	 * @param string $needle The string to be checked whether it is the end of $string
	 * @return bool
	 */
	function str_ends_with(string $haystack, string $needle): bool {
		$length = strlen($needle);

		return $length === 0 || substr($haystack, -$length) === $needle;
	}
}

if (!function_exists("str_limit")) {
	/**
	 * Limits a string to a specific length
	 *
	 * @param string $string The string to be limited
	 * @param int $length The final length of the string
	 * @param false $addDots If true, "..." will be added to the end of the string if it is too long
	 * @return string
	 */
	function str_limit(string $string, int $length, bool $addDots = false): string {
		if (strlen($string) > $length)
			$string = substr($string, 0, ($addDots ? $length - 3 : $length)) . ($addDots ? "..." : "");

		return $string;
	}
}

if (!function_exists("str_dashes_to_camel")) {
	/**
	 * Converts a string with dashes ("example-string") to a string with camel-case ("exampleString").
	 *
	 * @param string $string The string to be converted
	 * @param bool $capitalizeFirstCharacter If true, the first character will be capitalized.
	 * @return string
	 */
	function str_dashes_to_camel(string $string, bool $capitalizeFirstCharacter = false): string {
		$str = str_replace("-", "", ucwords($string, "-"));

		if (!$capitalizeFirstCharacter) {
			$str = lcfirst($str);
		}

		return $str;
	}
}

if (!function_exists("str_camel_to_snake")) {
	/**
	 * Converts a string with camel-case ("exampleString") to a string with snake-case ("example_string").
	 *
	 * @param string $string The string to be converted
	 * @return string
	 */
	function str_camel_to_snake(string $string): string {
		return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $string));
	}
}

if (!function_exists("str_snake_to_camel")) {
	/**
	 * Converts a string with snake-case ("example_string") to a string with camel-case ("exampleString").
	 *
	 * @param string $string
	 * @return string
	 */
	function str_snake_to_camel(string $string): string {
		return lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $string))));
	}
}

if (!function_exists("str_fix_encoding")) {
	/**
	 * Runs an encoding check on a specified string to make sure the end result is properly encoded in UTF-8.
	 *
	 * @param string $string The string to be checked
	 * @param string|null $currentEncoding The current encoding of the string. If null, the encoding will be guessed.
	 * @return string The final UTF-8 result
	 * @author Mehdi Baaboura <mbaaboura@gigadrivegroup.com>
	 */
	function str_fix_encoding(string $string, ?string $currentEncoding = null): string {
		if (is_null($currentEncoding)) {
			$currentEncoding = mb_detect_encoding($string) ?: "utf-8";
		}

		if ($currentEncoding === "utf-8") {
			return str_fix_encoding(iconv("utf-8", "ISO 8859-1", $string));
		}

		return iconv($currentEncoding, "utf-8", $string);
	}
}