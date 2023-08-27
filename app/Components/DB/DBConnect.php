<?php

namespace App\Components\DB;

use PDO;
use PDOException;

class DBConnect
{

    private string $host = DB_HOST;
    private ?string $username = DB_USERNAME;
    private ?string $password = DB_PASSWORD;
    private ?string $database = DB_NAME;
    private PDO $db;

    public function __construct(string $host = null, string $username = null, string $password = null, string $database = null)
    {
        if ($host != null) {
            $this->host = $host;
            $this->username = $username;
            $this->password = $password;
            $this->database = $database;
        }

        try {
            $this->db = new PDO('pgsql:host=' . $this->host . ';dbname=' . $this->database, $this->username, $this->password, array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ));
        } catch (PDOException $e) {
            die('<h1>Impossible de se connecter a la base de donnee</h1>');
        }


    }

    /**
     * @param string $sql
     * @param array $data
     * @return array|false
     */
    public function query(string $sql, array $data = array()): bool|array
    {
        $req = $this->db->prepare($sql);
        $req->execute($data);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @param string $sql
     * @param array $data
     * @return bool
     */
    public function queryBuild(string $sql, array $data = array()): bool
    {
        $req = $this->db->prepare($sql);
        return $req->execute($data);
    }

    /**
     * @return PDO
     */
    public function getPDO(): PDO
    {
        return $this->db;
    }
}