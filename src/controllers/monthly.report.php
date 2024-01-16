<?php
session_start();
requireValidSession();

$currentDate = new DateTime();

$user = $_SESSION['user'];
$users = null;
if($user->is_admin) {
    $users = User::get();
}

$selectedPeriod = $_POST['period'] ? $_POST['period'] : $currentDate->format('Y-m');
$periods = [];
for($yaerDiff = 2; $yaerDiff >= 0; $yaerDiff--) {
    $yaer = date('Y') - $yaerDiff;
    for($month = 1; $month <= 12; $month++) {
        $date = new DateTime("{$yaer}-{$month}-1");
        $periods[$date->format('Y-m')] = strftime('%B de %Y', $date->getTimestamp());
    }
}


$registries = WorkingHours::getMonthlyReport($user->id, $currentDate);

$report = [];
$workDay = 0;
$sumOfWorkedTime = 0;
$lastDay = getLastDayOfMonth($selectedPeriod)->format('d');

for($day = 1; $day <= $lastDay; $day++) {
    $date = $selectedPeriod . '-' . sprintf('%02d', $day);
    $registry = $registries[$date];

    if(isPastWorkday($date)) $workDay++;

    if($registry) {
        $sumOfWorkedTime += $registry->worked_time;
        array_push($report, $registry);
    } else {
        array_push($report, new WorkingHours([
            'work_date' => $date,
            'worked_time' => 0
        ]));
        
    }
    
}

$expectedTime = $workDay * DAILY_TIME;
$balance = getTimeStringFromSeconds(abs($sumOfWorkedTime - $expectedTime));
$sing = ($sumOfWorkedTime >= $expectedTime) ? '+' : '-';


loadTempleteView('monthly.report', [
    'report' => $report,
    'sumOfWorkedTime' => getTimeStringFromSeconds($sumOfWorkedTime),
    'balance' => "{$sing}{$balance}",
    'periods' => $periods,
    'users' => $users
]);