<?php
class DatabaseConnector
{
  private $database;

  private $table;

  private $connection;

  public function __construct($host, $username, $password, $database, $table)
  {
    $this->database = $database;
    $this->table = $table;
    $this->connection = new mysqli($host, $username, $password, $database);
  }

  public function __destruct()
  {
    $this->connection->close();
  }

  //Get one specific pattern from database
  public function getPattern($patternId)
  {
    $sql = "SELECT * FROM `$this->database`.`$this->table` WHERE pattern='$patternId'";
    $result = $this->connection->query($sql);

    if ($result->num_rows == 0)
      return null;

    $result = $result->fetch_assoc();
    $array = array(
      "pattern" => $result["pattern"],
      "100" => $result["100"],
      "250" => $result["250"],
      "300" => $result["300"],
      "400" => $result["400"],
      "500" => $result["500"],
      "1000" => $result["1000"]
    );
    return $array;
  }
