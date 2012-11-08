<?php

namespace MiniFlow\Test;

require_once '../miniflow.php';
require_once '../interfaces/bases/baselink.php';
require_once '../interfaces/bases/basenode.php';
require_once 'HelloNode.php';
require_once 'RandomLink.php';

use MiniFlow;

$startNode = new MiniFlow\Test\HelloNode();
$link1 = new MiniFlow\Test\RandomLink($startNode);
$node2 = new MiniFlow\Test\HelloNode($link1);
$node3 = new MiniFlow\Test\HelloNode($link1);
$node4 = new MiniFlow\Test\HelloNode($link1);
$link2 = new MiniFlow\Test\RandomLink($node2);
$link3 = new MiniFlow\Test\RandomLink($node3);
$node4 = new MiniFlow\Test\HelloNode($link2);
$node5 = new MiniFlow\Test\HelloNode($link2);
$node6 = new MiniFlow\Test\HelloNode($link3);
$link4 = new MiniFlow\Test\RandomLink($node4);
$node7 = new MiniFlow\Test\HelloNode($link4);


$testFlow = new MiniFlow\MiniFlow("Test Flow", $startNode);

$testFlow->execute();
