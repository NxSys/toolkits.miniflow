<?php

namespace MiniFlow\Interfaces;

require_once __dir__.'/nodeInterface.php';

use MiniFlow\Interfaces\LinkInterface as LinkInterface;

interface NodeInterface
{
	/**
	 * Sets up anything required by this Node at _instantiation_ (not execution).
	 * All Nodes in a Workflow are instantiated in linear order, regardless of when,
	 * or even if each Node will be executed. One thing that must be done is setting the parentLink member.
	 *
	 * @var LinkInterface parentLink Link object which leads to this Node.
	 * @var LinkInterface childLink An optional argument specifying the Child Link to which this Node leads. If present, it must be stored, if not, though, it can be safely ignored.
	 * @return NodeInterface The constructor should return the Node object upon exit.
	 */
	public function __construct(LinkInterface $parentLink = NULL, LinkInterface $childLink = NULL);
	
	/**
	 * If it is necessary to reassign this Node to another parent Link, this function provides
	 * that capability.
	 *
	 * @var LinkInterface parentLink The new parent Link.
	 * @return LinkInterface oldParentLink This function returns the old Link parent, if pop functionality is required.
	 */
	public function setParent(LinkInterface $parentLink);
	
	/**
	 * Returns the Parent Link Object which leads to this Node.
	 *
	 * @return LinkInterface The Link object which is the Parent of this Node.
	 */
	public function getParent();
	
	/**
	 * Sets the Link child to which this Node leads.
	 *
	 * @var LinkInterface childLink The child link which is to be set.
	 * @return Varies Returns NULL if no Child was previously set, otherwise returns the old Child.
	 */
	public function setChild(LinkInterface $childLink);
	
	/**
	 * Returns the Link child of this Node.
	 *
	 * @return Mixed The child Link object, if it exists, False otherwise.
	 */
	public function getChild();
	
	/**
	 * Executes the main function of this Node.
	 * If arguments are required, they should be passed as an associative array.
	 *
	 * @var Array arguments An associative array of arguments needed to run this Node.
	 * @return Array An associative array which contains the output of this Node.
	 */
	public function execute(array $arguments = array());
}