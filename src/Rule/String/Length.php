<?php
/**
 * @created Alexey Kutuzov <lexus27.khv@gmail.com>
 * @Project: ceive.validation
 */

namespace Ceive\Validation\Rule\String;


use Ceive\Validation\Rule;
use Ceive\Validation\RuleLocalResult;

/**
 * @Author: Alexey Kutuzov <lexus27.khv@gmail.com>
 * Class Length
 * @package Ceive\Validation\Rule\String
 *
 * todo Мы разделили Min и Max сущности потому-что нам нужен конкретный вердикт
 * todo можно использовать локальные результаты правила, только читальщики должны их обработать(нужно передовать
 * todo читальщику еще и результаты, а он должен знать о них, сейчас передаются только сами правила)
 * todo можно использовать property: value, and option; под большим вопросом
 *
 */
class Length extends Rule{
	
	public $min = null;
	
	public $max = null;
	
	public function check($value){
		$result = new RuleLocalResult();
		$length = strlen($value);
		
		if(isset($this->min) && $this->min > $length){
			$result->invalidOn('min');
			return false;
		}
		
		if(isset($this->max) && $this->max < $length){
			$result->invalidOn('max');
			return false;
		}
		
		return true;
	}
	
}


