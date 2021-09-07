<?php

if (!function_exists("format_uuid")) {
	/**
	 * Formats a stripped v4 UUID with dashes.
	 *
	 * @param string $uuid The UUID that should be formatted
	 * @return string
	 */
	function format_uuid(string $uuid): string {
		$uid = substr($uuid, 0, 8) . "-";
		$uid .= substr($uuid, 8, 4) . "-";
		$uid .= substr($uuid, 12, 4) . "-";
		$uid .= substr($uuid, 16, 4) . "-";
		$uid .= substr($uuid, 20);
		return $uid;
	}
}