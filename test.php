<?php

$exchange_rate = json_decode(file_get_contents("http://api.fixer.io/2000-01-03?base=USD&symbols=SGD"));
echo '$1 USD = S$'.round($exchange_rate->rates->SGD, 2).' SGD';
