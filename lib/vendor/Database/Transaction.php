<?php

	namespace Vendor\Database; 
	use Vendor\Log\Logger; 
	
	final class Transaction{
	
	 	private static $conn;
	 	private static $logger;

	 	private function __construct(){

	 	} 
	 	public static function open($dataBase){
	 		if (empty(self::$conn)){
				 self::$conn = Connection::open($dataBase); 
			     self::$conn->beginTransaction();
	 		     self::$logger = NULL;

	 		}
	 	}

	 	public static function get(){
	 		return self::$conn;
	 	}

	 	public static function rollback(){
	 		if (self::$conn){
	 			self::$conn->rollback(); 
	 			self::$conn = null; 
	 		}
	 	}

	 	public static function close(){
	 		if (self::$conn){
	 			self::$conn->commit();
	 			self::$conn = null;  
	 		}
	 	}

	 	public static function setLogger(Logger $logger){
	 		self::$logger = $logger; 
	 	}
	 	
	 	public static function log($message){
	 		if (self::$logger){
	 			self::$logger->write($message); 
	 		}
	 	}
	}

?>