<?php
function autoloadCore($clase){
	if (file_exists(SYS_PATH . strtolower($clase) . '.php')) {
		include_once SYS_PATH . strtolower($clase) . '.php';
	}
}


spl_autoload_register("autoloadCore");

?>