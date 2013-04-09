<?php

namespace F2Dev\MiniFlow\Test;

require_once __dir__."/../Vendors/ClassLoader/UniversalClassLoader.php";

use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();
$loader->registerNamespace('F2Dev\MiniFlow', __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..');
$loader->register(true);

use F2Dev\MiniFlow as MiniFlow;
use F2Dev\MiniFlow\Test as Test;

$startNode = new Test\HelloNode();

$linkS = new Test\RandomLink($startNode);

$nodeS1 = new Test\HelloNode($linkS);
$nodeS2 = new Test\HelloNode($linkS);
$nodeS3 = new Test\HelloNode($linkS);

$linkS2 = new Test\RandomLink($nodeS2);

$nodeS21 = new Test\HelloNode($linkS2);

$nodeS3->setChild($linkS);

$testFlow = new MiniFlow\MiniFlow("Test Flow", $startNode, array("Message" => "World"));


$testFlow->execute();
