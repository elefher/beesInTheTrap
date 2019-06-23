<?php
require 'vendor/autoload.php';

echo "Bees In The Trap Game!\n\n";
echo "Suddenly, you see a fire in your crops. You are running fast to put out the fire immediately.\n";
echo "At the time you arrive in your crops you see a horde of angry bees coming up to you.\n";
echo "You need to kill the bees at first in order to save your crops from the fire. RUN!\n\n";
echo "USAGE:\n";
echo "Type 'hit' when it's your turn to attack on a bee:\n";
echo "Start!\n";


$hive = \Bees\Factory\HiveFactory::createHive();
$player = new \Bees\Entity\Character\Player();

// Create a middleware scene which id going to take place all the action
$crop = new \Bees\Crop($player, $hive);

// Initialize the input from the command line
$cli = fopen("php://stdin", "r");

// Start the game and run until it is game over
while (!$crop->isGameOver()){
    // Awaiting for the user's input
    echo "-> " . $player->name() . " turn: ";
    $input = trim(fgets($cli));

    // Run the scene
    $crop->runScene($input);
}

