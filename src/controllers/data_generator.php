<?php
Database::executeSQL('DELETE FROM working_hours');
Database::executeSQL('DELETE FROM users WHERE id > 5');


function getDayTemplateByOdds($regularRate, $extraRate, $lazyRate) {
    $regularDayTemplete = [
        'time1' => '08:00:00',
        'time2' => '12:00:00',
        'time3' => '13:00:00',
        'time4' => '17:00:00',
        'worked_time' => DAILY_TIME
    ];
    
    $extraHourDayTemplete = [
        'time1' => '08:00:00',
        'time2' => '12:00:00',
        'time3' => '13:00:00',
        'time4' => '18:00:00',
        'worked_time' => DAILY_TIME + 3600
    ];
    
    $lazyDayTemplete = [
        'time1' => '08:30:00',
        'time2' => '12:00:00',
        'time3' => '13:00:00',
        'time4' => '18:00:00',
        'worked_time' => DAILY_TIME - 1800
    ];

    $value = rand(0, 100);
    if($value <= $regularRate) {
        return $regularDayTemplete;
    } elseif($value <= $regularRate + $extraRate) {
        return $extraHourDayTemplete;
    } else {
        return $lazyDayTemplete;
    }
}

function populateWorkingHours($userId, $initialDate, $rugularRate, $extraRate, $lazyRate) {
    $currentDate = $initialDate;
    $yesterday = new DateTime();
    $yesterday->modify('-1 day');
    $columns = ['user_id' => $userId, 'work_date' => $currentDate];
    
    while(isBefore($currentDate, $yesterday)) {
        if(!isWeekend($currentDate)) {
            $template = getDayTemplateByOdds($rugularRate, $extraRate, $lazyRate);
            $columns = array_merge($columns, $template);
            $workingHours = new WorkingHours($columns);
            $workingHours->insert();
        }
        $currentDate = getNextDay($currentDate)->format('Y-m-d');
        $columns['work_date'] = $currentDate;
    }
}

$lastMonth = strtotime('first day of last month');
populateWorkingHours(1, date('Y-m-1'), 70, 20, 10);
populateWorkingHours(3, date('Y-m-d', $lastMonth), 20, 75, 5);
populateWorkingHours(4, date('Y-m-d', $lastMonth), 20, 10, 70);
echo 'Deu certo';


// Lipe 
header("Location:day_records.php");