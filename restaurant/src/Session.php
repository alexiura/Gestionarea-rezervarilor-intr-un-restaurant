<?php


class Session
{
    public function start()
    {
        session_start();      //pornim sesiunea

        $userId = $_SESSION['user'] ?? null ;
        if($userId)
        {
            $db = Db::getInstance();
            $user =  $db->select("login" , ['id'=>$userId]);
            $_SESSION['userData'] = $user;

        }
        else
            echo "User not found";   //verificam daca avem user sau nu

        //daca avem, incarcam din bd informatiile
    }

    public function regenerate()
    {
        //session_regenerate_id(); //regeneram sesiunea
    }

    public function login(string $user , string $password)
    {
        loginValidation($user, $password) ; //validare input(conditii)
        //validam user si parola pe baza bazei de date
        //session_regenerate_id();      //regeneram sesiunea
        //salvam datele de indentificare in sesiune  $_SESSION[]
    }

    public function read(string $key)
    {
        //luam valori din sesiune si le returnam
    }

    public function write( string $key, string $value )
    {
        //scriem valori in sesiune
    }

    public function logout()
    {
        session_destroy();          //distrugem sesiunea
        session_regenerate_id();    //regeneram sesiunea
    }

}