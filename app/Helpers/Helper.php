<?php

if(! function_exists("toMysqlDateFormat")){
  function  toMysqlDateFormat($date){
    $date = DateTime::createFromFormat("d/m/Y", $date);
    return ($date) ? $date->format("Y-m-d") : false;
  }

  function toBRFormat($date){
    $date = DateTime::createFromFormat("Y-m-d", $date);
    return ($date) ? $date->format("d/m/Y") : false;
  }
}
