<?php

namespace TheDiamondYT\DeathView;

use pocketmine\scheduler\PluginTask;
use pocketmine\player\Player;

class SpectateTask extends PluginTask {
	/** @var Player */
	private $player;

	public function __construct(Main $plugin, Player $player) {
		parent::__construct($plugin);
		$this->player = $player;
	}

	public function onRun($currentTick) {
		$config = $this->getOwner()->getConfig()->getAll();
        
		$this->player->setGamemode(Player::SURVIVAL);
        
		if($config["teleport-to-spawn"]) {
			$this->player->teleport($this->owner->getServer()->getDefaultWorld()->getSafeSpawn());
		} 
		if($config["teleport"]) {
			$this->player->teleport($config["teleport-to"]["x"], $config["teleport-to"]["y"], $config["teleport-to"]["z"]);
		}
	}
}

