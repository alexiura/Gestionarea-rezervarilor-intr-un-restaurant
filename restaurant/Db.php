<?php


class Db
{
    private static $instance;

    /**
     * @var PDO
     */
    private $pdo;
    public function __construct()
    {

    }

    public static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new Db;
            if(!self::$instance->connect("localhost", "licenta" , "root", ""))
            {
                throw new Exception('Nu sa conectat');
            }
        }
        return self::$instance;
    }

    public function connect($ip, $db, $user, $password)
    {
        try
        {
            $dsn = "mysql:host=$ip;dbname=$db";
            $this->pdo = new PDO($dsn, $user, $password, [
                PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE=> PDO::FETCH_ASSOC
            ]);
        }
        catch (PDOException $exp)
        {
            var_dump($exp);
            return false;
        }

        return true;
    }

    public function select($table ,array $conditions)
    {
        $sqlQuery = "select * from $table where ";
        $first = true;
        foreach ($conditions as $key => $condition) {
            if (!$first)
            {
                $sqlQuery .= " AND ";
            }
            $sqlQuery .= $key ."= :".$key;
            $first = false;
        }
        var_dump($sqlQuery);
        $arr = [];
        try
        {
            /** @var PDOStatement $statement */
            $statement = $this->pdo->prepare($sqlQuery);
            if($statement->execute($conditions))
            {
                while($record = $statement->fetch())
                {
                    $arr[] = $record;
                }
            }

        }
        catch (PDOException $exp)
        {
            var_dump($exp);
        }

        return $arr;
        //camp operator valoare
    }


}