<?php

class Alexa
{

    public static function sayHello()
    {
        return "Hello";
    }



    public function sayTemperature(string $temperature)
    {
        echo " il fait $temperature degrés";
    }

    

}

$morning = new Alexa;
var_dump($morning);





?>