<?php
/**
 * @created Alexey Kutuzov <lexus27.khv@gmail.com>
 * @Project: ceive.validation
 */

namespace Ceive\Validation\Rule\Number;


use Ceive\Validation\Rule;

/**
 * @Author: Alexey Kutuzov <lexus27.khv@gmail.com>
 * Class Range
 * @package Ceive\Validation\Rule\Number
 */
class Range extends Rule{
	
	public $min = null;
	
	public $max = null;
	
	public function check($value){
		
		if(isset($this->min) && $this->min > $value){
			return false;
		}
		
		if(isset($this->max) && $this->max < $value){
			return false;
		}
		
		return true;
		
	}
}


