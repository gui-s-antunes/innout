<?php
// ini_set('display_errors',1);
// ini_set('display_startup_erros',1);
// error_reporting(E_ALL);
// este arquivo é para testes

loadModel('WorkingHours'); // data_generator é um arquivo de testes, portanto colocaremos diretamente aqui o carregamento

// reset db
Database::executeSQL('DELETE FROM working_hours');
Database::executeSQL('DELETE FROM users WHERE id > 5');

function getDayTemplateByOdds($regularRate, $extraRate, $lazyRate){
    $regularDayTemplate = [
        'time1' => '08:00:00',
        'time2' => '12:00:00',
        'time3' => '13:00:00',
        'time4' => '17:00:00',
        'worked_time' => DAILY_TIME
    ];
    
    $extraHourDayTemplate = [
        'time1' => '08:00:00',
        'time2' => '12:00:00',
        'time3' => '13:00:00',
        'time4' => '18:00:00',
        'worked_time' => DAILY_TIME + 3600
    ];
    
    $lazyDayTemplate = [
        'time1' => '08:30:00',
        'time2' => '12:00:00',
        'time3' => '13:00:00',
        'time4' => '17:00:00',
        'worked_time' => DAILY_TIME - 1800
    ];

    $value = rand(0, 100);
    if($value <= $regularRate){
        return $regularDayTemplate;
    } elseif($value <= $regularRate + $extraRate){
        return $extraHourDayTemplate;
    } else{
        return $lazyDayTemplate;
    }

}

function populateWorkingHours($userId, $initialDate, $regularRate, $extraRate, $lazyRate){
    $currentDate = $initialDate;
    $yesterday = new Datetime();
    $yesterday->modify('-1 day');
    $columns = ['user_id' => $userId, 'work_date' => $currentDate];

    while(isBefore($currentDate, $yesterday)){
        if(!isWeekend($currentDate)){
            $template = getDayTemplateByOdds($regularRate, $extraRate, $lazyRate);
            $columns = array_merge($columns, $template);
            $workingHours = new WorkingHours($columns);
            $workingHours->save();
        }
        $currentDate = getNextDay($currentDate)->format('Y-m-d');
        $columns['work_date'] = $currentDate;
    }
}

$lastMonth = strtotime('first day of last month');
populateWorkingHours(1, date('Y-m-1'), 70, 20, 10);
populateWorkingHours(3, date('Y-m-d', $lastMonth), 20, 75, 5);
populateWorkingHours(4, date('Y-m-d', $lastMonth), 10, 20, 70);

echo 'fine';
