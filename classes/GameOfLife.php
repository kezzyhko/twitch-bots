<?php

require_once 'bot.php';
class GameOfLife extends Bot {
	public function handle($channel, $sender, $text) {
		parent::handle(...func_get_args());
		if ($sender === $this->nick) return;
		
		//$this->log(var_dump($sender, $text));
		if ($sender === "kezzyhko" && trim($text) === "start")
		{
			//$this->send_data("PRIVMSG #$channel :@$sender : $text");
			for ($i = -50; $i < 50; $i += 3)
			{
				for ($j = -50; $j < 35; $j += 25)
				{
					$data = "!on " .
							($i + 0) . "," . $j . " " .
							($i + 0) . "," . ($j + 1) . " " .
							($i + 0) . "," . ($j + 3) . " " .
							($i + 0) . "," . ($j + 4) . " " .
							($i + 0) . "," . ($j + 6) . " " .
							($i + 0) . "," . ($j + 7) . " " .
							($i + 0) . "," . ($j + 9) . " " .
							($i + 0) . "," . ($j + 10) . " " .
							($i + 0) . "," . ($j + 12) . " " .
							($i + 0) . "," . ($j + 13) . " " .
							($i + 0) . "," . ($j + 15) . " " .
							($i + 0) . "," . ($j + 16) . " " .
							($i + 0) . "," . ($j + 18) . " " .
							($i + 0) . "," . ($j + 19) . " " .
							($i + 0) . "," . ($j + 21) . " " .
							($i + 0) . "," . ($j + 22) . " " .
							($i + 1) . "," . $j . " " .
							($i + 1) . "," . ($j + 1) . " " .
							($i + 1) . "," . ($j + 3) . " " .
							($i + 1) . "," . ($j + 4) . " " .
							($i + 1) . "," . ($j + 6) . " " .
							($i + 1) . "," . ($j + 7) . " " .
							($i + 1) . "," . ($j + 9) . " " .
							($i + 1) . "," . ($j + 10) . " " .
							($i + 1) . "," . ($j + 12) . " " .
							($i + 1) . "," . ($j + 13) . " " .
							($i + 1) . "," . ($j + 15) . " " .
							($i + 1) . "," . ($j + 16) . " " .
							($i + 1) . "," . ($j + 18) . " " .
							($i + 1) . "," . ($j + 19) . " " .
							($i + 1) . "," . ($j + 21) . " " .
							($i + 1) . "," . ($j + 22);
					$this->send_data("PRIVMSG #$channel :$data");
					sleep(5);
				}
			}
		}

	}
}