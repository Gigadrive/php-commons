<?php

if (!function_exists("rmdir_recursive")) {
	/**
	 * Deletes a directory on the file system, along with all of its contents.
	 *
	 * @param string $dir The path of the directory to delete.
	 * @author Mehdi Baaboura <mbaaboura@gigadrivegroup.com>
	 */
	function rmdir_recursive(string $dir) {
		if (is_dir($dir)) {
			$objects = scandir($dir);
			foreach ($objects as $object) {
				if ($object === "." || $object === "..") {
					continue;
				}

				if (is_dir($dir . DIRECTORY_SEPARATOR . $object) && !is_link($dir . "/" . $object)) {
					rmdir_recursive($dir . DIRECTORY_SEPARATOR . $object);
				} else {
					unlink($dir . DIRECTORY_SEPARATOR . $object);
				}
			}
			rmdir($dir);
		}
	}
}