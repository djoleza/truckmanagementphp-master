<?php

class Kamion
{
    public $id;
    public $tablice;
    public $km;
    public $model;
    public $vozac_id;
    public $dostupnost;

    function __construct($id, $tablice, $km, $model, $vozac_id, $dostupnost)
    {
        $this->id = $id;
        $this->tablice = $tablice;
        $this->km = $km;
        $this->model = $model;
        $this->vozac_id = $vozac_id;
        $this->dostupnost = $dostupnost;
    }

    function dostupniKamioni($connection)
    {
        $dostupni_kamioni = array();
        $SQL = "SELECT kamion.*, vozac.ime_prezime FROM kamion JOIN vozac ON kamion.vozac_id = vozac.id WHERE dostupnost='da'";
        $result = $connection->query($SQL);
        
        while ($truck = mysqli_fetch_assoc($result)) {
            array_push($dostupni_kamioni, $truck);
        }

        return $dostupni_kamioni;
    }
}
