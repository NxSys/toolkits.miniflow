<?php

namespace MiniFlow;

use MiniFlow\Interfaces\NodeInterface as NodeInterface;
use MiniFlow\Interfaces\LinkInterface as LinkInterface;

class MiniFlow
{
	public function __construct($sFlowName, NodeInterface $nStartNode)
	{
		$self->sFlowName = $sFlowName;
		$self->nStartNode = $nStartNode;
		$self->nCurrentNode = $nStartNode;
		$self->aFlowEnv = array();
	}
	
	public function execute()
	{
		//Execute the current Node, passing through the Flow Data Environment Array.
		$self->aFlowEnv = $self->nCurrentNode->execute($self->aFlowEnv);
		//Check if this Node has a Child Link.
		if ($self->nCurrentNode->getChild() != False)
		{
			//If so, run its determinator using the FDEA, and set a new current Node.
			$self->nCurrentNode = $self->nCurrentNode->getChild()->determine($self->aFlowEnv);
			//Finally, recurse through Execute again, passing back up the end return containing...
			return $self->execute();
		}
		//...The FDEA, for analysis, logging, or whatever.
		return $self->aFlowEnv;
	}
}