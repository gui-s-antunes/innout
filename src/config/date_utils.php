<?php

function getDateAsDatetime($date){
    return is_string($date) ? new DateTime($date) : $date;
}

function isWeekend($date){
    $inputDate = getDateAsDatetime($date);
    return $inputDate->format('N') >= 6;
}

function isBefore($date1, $date2){
    $inputDate1 = getDateAsDatetime($date1);
    $inputDate2 = getDateAsDatetime($date2);
    return $inputDate1 <= $inputDate2;
}

function getNextDay($date){
    $inputDate = getDateAsDatetime($date);
    $inputDate->modify('+1 day');
    return $inputDate;
}