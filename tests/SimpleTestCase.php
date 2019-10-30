<?php

namespace Ceive\Validation\Tests;

use Ceive\Validation\Rule\Any;
use Ceive\Validation\Rule\Number\Float\Precision;
use Ceive\Validation\Rule\Number\Range;
use Ceive\Validation\Rule\PresenceOf;
use Ceive\Validation\Rule\String\Length;
use Ceive\Validation\Rule\String\Pattern;
use Ceive\Validation\Validator;

/**
 * @Creator Alexey Kutuzov <lexus27.khv@gmail.com>
 * @Author: Alexey Kutuzov <lexus27.khv@gmai.com>
 * @Project: ceive.data-validation
 */
class SimpleTestCase extends \PHPUnit_Framework_TestCase{
	
	public function testBasic(){
		
		$rule1 = new Precision();
		$rule1->min = null;
		$rule1->max = 2;
		
		if($rule1->check(1.20)){
			
		}
		
		$rule2 = new Range();
		$rule2->min = 0;
		$rule2->max = 500;
		
		if($rule2->check(200)){
			
		}
		
		
		$rule3 = new Any();
		$rule3->rules[] = $rule1;
		$rule3->rules[] = $rule2;
		
		if($rule3->check(200)){
			
		}
		
		$rule4 = new PresenceOf();
		if($rule4->check(0.0)){
			
		}
		
		
		$rule5 = new Pattern();
		$rule5->pattern = '@+?\d[\s]?\(\d\d\d\)[\s]?\d\d\d[\s\-]?\d\d[\s\-]?\d\d@';
		if($rule5->check("+7 (999) 586-27-22")){
			
		}
		
		$rule6 = new Length();
		$rule6->pattern = '@+?\d[\s]?\(\d\d\d\)[\s]?\d\d\d[\s\-]?\d\d[\s\-]?\d\d@';
		if($rule6->check("+7 (999) 586-27-22")){
			
		}
	}
	
}


