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
 * Class Composition
 * @package Ceive\Validation\RuleReader
 */
class Composition implements RuleReader{
	
	const TPL_KEY_INFO  = 0;
	const TPL_KEY_ERROR = 1;
	
	protected $collations = [];
	
	/**
	 * @param $rule_type
	 * @param $info_template
	 * @param null $error_template
	 */
	public function setCollation($rule_type, $info_template, $error_template = null){
		$this->collations[$rule_type] = [$info_template,$error_template];
	}
	
	/**
	 * @param Rule $rule
	 * @return mixed
	 */
	public function getErrorMsg(Rule $rule){
		$type = get_class($rule);
		if(isset($this->collations[$type])){
			$template = $this->collations[$type][self::TPL_KEY_ERROR]?:$this->collations[$type][self::TPL_KEY_INFO];
			$data = $rule->export();
			return str_replace(array_map([$this,'_to_placeholder_identifier'],array_keys($data)),array_values($data),$template);
		}
		return false;
	}
	
	/**
	 * @param Rule $rule
	 * @return mixed
	 */
	public function getInfoMsg(Rule $rule){
		$type = get_class($rule);
		if(isset($this->collations[$type])){
			$template = $this->collations[$type][self::TPL_KEY_ERROR]?:$this->collations[$type][self::TPL_KEY_INFO];
			$data = $rule->export();
			return str_replace(array_map([$this,'_to_placeholder_identifier'],array_keys($data)),array_values($data),$template);
		}
		return false;
	}
	
	protected function _to_placeholder_identifier($key){
		return '{'. $key .'}';
	}
	
}


