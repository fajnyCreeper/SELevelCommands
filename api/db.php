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
