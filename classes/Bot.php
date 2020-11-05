<?php

abstract class Bot {
	public const order = ['server', 'port', 'nick', 'token', 'channels', 'admins'];

	protected $socket;
	protected $timeout = 0;
	protected $nick = '';
	public $admins = [];

	public function __construct($server, $port, $nick, $token, $channels, $admins) {
		$this->socket = fsockopen($server, $port);

		$this->send_data("PASS oauth:$token");
		$this->send_data("NICK $nick");
		$this->channels($channels, true);
		$this->admins = $admins;
		$this->nick = $nick;

		$this->main();
	}
	public function send_data($data) {
		fputs($this->socket, "$data\r\n");
		$this->log("<b>&lt;</b> $data<br>");
	}
	public function log($log) {
		echo $log;
		flush();
	}
	public function channels($channels, $join) {
		foreach ((array)$channels as $chan) {
			$this->send_data(($join ? 'JOIN' : 'PART') . ' #' . strtolower($chan));
			//TODO: add follow
		}
	}
	public function main() {
		$this->log('start<br>');
		while (true) {
			$data = fgets($this->socket);
			if (!$data) continue;
			$this->log('<b>&gt;</b> ' . nl2br($data));
			$data = str_replace(["\r", "\n"], ' ', $data);
			$data = explode(' ', $data, 4);
			if ($data[0] === 'PING') {
				$this->send_data("PONG {$data[1]}");
			}
			elseif ($data[1] === 'NOTICE' || false) {
				break;
			}
			elseif ($data[1] === 'PRIVMSG') {	
				$this->handle(substr($data[2], 1), substr(strstr($data[0], '!', true), 1), substr($data[3], 1));
			}
		}
		$this->log('stop');
	}
	public function handle($channel, $sender, $text) {
		if ($text[0] !== '!') return;
		$text = explode(' ', substr($text, 1), 2);
		$cmd = $text[0]; $args = $text[1];

		switch (true) {
			case in_array($sender, $this->admins, true):
				//admin's commands
				switch($cmd) {
					case '':
					break;
				}
			case $sender === $channel:
				//streamer's commands
				switch($cmd) {
					case '':
					break;
				}
			default:
				//everyone's commands
				switch($cmd) {
					case '':
					break;
				}
		}
	}
}