<?php

include("mysqlConnection.php");
class PersonDao
{


    public static function select(Person $person)
    {
        $connection = Connection::getConnection();

        $name = $person->getUsername();
        $password = $person->getPassword();

        $query = "SELECT * FROM users WHERE user='$name' and pw='$password'";
        $preparedStatement = $connection->prepare($query);
        $preparedStatement->execute();
        $data=$preparedStatement->fetch(PDO::FETCH_ASSOC);
        $rows = $preparedStatement->rowCount();
        // print_r(json_encode($rows, $preparedStatement));
        print_r(json_encode($data));
    }

    public static function insert(Person $person)
    {
        $connection = Connection::getConnection();

        $dni = $person->getDni();
        $name = $person->getName();
        $lastName = $person->getlastName();
        $userName = $person->getUsername();
        $password = $person->getPassword();

        $query = "INSERT INTO users (dni, name, lastName, user, pw) VALUES ('$dni','$name','$lastName','$userName', '$password')";
        $preparedStatement = $connection->prepare($query);
        $preparedStatement->execute();
        $msg = "user inserted succesfully";
        print_r(json_encode($msg));
    }
}
