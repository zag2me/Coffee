<?php

// Reusable Functions

function isToday($date) //check if it's today
{
  $date = date("l, F d",strtotime($date));
  if($date == date("l, F d"))
  return true;
  else
  return false; 
}

 

function isYesterday($date) //check if it's yesterday
{
  $date = date("l, F d",strtotime($date));
  if($date == date("l, F d")-1)
  return true;
  else
  return false; 
}

?>