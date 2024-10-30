<?php

//A: RECORDS TODAY'S Date And Time
$today = time();

//B: RECORDS Date And Time OF YOUR EVENT
$event = mktime(0,0,0,12,25,2025);

//C: COMPUTES THE DAYS UNTIL THE EVENT.
$countdown = round(($event - $today)/86400);

//D: DISPLAYS COUNTDOWN UNTIL EVENT
echo "$countdown days until Christmas";

?>