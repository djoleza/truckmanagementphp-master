<?php

class Prevoz
{
    public $id;
    public $kamion_id;
    public $datum;
    public $cena;
    public $polazak;
    public $dolazak;

    function __construct($id, $kamion_id, $datum, $cena, $polazak, $dolazak)
    {
        $this->id = $id;
        $this->kamion_id = $kamion_id;
        $this->datum = $datum;
        $this->cena = $cena;
        $this->polazak = $polazak;
        $this->dolazak = $dolazak;
    }
}
