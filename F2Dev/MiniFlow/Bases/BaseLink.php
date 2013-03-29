<?php

namespace F2Dev\MiniFlow\Bases;

use F2Dev\MiniFlow\Interfaces\LinkInterface as LinkInterface;
use F2Dev\MiniFlow\Interfaces\NodeInterface as NodeInterface;

abstract class BaseLink implements LinkInterface
{
	/**
	 * Constructor for the Link.
	 * Should store the Parent Node, and any given Child Nodes.
	 *
	 * @var NodeInterface parentNode The Node Parent of this Link.
	 * @var Array childrenNodes An array of Child Nodes. If not present, store an empty array.
	 * @return LinkInterface Return the constructed Link Object.
	 */
	public function __construct(NodeInterface $parentNode, array $childrenNodes = array())
	{
		$this->parentNode = $parentNode;
		$parentNode->setChild($this);
		$this->childrenNodes = $childrenNodes;
		return $this;
	}
	
	/**
	 * If it is necessary to reassign this Link to another parent Node, this function provides
	 * that capability.
	 *
	 * @var NodeInterface parentNode The new parent Node.
	 * @return NodeInterface oldParentNode This function returns the old Node parent, if pop functionality is required.
	 */
	public function setParent(NodeInterface $parentNode)
	{
		$oldParent = $this->parentNode;
		$this->parentNode = $parentNode;
		return $oldParent;
	}
	
	/**
	 * Returns the Parent Node Object which leads to this Link.
	 *
	 * @return NodeInterface The Node object which is the Parent of this Link.
	 */
	public function getParent()
	{
		return $this->parentNode;
	}
	
	/**
	 * Appends a given Child Node to the array of Children Nodes for this Link.
	 *
	 * @var NodeInterface newChildNode The Node to add.
	 * @return Array Returns the array of Children Nodes
	 */
	public function addChild(NodeInterface $newChildNode)
	{
		if (count($this->childrenNodes)>0)
		{
			$this->childrenNodes[] = $newChildNode;
		}
		else
		{
			$this->childrenNodes = array($newChildNode);
		}
		return $this->childrenNodes;
	}
	
	/**
	 * Searches through the Children Nodes of this Link, searching for the given Node.
	 * If found, returns True, else, returns False.
	 *
	 * @var NodeInterface childNode The Node which should be removed.
	 * @return Bool Returns the True if Node removed, False otherwise.
	 */
	public function removeChild(NodeInterface $childNode)
	{
		foreach($this->childrenNodes as $index => $child)
		{
			if ($childNode === $child)
			{
				unset($this->childrenNodes[$index]);
				return true;
			}
		}
		return false;
	}
	
	/**
	 * Returns the array of Children Nodes for this Link.
	 *
	 * @return Array An array of Children Nodes.
	 */
	public function getChildren()
	{
		return $this->childrenNodes;
	}
}