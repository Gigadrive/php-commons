<?php

if (!function_exists("is_even")) {
	/**
	 * Checks whether an integer is an even number.
	 *
	 * @param int $number
	 * @return bool
	 * @author Mehdi Baaboura <mbaaboura@gigadrivegroup.com>
	 */
	function is_even(int $number): bool {
		return $number % 2 === 0;
	}
}

if (!function_exists("is_odd")) {
	/**
	 * Checks whether an integer is an odd number.
	 *
	 * @param int $number
	 * @return bool
	 * @author Mehdi Baaboura <mbaaboura@gigadrivegroup.com>
	 */
	function is_odd(int $number): bool {
		return !is_even($number);
	}
}