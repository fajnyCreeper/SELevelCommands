<?php
/*
This is interface used to communicate with chat using customapi commands
query params: key - $key from config.php
              pattern - id, that will be used to identify patterns in database
              level - user level from SE variable ${sender.level}
*/

require_once("StreamElements.php");
require_once("config.php");
require_once("db.php");
require_once("variable.php");

header("Content-Type: text/plain; charset=utf-8");

if (isset($_GET["key"], $_GET["pattern"], $_GET["level"]))
{
  $patternId = $_GET["pattern"];
  $level = (int)$_GET["level"];
  if ($_GET["key"] == $key)
  {
    //Initialize DB
    $db = new DatabaseConnector($db["host"], $db["username"], $db["password"], $db["database"], $db["table"]);
    //Get pattern
    $pattern = $db->getPattern($patternId);

    //Initialize SE bot
    $bot = new StreamElements($bearer, "Bearer");
    if (empty($pattern))
    {
      //If pattern DOES NOT exist send "Pattern Not Found" message
      $bot->botSay("Pattern \"$patternId\" not found");
    }
    else
    {
      if (isset($_GET["params"]))
      {
        foreach ($pattern as $key => $value)
        {
          if ($key != "pattern")
          {
            $pattern[$key] = SetVariables($value, $_GET["params"]);
          }
        }
      }
      if ($level >= 1500 && !empty($pattern["1500"])) //User level 1500 (broadcaster)
      {
        $bot->botSay($pattern["1500"]);
      }
      else if ($level >= 1000 && !empty($pattern["1000"])) //User level 1000 (supermoderator)
      {
        $bot->botSay($pattern["1000"]);
      }
      else if ($level >= 500 && !empty($pattern["500"])) //User level 500 (moderator)
      {
        $bot->botSay($pattern["500"]);
      }
      else if ($level >= 400 && !empty($pattern["400"]))//User level 400 (vip)
      {
        $bot->botSay($pattern["400"]);
      }
      else if ($level >= 300 && !empty($pattern["300"])) //User level 300 (regular)
      {
        $bot->botSay($pattern["300"]);
      }
      else if ($level >= 250 && !empty($pattern["250"])) //User level 250 (subscriber)
      {
        $bot->botSay($pattern["250"]);
      }
      else if (!empty($pattern["100"])) //User level 100 (everyone)
      {
        $bot->botSay($pattern["100"]);
      }
    }
  }
}
