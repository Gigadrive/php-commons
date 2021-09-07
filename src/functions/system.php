<?php

if (!function_exists("is_git_installed")) {
	/**
	 * Checks if Git is installed on the current system.
	 *
	 * @return bool
	 * @author Mehdi Baaboura <mbaaboura@gigadrivegroup.com>
	 */
	function is_git_installed(): bool {
		// FIXME: Does not work on Windows
		return !!`which git`;
	}
}