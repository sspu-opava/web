<?php
/**
 *  Třída Database
 *  Databázový wrapper, který zajišťuje základní funkce nutné pro připojení
 *  k databázi MySQL přes speciální třídu (ovladač) PDO  
 *
 */  
class Database {

    // privátní statický atribut $connection - 
    // slouží k uložení navázaného spojení s databází 
    private static $connection;

    // privátní statický atribut $configPDO, typ pole
    private static $configPDO = Array(
    // v prvním prvku pole je nastaven požadovaný způsob ošetření výjimek (chyb)
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    // druhý prvek pole obsahuje inicializační příkaz pro PDO 
    // dotaz SET NAMES obsahuje nastavení kódování výstupů z databáze    
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    );

    /**
     *  Veřejná statická metoda connect - připojení k databázi
     *  @ $host - adresa databázového serveru
     *  @ $user - uživatelské jméno pro přístup k DB serveru
     *  @ $password - přístupové heslo
     *  @ $database - název databáze               
     */              
    public static function connect($host, $user, $password, $database) {
        // identifikátor self umožňuje přístup ke statickému atributu třídy - $connection
        // funkce isset() zjistí, zda už spojení existuje,
        // když ne, bude navázáno   
        if (!isset(self::$connection)) {
            // do atributu $connection bude uložen odkaz na instanci objektu PDO 
            // konstruktoru budou předány 4 parametry 
            // 1. typ + název databáze, 2. uživatel, 3. heslo, 4. zvolená konfigurace PDO 
            try {
              self::$connection = @new PDO(
                  "mysql:host=$host;dbname=$database",
                  $user,
                  $password,
                  // opět použití statického atributu uvnitř třídy
                  self::$configPDO
              );
            }
            catch (PDOException $e) {
              echo "<p>Chyba připojení k DB serveru</p>";
              die($e->getMessage());
            }
        }
        // metoda vrací atribut $connection
        return self::$connection;
    }

    /**
     *  Veřejná statická metoda dotaz - předání dotazu databázi - výstup bude typu objekt
     *  @ $sql - SQL dotaz
     *  @ $parameters - předávané parametry dotazu - ochrana před SQL injection
     */              
    public static function query($sql, $parameters = array()) {
        // atribut $connection odkazuje na objekt PDO ovladače 
        // jeho metodě prepare je předán připravený SQL dotaz 
        try {
          $q = self::$connection->prepare($sql);
          // na připraveném dotazu je provedena metoda execute, které jsou předány parametry 
          @$q->execute($parameters);
          return $q;
        }
        catch (PDOException $e) {
           echo "<p>Chyba v dotazu SQL: $sql</p>";
           die($e->getMessage());
        }
    }

    /**
     *  Veřejná statická metoda dotaz - předání dotazu databázi - výstup bude typu asociativní pole
     *  @ $sql - SQL dotaz
     *  @ $parameters - předávané parametry dotazu - ochrana před SQL injection
     */              
    public static function queryArray($sql, $parameters = array()) {
        // atribut $connection odkazuje na objekt PDO ovladače 
        // jeho metodě prepare je předán připravený SQL dotaz 
        try {
          $q = self::$connection->prepare($sql);
          // na připraveném dotazu je provedena metoda execute, které jsou předány parametry 
          @$q->execute($parameters);
          return $q->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e) {
           echo "<p>Chyba v dotazu SQL: $sql</p>";
           die($e->getMessage());
        }
    }
}