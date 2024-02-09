<?php

function chargerClass($className){
    require __DIR__ . '/../class/' . $className . '.php';
}

spl_autoload_register('chargerClass');