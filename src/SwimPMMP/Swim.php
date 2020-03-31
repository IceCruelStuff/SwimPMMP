<?php

namespace SwimPMMP;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\entity\Entity;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\item\Item;
use pocketmine\block\Block;
use pocketmine\block\Water;

class Swim extends PluginBase implements Listener {

	public function onEnable(){
		$this->getLogger()->info("SwimPMMP Enabled");
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	public function onMove(PlayerMoveEvent $event){
		$player = $event->getPlayer();
		$block = $player->getLevel()->getBlock($player->subtract(0, -1 , 0));
		if ($block->getId() === Item::WATER) {
			$player->setDataFlag(Entity::DATA_FLAGS, Entity::DATA_FLAG_SWIMMING, true);
		} else {
			$player->setDataFlag(Entity::DATA_FLAGS, Entity::DATA_FLAG_SWIMMING, false);
		}
	}

	public function onDisable(){
		$this->getLogger()->info("SwimPMMP Disabled");
	}
}
