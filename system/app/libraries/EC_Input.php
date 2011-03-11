<?php
class EC_Input extends CI_Input{
	function EC_Input(){
	
	}
	function _clean_input_keys($str)
	{
		if ( ! preg_match("/^[a-z0-9:_\/-]+$/i", $str))
		{
			exit('Disallowed Key Characters.');
		}

		return $str;
	}
};