<?php
/**
 * @created Alexey Kutuzov <lexus27.khv@gmail.com>
 * @Project: ceive.validation
 */

namespace Ceive\Validation;

/**
 * @Author: Alexey Kutuzov <lexus27.khv@gmail.com>
 * Class Rule
 * @package Ceive\Validation
 */
class Rule{
	
	/**
	 * @param $value
	 * @return bool
	 */
	public function check($value){
		return true;
	}
	
	public function export(){
		return [
			'type' => get_class($this),
		];
	}
	
}


