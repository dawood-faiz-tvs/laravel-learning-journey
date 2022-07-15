<?php

if(!function_exists('debug')){
  function debug($data, $flag=false){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    if($flag==true){
      exit;
    }
  }
}

if(!function_exists('formatted_date')){
  function formatted_date($raw_date, $format){
    $formatted_date = date($format, strtotime($raw_date));
    return $formatted_date;
  }
}