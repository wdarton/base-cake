<?php
namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\Event\Event;
use Cake\ORM\Entity;
use ArrayObject;

class BooleanBehavior extends Behavior
{
	protected $_defaultConfig = [
		'booleans' => ['active'],
	];

	public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
	{
		$config = $this->config();

		foreach ($config['booleans'] as $boolean) {
			if (!isset($data[$boolean])) {
				$data[$boolean] = false;
			}
		}
	}
}