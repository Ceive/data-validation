<?php
/**
 * @created Alexey Kutuzov <lexus27.khv@gmail.com>
 * @Project: ceive.validation
 */
namespace Ceive\Validation\Rule;
use Ceive\Validation\Rule;
/**
 * @Author: Alexey Kutuzov <lexus27.khv@gmail.com>
 * Class PresenceOf
 * @package Ceive\Validation\Rule
 */
class PresenceOf extends Rule{
	
	/**
	 * @param $value
	 * @return bool
	 */
	public function check($value){
		
		if(is_bool($value)){
			return true;
		}
		
		if(is_float($value)){
			return true;
		}
		
		if(is_int($value)){
			return true;
		}
		
	    return isset($value) && !empty($value);
	}
}


