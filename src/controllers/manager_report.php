<?php
session_start();
requireValidSession();


$activeUsersCount = User::getActiveUserCount();

$absentUsers = WorkingHours::getAbsentUsers();

$yearAndMonth = (new DateTime())->format('Y-m');
$seconds = WorkingHours::getWorkedTimeInMonth($yearAndMonth);
$hoursInMonth = explode(':', getTimeStringFromSeconds($seconds))[0]; 

loadTempleteView('manager_report', [
    'activeUsersCount' => $activeUsersCount,
    'absentUsers' => $absentUsers, 
    'hoursInMonth' => $hoursInMonth
]);
