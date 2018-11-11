<?php

namespace JoinUI;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use JoinUI\JoinUITask;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener{

  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->getLogger()->info("§aPlugin enabled by georgianYT");
     $this->config();
     }   

    public function onDisable(){
     $this->getLogger()->info("§cPlugin disabled by georgianYT.");
    }

    public function config(){
        @mkdir($this->getDataFolder());
        $this->saveResource("config.yml");
        $this->cfg = new Config($this->getDataFolder() . "config.yml", Config::YAML);
    }

    public function onJoin(PlayerJoinEvent $event){
        $player = $event->getPlayer();
        $this->getScheduler()->scheduleDelayedTask(new JoinUITask($this, $player), 130);
    }
}
