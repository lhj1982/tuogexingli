<?php
class Generator {
	/**
     * Generate current URI.
     * 
     * @return current URI
     */
	public function getCurrentURI() {
		$pageURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} else {
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		return $pageURL;
	}
	
	/**
	 * Get sender's ipaddress.
	 */
	public function getIpAddress() {
		$ipaddress = null;
		if (isset($_SERVER["REMOTE_ADDR"])) {
		    $ipaddress = $_SERVER["REMOTE_ADDR"];
		} else if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
		    $ipaddress = $_SERVER["HTTP_X_FORWARDED_FOR"];
		} else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
		    $ipaddress = $_SERVER["HTTP_CLIENT_IP"];
		}
		return $ipaddress;
	}
}
?>