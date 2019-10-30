<?php
/**
 * @created Alexey Kutuzov <lexus27.khv@gmail.com>
 * @Project: ceive.validation
 */

namespace Ceive\Validation\Rule;


use Ceive\Validation\Rule;

/**
 * @Author: Alexey Kutuzov <lexus27.khv@gmail.com>
 * Class Any
 * @package Ceive\Validation\Rule
 */
class Any extends Rule{
	
	/** @var Rule[]  */
	public $rules = [];
	
	/**
	 * @param $value
	 * @return bool
	 */
	public function check($value){
		foreach($this->rules as $rule){
			if($rule->check($value)){
				return true;
			}
		}
		return false;
	}
	
}


