<?php
/**
 * @created Alexey Kutuzov <lexus27.khv@gmail.com>
 * @Project: ceive.validation
 */

namespace Ceive\Validation;


use Ceive\Validation\Rule\String\Pattern;

class MyReader implements RuleReader{
	
	public $cases = [];
	
	
	public function __construct(){
		
		$this->setCase(
			Pattern::class,
			'Номер телефона введенный Вами не соответствует общепризнанному формату +7(777)777-77-77',
			'Пожалуйста введите в данное поле номер телефона в формате +7(777)777-77-77'
		);
		
	}
	
	public function setCase($classname, $error, $info){
		$this->cases[$classname] = [$error,$info ];
		return $this;
	}
	
	
	/**
	 * @param Rule $rule
	 * @return string|false
	 */
	public function getErrorMsg(Rule $rule){
		foreach($this->cases as $classname => $case){
			if(is_a($rule, $classname)){
				return $case[0];
			}
		}
		return false;
	}
	
	/**
	 * @param Rule $rule
	 * @return string|false
	 */
	public function getInfoMsg(Rule $rule){
		foreach($this->cases as $classname => $case){
			if(is_a($rule, $classname)){
				return $case[1];
			}
		}
		return false;
	}
}


