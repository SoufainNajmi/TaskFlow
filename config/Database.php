<?php
class Database {
    private static $connexion = null;

    public static function getConnexion() {
        if (self::$connexion === null) {
            try {
                self::$connexion = new PDO(
                    "mysql:host=localhost;dbname=Taskflow;charset=utf8",
                    "root",
                    ""
                );
                self::$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erreur DB : " . $e->getMessage());
            }
        }
        return self::$connexion;
    }
}
?>