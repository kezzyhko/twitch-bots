<?php

require_once 'bot.php';
class Ruiner extends Bot {
	private $to_post = ['LUL'=>0, 'NotLikeThis'=>0, 'SMOrc'=>0, 'DansGame'=>0, '4Head'=>0, 'PogChamp'=>0, /*'ResidentSleeper'=>0, */'FailFish'=>0, 'Kappa'=>0, 'Keepo'=>0, 'BibleThump'=>0, 'Kreygasm'=>0, 'BrokeBack'=>0, 'PunOko'=>0, 'WutFace'=>0, 'Squid1 Squid2 Squid3 Squid2 Squid4'=>0, 'MrDestructoid' => 0, 'TheIlluminati' => 0, 'SeriousSloth' => 0];
	private const to_ruin = ['lupo1', 'lupo2', 'forsen1', 'forsen2', 'melW1', 'melW2', 'roflanE', 'roflanB', 'poke1', 'poke2', 'rescVV1', 'rescVV2', 'guit00', 'guit1', 'guit2', 'guit12', 'guit13', 'guit14', 'guit15', 'guit21', 'guit22', 'guit23', 'guit24', 'guit25', 'guit31', 'guit32', 'guit33', 'guit34', 'guit35', 'guit41', 'guit42', 'guit43', 'guit44', 'guit45', 'tsosA1', 'tsosA2', 'tsosD1', 'tsosD2', 'tsosH1', 'tsosH2', 'tsosM1', 'tsosM2', 'tsosOL1', 'tsosOL2', 'tsosZ1', 'tsosZ2'];
	//private const not_to_ruin = ['lupo3', 'lupo4', 'forsen3', 'forsen4', 'melW3', 'melW4', 'roflanA', 'roflanLo', 'poke3', 'poke4', 'rescVV3', 'rescVV4', 'guit01', 'guit3', 'guit4', 'guit51', 'guit52', 'guit53', 'guit54', 'guit55', 'tsosA3', 'tsosA4', 'tsosD3', 'tsosD4', 'tsosH3', 'tsosH4', 'tsosM3', 'tsosM4', 'tsosOL3', 'tsosOL4', 'tsosZ3', 'tsosZ4'];

	public function handle($channel, $sender, $text) {
		parent::handle(...func_get_args());
		if (array_intersect(explode(' ', $text), self::to_ruin) /* && !array_intersect(explode(' ', $text), self::not_to_ruin)*/) {
				$emote = array_rand(array_filter($this->to_post, function($lastsend){return $lastsend==0 || time()-$lastsend>30;}) ?: [NULL => NULL]);
				if ($emote !== NULL) {
					$this->to_post[$emote] = time();
				}
				$this->send_data("PRIVMSG #$channel :" . ($emote ?? 'Too fast BrokeBack HSWP NotLikeThis'/**/));
		}
	}
}