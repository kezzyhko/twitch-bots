# twitch-bots
Small collection of IRC bots for twitch written in PHP



## Config files

* [`bots.ini`](/bots.ini) - 
This file defined bots. Each bot can have the following properties:
    * `class` - Which class to use. See [Classes](#classes) below.
    * `nick` - Nickname of bot on twitch.
    * `channels` - An array of chats to monitor for messages.
    * `admins` - An array of accounts that are is considered to be an admin for this bot.
    * `server` and `port` - it might change, see Twitch's documentation/FAQ.

* [`config.ini`](/config.ini) - 
Has three parts:
    * `bot` - Which bot from `/bots.ini` config to start?
    * `default` - This settings will be merged into bot's settings, if they were not defined there. For appending arrays, use `global`
    * `global` - This will append arrays to bot settings' arrays. For example, you might indicate who will be admin for all bots.
    
* `accounts.ini` - 
A file with bots' nicknames and their tokens. To get token, see Twitch's documentation/FAQ. For example, this file might look like this:
```
BotRuiner = qdcn9nba0okbtj38grpmwmzhzurxxp
kezzyhkoBot = hhso5visofdw32dbncmwuwh9yqp13m
```
Of course, this is not real tokens :)



## Classes

* [`Bot.php`](/classes/Bot.php) - 
General abstract class.
Easily extendible to add your own commands.

* [`Repeater.php`](/classes/Repeater.php) - 
Just repeats all messages.
Convenient for testing.

* [`Ruiner.php`](/classes/Ruiner.php) - 
Detects certain multi-message (composite) emoticons of certain clannels and ruins them by sending a message in between those messages.

* [`GameOfLife.php`](/classes/GameOfLife.php) - 
This bot was written for one channel, that hosted GameOfLife on twitch.
It just filled all the field with repeating pattern.
Here is how it worked:
    * https://www.youtube.com/watch?v=LuxFcRcfqrQ
    * https://www.youtube.com/watch?v=-vrIkPixR1Q
