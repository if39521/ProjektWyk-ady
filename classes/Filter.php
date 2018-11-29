<?php
class Filter {
	
	/**
	 *  @param	string	$string		
	 *  @return            			Filters and returns a valid string to put into the Database.
	 *  @note				
	 * 					
	 */
	public static function String( $string, $html = false ) {
		if(!$html) {
			$string = filter_var( $string , FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		} else {
			$string = filter_var( $string , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		}
		return $string;
	}
	
	/**
	 *  @param	string	$url		
	 *  @return            			Filters and returns a valid or invalid URL
	 */
	public static function URL( $url ) {
		return filter_var( $url , FILTER_SANITIZE_URL);
	}
	
	/**
	 *  @param	int		$integer	
	 *  @return	int					Returns an integer after being filtered. 
	 */
	public static function Int( $integer ) {
		return (int) $integer = filter_var( $integer , FILTER_SANITIZE_NUMBER_INT);
	}
}
?>