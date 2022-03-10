<?php
try {
        $conn = new PDO("mysql:host=localhost;dbname=bd_biblioteca","root","");
    }
catch(PDOException $e)
    {
        echo $e->getmessage();
    }