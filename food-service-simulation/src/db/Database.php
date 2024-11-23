<?php

class Database
{
  private $host;
  private $dbname;
  private $username;
  private $password;
  private $db;

  public function __construct()
  {
    $this->host = 'mysql'; // MySQLコンテナのサービス名
    $this->dbname = getenv('MYSQL_DATABASE');
    $this->username = 'root';
    $this->password = getenv('MYSQL_ROOT_PASSWORD');
    $this->connect();
  }

  private function connect()
  {
    try {
      $this->db = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8", $this->username, $this->password);
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo 'Connection failed: ' . $e->getMessage();
    }
  }

  public function query($sql)
  {
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
