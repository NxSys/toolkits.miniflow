<?php

namespace MiniFlow\Test;

require_once __dir__.'/../interfaces/bases/baselink.php';
require_once __dir__.'/../interfaces/bases/basenode.php';

use MiniFlow;

class HelloNode extends MiniFlow\Bases\BaseNode
{
	/**
	 * Hello Flow World!
	 *
	 * @var Array arguments An associative array of arguments needed to run this Node.
	 * @return Array An associative array which contains the output of this Node.
	 */
	public function execute(array $arguments = array())
	{
		echo "Hello World!\n";
		return $arguments;
	}
}