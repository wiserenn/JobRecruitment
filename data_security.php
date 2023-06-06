<?php 
    function password_chain($password){
        $key=13;
        $key2=-17; //for backwards the data
        echo(strrev($password)); //strrev writes backwards the data
    }

    password_chain("123");

    
?>