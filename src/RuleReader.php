<?php
/**
 * @created Alexey Kutuzov <lexus27.khv@gmail.com>
 * @Project: ceive.validation
 */

namespace Ceive\Validation;

/**
 * @Interface {Ceive.validation.RuleReader}
 *
 * Отвечает за представление информации по ошибкам, для различных видов правил.
 * Входит в состав работы Вердикта.
 *
 * Rule Reader: будет знать как отобразить пользователю ошибки или правила
 * он конвертирует метаданные правил в понятные сообщения.
 * @TODO: Разделить на общий читальщик и частный(относящийся к конкретному правилу)
 * общий читальщик будет проверять по типу правила, и чаще выступит в роли аггрегатора частных.
 *
 * @Author: Alexey Kutuzov <lexus27.khv@gmail.com>
 * Class RuleReader
 * @package Ceive\Validation
 */
interface RuleReader{
	
	/**
	 * @param Rule $rule
	 * @return string|false
	 */
	public function getErrorMsg(Rule $rule);
	
	/**
	 * @param Rule $rule
	 * @return string|false
	 */
	public function getInfoMsg(Rule $rule);
	
}


