<?php
/**
 * SessionUtil is used for push/pop data from session.
 * There is only one session namespace in this application,
 * and it can have multiple key=>value pairs.
 * 
 * @author james
 *
 */
class SessionUtil {	
	const NAME = "myData";
	const USER = "user";
	// expire in 30min
	const EXPIRE_IN_SEC = 5;
	
	/**
	 * Get property value from session by given key.
	 * 
	 * @param $key
	 * @return return value of key
	 */
	public static function getProperty($key) {
		return Yii::app()->session[$key];
	}
	
	/**
	 * Push value to session with key.
	 * 
	 * @param $key
	 * @param $value
	 */
	public static function setProperty($key, $value) {
		Yii::app()->session[$key] = $value;
  		//$session->close();
	}
}
?>