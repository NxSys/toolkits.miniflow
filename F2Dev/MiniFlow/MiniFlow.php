<?php

namespace F2Dev\MiniFlow;

use F2Dev\MiniFlow\Interfaces as Interfaces;

class MiniFlow implements Interfaces\ExecutableInterface
{
	public function __construct($sFlowName, Interfaces\NodeInterface $nStartNode)
	{
		$this->sFlowName = $sFlowName;
		$this->nStartNode = $nStartNode;
		$this->nCurrentNode = $nStartNode;
		$this->childLink = NULL;
		$this->parentLink = NULL;
	}
	
	public function execute(array $arguments = array())
	{
		if ($arguments != array())
		{
			$aFlowEnv = $arguments;
		}
		else
		{
			$aFlowEnv = $this->aFlowEnv;
		}
		
		if ($this->nCurrentNode instanceof Interfaces\ExecutableInterface)
		{
			//Execute the current Node, passing through the Flow Data Environment Array.
			$aFlowEnv = $this->nCurrentNode->execute($aFlowEnv);
			//Check if this Node has a Child Link.
			if ($this->nCurrentNode->getChild() != False)
			{
				//If so, run its determinator using the FDEA, and set a new current Node.
				$this->nCurrentNode = $this->nCurrentNode->getChild()->determine($aFlowEnv);
				//Finally, recurse through Execute again, passing back up the end return containing...
				return $this->execute($aFlowEnv);
			}
		}
		//...The FDEA, for analysis, logging, or whatever.
		return $aFlowEnv;
	}
	
	/**
	 * If it is necessary to reassign this Node to another parent Link, this function provides
	 * that capability.
	 *
	 * @var LinkInterface parentLink The new parent Link.
	 * @return LinkInterface oldParentLink This function returns the old Link parent, if pop functionality is required.
	 */
	public function setParent(Interfaces\LinkInterface $parentLink)
	{
		$oldParent = $this->parentLink;
		$this->parentLink = $parentLink;
		$this->parentLink->addChild($this);
		return $oldParent;
	}
	
	/**
	 * Returns the Parent Link Object which leads to this Node.
	 *
	 * @return LinkInterface The Link object which is the Parent of this Node.
	 */
	public function getParent()
	{
		return $this->parentLink;
	}
	
	/**
	 * Sets the Link child to which this Node leads.
	 *
	 * @var LinkInterface childLink The child link which is to be set.
	 * @return Varies Returns NULL if no Child was previously set, otherwise returns the old Child.
	 */
	public function setChild(Interfaces\LinkInterface $childLink)
	{
		$oldChild = $this->childLink;
		$this->childLink = $childLink;
		$this->childLink->addParent($this);
		return $oldChild;
	}
	
	/**
	 * Returns the Link child of this Node.
	 *
	 * @return Mixed The child Link object, if it exists, False otherwise.
	 */
	public function getChild()
	{
		return $this->childLink;
	}
	
	
}