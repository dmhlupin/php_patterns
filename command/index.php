<?php

spl_autoload_register(function ($class) 
{
    include $class.'.php';
});


$app = new Application("фывфывф|");

echo $app->activeEditor->text . PHP_EOL;
$app->executeCommand(new CopyCommand($app, $app->activeEditor));
$app->executeCommand(new PasteCommand($app, $app->activeEditor));
echo $app->activeEditor->text . PHP_EOL;
echo "История: " . count($app->history) . "\n";
$app->executeCommand(new PasteCommand($app, $app->activeEditor));
echo $app->activeEditor->text . PHP_EOL;
echo "История: " . count($app->history) . "\n";
$app->executeCommand(new PasteCommand($app, $app->activeEditor));
echo $app->activeEditor->text . PHP_EOL;
echo "История: " . count($app->history) . "\n";

$app->executeCommand(new PasteCommand($app, $app->activeEditor));
echo $app->activeEditor->text . PHP_EOL;
echo "История: " . count($app->history) . "\n";

$app->executeCommand(new UndoCommand($app, $app->activeEditor));
echo $app->activeEditor->text . PHP_EOL;
echo "История: " . count($app->history) . "\n";

$app->executeCommand(new UndoCommand($app, $app->activeEditor));
echo $app->activeEditor->text . PHP_EOL;
echo "История: " . count($app->history) . "\n";








