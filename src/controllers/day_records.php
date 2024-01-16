<?php
session_start();
requireValidSession();


$date = (new DateTime())->getTimestamp();
$today = strftime('%d de %B de %Y', $date);
loadTempleteView('day_records', ['today' => $today]);