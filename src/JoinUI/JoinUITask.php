<?php

namespace JoinUI;

use JoinUI\Main;
use pocketmine\Player;
use pocketmine\plugin\Plugin;
use pocketmine\scheduler\Task;
use pocketmine\utils\TextFormat;
use jojoe77777\FormAPI;

class JoinUITask extends PluginTask{

    private $plugin;
    private $player;

    public function __construct(Main $plugin, Player $player){
        parent::__construct($plugin);
        $this->plugin = $plugin;
        $this->player = $player;
    }

    public function onRun(int $currentTick){
        $player = $this->player;
        $this->mainForm($player);
    }

    public function mainForm($player) {
        $content = $this->plugin->getConfig()->get("Content");
        $button = $this->plugin->getConfig()->get("Button");
        $title = $this->plugin->getConfig()->get("Title");
        $form = $this->plugin->getServer()->getPluginManager()->getPlugin("FormAPI")->createSimpleForm(function (Player $player, array $data){
            if (isset($data[0])) {
                switch ($data[0]) {
                    case 0:
                }
                return true;
            }
            return false;
        });
        $form->setTitle("§aWelcome to §6Void§bMiner§cPE §dNetwork!, §3" . $player->getName());
        $form->addButton("§aPlease select a server to join!");
        $form->addButton("§bWant to play? §cPlay now!");
        $form->sendToPlayer($player);
    }
}
