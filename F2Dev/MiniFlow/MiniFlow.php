<?php

namespace F2Dev\MiniFlow;

use F2Dev\MiniFlow\Interfaces\NodeInterface as NodeInterface;
use F2Dev\MiniFlow\Interfaces\LinkInterface as LinkInterface;

class MiniFlow
{
	public function __construct($sFlowName, NodeInterface $nStartNode, $aFlowEnv = array())
	{
		$this->sFlowName = $sFlowName;
		$this->nStartNode = $nStartNode;
		$this->nCurrentNode = $nStartNode;
		$this->aFlowEnv = $aFlowEnv;
	}
	
	public function execute()
	{
		//Execute the current Node, passing through the Flow Data Environment Array.
		$this->aFlowEnv = $this->nCurrentNode->execute($this->aFlowEnv);
		//Check if this Node has a Child Link.
		if ($this->nCurrentNode->getChild() != False)
		{
			//If so, run its determinator using the FDEA, and set a new current Node.
			$this->nCurrentNode = $this->nCurrentNode->getChild()->determine($this->aFlowEnv);
			//Finally, recurse through Execute again, passing back up the end return containing...
			return $this->execute();
		}
		//...The FDEA, for analysis, logging, or whatever.
		return $this->aFlowEnv;
	}
}