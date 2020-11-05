<?php

require_once 'bot.php';
class Repeater extends Bot {
	public function handle($channel, $sender, $text) {
		parent::handle(...func_get_args());
		if ($sender === $this->nick) return;
		$this->send_data("PRIVMSG #$channel :@$sender : $text");
	}
}