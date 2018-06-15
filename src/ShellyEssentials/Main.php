<?php

declare(strict_types=1);

namespace ShellyEssentials;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use ShellyEssentials\commands\ClearInventoryCommand;
use ShellyEssentials\commands\FeedCommand;
use ShellyEssentials\commands\FlyCommand;
use ShellyEssentials\commands\FreezeCommand;
use ShellyEssentials\commands\GamemodeCreativeCommand;
use ShellyEssentials\commands\GamemodeSpectatorCommand;
use ShellyEssentials\commands\GamemodeSurvivalCommand;
use ShellyEssentials\commands\HealCommand;
use ShellyEssentials\commands\MuteCommand;
use ShellyEssentials\commands\NickCommand;
use ShellyEssentials\commands\WildCommand;

class Main extends PluginBase{

	public const PREFIX = TextFormat::DARK_PURPLE . TextFormat::BOLD . "ShellyEssentials > " . TextFormat::RESET;

	/** @var self $instance */
	private static $instance;

	public function onEnable() : void{
		self::$instance = $this;
		$this->getServer()->getCommandMap()->registerAll("ShellyEssentials", [
			new ClearInventoryCommand($this),
			new FeedCommand($this),
			new FlyCommand($this),
			new FreezeCommand($this),
			new GamemodeCreativeCommand($this),
			new GamemodeSpectatorCommand($this),
			new GamemodeSurvivalCommand($this),
			new HealCommand($this),
			new MuteCommand($this),
			new WildCommand($this),
			new NickCommand($this)
		]);
		$this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
	}

	public static function getInstance() : self{
		return self::$instance;
	}
}