<?php
function SetVariables($message, $params = array())
{
  for ($i = 1; $i <= count($params); $i++)
  {
    $message = preg_replace("/\\\$\\{" . $i . "\\}/", $params[$i - 1], $message);
  }
  return $message;
}
