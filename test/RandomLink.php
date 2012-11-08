<?php

namespace MiniFlow\Test;

require_once '../interfaces/bases/baselink.php';
require_once '../interfaces/bases/basenode.php';

use MiniFlow;

class RandomLink extends MiniFlow\Bases\BaseLink
{
	/**
	 * Chooses a random Node from the children.
	 *
	 * @var Array arguments An associative array of arguments needed to run this Node.
	 * @return NodeInterface The Node which should be Executed next.
	 */
	public function determine(array $arguments = array())
	{
		return $this->childrenNodes[rand(0, count($this->childrenNodes)-1)];
	}
}