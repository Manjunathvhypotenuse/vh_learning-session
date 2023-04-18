<?php
function truthyorfalsy($value) {
if ($value) {
    return "true";
} else{
    return "false";
}
}

echo truthyorfalsy ("()");
echo "\n";
echo truthyorfalsy ('false');
echo "\n";
echo truthyorfalsy ("");
echo "\n";

