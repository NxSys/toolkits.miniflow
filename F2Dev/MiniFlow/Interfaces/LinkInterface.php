<?php

namespace F2Dev\MiniFlow\Interfaces;

require_once __dir__.'/nodeInterface.php';

use F2Dev\MiniFlow\Interfaces\NodeInterface as NodeInterface;

interface LinkInterface
{
	/**
	 * Constructor for the Link.
	 * Should store the Parent Node, and any given Child Nodes.
	 *
	 * @var NodeInterface parentNode The Node Parent of this Link.
	 * @var Array childrenNodes An array of Child Nodes. If not present, store an empty array.
	 * @return LinkInterface Return the constructed Link Object.
	 */
	public function __construct(NodeInterface $parentNode, array $childrenNodes = array());
	
	/**
	 * If it is necessary to reassign this Link to another parent Node, this function provides
	 * that capability.
	 *
	 * @var NodeInterface parentNode The new parent Node.
	 * @return NodeInterface oldParentNode This function returns the old Node parent, if pop functionality is required.
	 */
	public function setParent(NodeInterface $parentNode);
	
	/**
	 * Returns the Parent Node Object which leads to this Link.
	 *
	 * @return NodeInterface The Node object which is the Parent of this Link.
	 */
	public function getParent();
	
	/**
	 * Appends a given Child Node to the array of Children Nodes for this Link.
	 *
	 * @var NodeInterface newChildNode The Node to add.
	 * @return Array Returns the array of Children Nodes
	 */
	public function addChild(NodeInterface $newChildNode);
	
	/**
	 * Searches through the Children Nodes of this Link, searching for the given Node.
	 * If found, returns True, else, returns False.
	 *
	 * @var NodeInterface childNode The Node which should be removed.
	 * @return Bool Returns the True if Node removed, False otherwise.
	 */
	public function removeChild(NodeInterface $childNode);
	
	/**
	 * Returns the array of Children Nodes for this Link.
	 *
	 * @return Array An array of Children Nodes.
	 */
	public function getChildren();
	
	/**
	 * Determines, based on individual Link logic, which of the children Nodes should be Executed next.
	 * 
	 * @var Array arguments An optional associative array of arguments to be used making the determination of the next Node.
	 * @return NodeInterface The Node which should be Executed next.
	 */
	public function determine(array $arguments = array());
}