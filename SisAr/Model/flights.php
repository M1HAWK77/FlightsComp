<?php

include("mysqlConnection.php");

class Flights
{
    public static function select()
    {
        $connection = Connection::getConnection();
        $query = "SELECT f.idFlight, f.idPlane, a.nameAirline, c.nameCity as departure, d.nameCity as arrival, f.departureTime, f.arrivalTime, f.typeTrip, f.price, f.availableSeats from flights as f, planes as p, cities as c, cities as d, airlines as a
        Where f.idPlane = p.idPlane 
        and f.idCityOut = c.idCity
        and f.idCityIn = d.idCity
        and f.idPlane = p.idPlane
        and a.idAirline = p.idAirlineBelong";
        $preparedStatement = $connection->prepare($query);
        $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($data));
    }

    public static function selectFilter($departureCity, $arrivalCity, $departureTime, $arrivalTime, $typeTrip)
    {
        $connection = Connection::getConnection();
        $query = "SELECT f.idFlight, f.idPlane, a.nameAirline, c.nameCity as departure, d.nameCity as arrival, f.departureTime, f.arrivalTime, f.typeTrip, f.price, f.availableSeats from flights as f, planes as p, cities as c, cities as d, airlines as a
        Where f.idPlane = p.idPlane 
        and f.idCityOut = c.idCity
        and f.idCityIn = d.idCity
        and f.idPlane = p.idPlane
        and a.idAirline = p.idAirlineBelong
        and ((c.nameCity = '$departureCity'
        and d.nameCity = '$arrivalCity')
        or (f.departureTime='$departureTime'
        and f.arrivalTime='$arrivalTime')
        or (f.typeTrip='$typeTrip'))";

        $preparedStatement = $connection->prepare($query);
        $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($data));
    }
}
