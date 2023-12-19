<?php

class db {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "dataware2_oop";
    private $connexion;

    public function __construct() {
        try {
            $this->connexion = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function connect() {
        return $this->connexion;
    }

    // public function close() {
    //     if ($this->connexion) {
    //         mysqli_close($this->connexion);
    //     }
    // }

    // You can add more methods as needed for your application

}
