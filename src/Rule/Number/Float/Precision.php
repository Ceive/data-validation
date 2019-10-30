<?php
/**
 * @created Alexey Kutuzov <lexus27.khv@gmail.com>
 * @Project: ceive.validation
 */

namespace Ceive\Validation\Rule\Number\Float;

use Ceive\Validation\Rule;

/**
 * @Author: Alexey Kutuzov <lexus27.khv@gmail.com>
 * Class Precision
 * @package Ceive\Validation\Rule\Number\Float
 */
class Precision extends Rule{
	
	public $min = null;
	
	public $max = null;
	
	public $state = [];
	
	public function check($value){
		$value = (string) $value;
		$arr = array_replace(['',''],explode('.',$value));
		$length = strlen($arr[1]);
		
		if(isset($this->min) && $this->min > $length){
			$this->fail('min');
			return false;
		}
		
		if(isset($this->max) && $this->max < $length){
			$this->fail('max');
			return false;
		}
		
		return true;
		
	}
	
	public function fail($property){
		$this->state[$property] = $property;
		return $this;
	}
	
}


