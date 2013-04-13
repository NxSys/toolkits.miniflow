<?php

namespace F2Dev\MiniFlow\Test;

require_once __dir__."/../Vendors/ClassLoader/UniversalClassLoader.php";

use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();
$loader->registerNamespace('F2Dev\MiniFlow', __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..');
$loader->register(true);

use F2Dev\MiniFlow as MiniFlow;
use F2Dev\MiniFlow\Test as Test;

$testFactory = new Test\TestFlow();
$testFlow1 = $testFactory->getWorkflow();


$startNode = new Test\HelloNode();

$linkS = new Test\RandomLink($startNode);

$linkS->addChild($testFlow1);

$newLink = new Test\RandomLink($testFlow1);

$newNode = new Test\HelloNode($newLink);

$testFlow2 = new MiniFlow\MiniFlow("Test Flow", $startNode);

MiniFlow\Bases\BaseFactory::useSerializedWorkflow(serialize($testFlow2))->execute(array("Message" => "World"));



