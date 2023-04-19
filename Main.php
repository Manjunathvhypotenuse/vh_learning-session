<?php

use PersonAddress\Address;
require_once "person_details.php";
require "separatefile.php";

$address = new Address('a', 20, '12th main', 'btm', 'Bengaluru');
echo "person name : ".$address->getName() ."\n"; 
echo "person age : ".$address->getAge() ."\n"; 
echo "person address : ".$address->getAddress() ."\n"; 
$address->sayHello(); 
