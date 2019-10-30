<?php
/**
 * @created Alexey Kutuzov <lexus27.khv@gmail.com>
 * @Project: ceive.validation
 */

namespace Ceive\Validation\RuleReader;


use Ceive\Validation\Rule;
use Ceive\Validation\RuleReader;

/**
 * @Author: Alexey Kutuzov <lexus27.khv@gmail.com>
 * Class Root
 * @package Ceive\Validation\RuleReader
 */
class Root implements RuleReader{
	
	/**
	 * @param Rule $rule
	 * @return string|false
	 */
	public function getErrorMsg(Rule $rule){
		// TODO: Implement getErrorMsg() method.
	}
	
	/**
	 * @param Rule $rule
	 * @return string|false
	 */
	public function getInfoMsg(Rule $rule){
		// TODO: Implement getInfoMsg() method.
	}
}


