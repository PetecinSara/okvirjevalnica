<?php

$velikost = $_REQUEST["velikost"];

$res = 0;
if (9600 <= $velikost) $res = 45;
if (4800 <= $velikost && $velikost < 9600) $res = 30;
if (2400 <= $velikost && $velikost < 4800) $res = 15;
if (1200 <= $velikost && $velikost < 2400) $res = 7.5;
if (0    <  $velikost && $velikost < 1200) $res = 6;
echo $res;
