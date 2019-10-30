<?php
/**
 * @created Alexey Kutuzov <lexus27.khv@gmail.com>
 * @Project: ceive.validation
 */
$validator = [
	
	'id' => [[
		'type' => 'Minimum',
		'value' => 1
	],[
		'type' => 'PresenceOf',
		'value' => [null,'',[]]
	]],
	'title' => [[
		'type' => 'minimum mb length',
		'value' => 10
	],[
		'type' => 'string no have',
		'value' => ['$','#','@','^','/','\\']
	]],
];