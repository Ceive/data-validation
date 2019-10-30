<?php
/**
 * @created Alexey Kutuzov <lexus27.khv@gmail.com>
 * @Project: ceive.validation
 */

namespace Ceive\Validation;

/**
 * @Author: Alexey Kutuzov <lexus27.khv@gmail.com>
 * Class Collector
 * @package Ceive\Validation
 */
class Collector{
	
	public $errors = [];
	public $error_messages = [];
	
	public $data;
	
	public function getData(){
		return $this->data;
	}
	
	public function getSource(){
		return $this->data;
	}
	
	/**
	 * @param $property
	 * @param Rule $rule
	 * @param null $system_message
	 */
	public function error($property, Rule $rule, $system_message = null){
		$this->errors[$property][] = $rule;
		$this->error_messages[$property][] = $system_message;
	}
	
	/**
	 * @param $field
	 * @return Rule[]
	 */
	public function getFieldErrors($field){
		return isset($this->errors[$field])?$this->errors[$field]:[];
	}
	
	public function isFailure(){
		return !empty($this->errors);
	}
	
}


