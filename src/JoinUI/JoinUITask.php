<?php

namespace JoinUI;

use JoinUI\Main;
use pocketmine\Player;
use pocketmine\plugin\Plugin;
use pocketmine\scheduler\PluginTask;
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
        $form->setTitle("§7Welcome, §e" . $player->getName());
        $form->addButton($button);
        $form->sendToPlayer($player);
    }
}
