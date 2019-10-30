<?php
/**
 * @created Alexey Kutuzov <lexus27.khv@gmail.com>
 * @Project: ceive.validation
 */
namespace Ceive\Validation\Rule\String;


use Ceive\Validation\Rule;

/**
 * @Author: Alexey Kutuzov <lexus27.khv@gmail.com>
 * Class Pattern
 * @package Ceive\Validation\Rule\String
 */
class Pattern extends Rule{
	
	public $pattern;
	
	public function check($value){
		
		if(isset($this->pattern) && !preg_match($this->pattern, $value)){
			return false;
		}

		return true;
	}
	
	public function export(){
		return array_replace(parent::export(), [
		    'pattern' => $this->pattern
        ]);
	}



}


