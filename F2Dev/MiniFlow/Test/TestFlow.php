<?php

namespace F2Dev\MiniFlow\Test;

require_once __dir__.'/../MiniFlow.php';

require_once __dir__."/../Vendors/ClassLoader/UniversalClassLoader.php";

use F2Dev\MiniFlow as MiniFlow;
use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();
$loader->registerNamespace('F2Dev\MiniFlow', __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..');
$loader->register(true);

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
