<?php

namespace F2Dev\MiniFlow\Interfaces;

use F2Dev\MiniFlow as MiniFlow;

interface FactoryInterface
{
	/**
	 * A function wherein the user defines the workflow, if desired, and returns it.
	 *
	 * @return MiniFlow The instantiated MiniFlow.
	 **/
	public function getWorkflow();
	
	/**
	 * Unpack and prepare a serialized workflow to be returned.
	 *
	 * @var string $sWorkflow The serialized workflow to use.
	 * @return MiniFlow The instantiated MiniFlow.
	 */
	static function useSerializedWorkflow($sWorkflow);
}