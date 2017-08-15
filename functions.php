<?php

function getTheDateMap($k){
  return (substr($k[0],0,4).'-'.substr($k[0],4,2).'-'.substr($k[0],6,2));
}

function getTheDate($k){
  return (substr($k,0,4).'-'.substr($k,4,2).'-'.substr($k,6,2));
}
