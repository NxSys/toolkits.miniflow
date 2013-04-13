<?php

namespace F2Dev\MiniFlow\Bases;

use F2Dev\MiniFlow\Interfaces as Interfaces;

abstract class BaseFactory implements Interfaces\FactoryInterface
{
	/**
	 * A function wherein the user defines the workflow, if desired, and returns it.
	 *
	 * @return MiniFlow The instantiated MiniFlow.
	 **/
	abstract public function getWorkflow();
	
	/**
	 * Unpack and prepare a serialized workflow to be returned.
	 *
	 * @var string $sWorkflow The serialized workflow to use.
	 * @return MiniFlow The instantiated MiniFlow.
	 */
	static function useSerializedWorkflow($sWorkflow)
	{
		return(unserialize($sWorkflow));
	}
}

