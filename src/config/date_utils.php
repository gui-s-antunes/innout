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

function sumIntervals($interval1, $interval2){
    $date = new DateTime('00:00:00');
    $date->add($interval1);
    $date->add($interval2);
    return (new DateTime('00:00:00'))->diff($date);
}

function subtractIntervals($interval1, $interval2){
    $date = new DateTime('00:00:00');
    $date->add($interval1);
    $date->sub($interval2);
    return (new DateTime('00:00:00'))->diff($date);
}

function getDateFromInterval($interval){
    return new DateTimeImmutable($interval->format('%H:%i:%s'));
}

function getDateFromString($str){
    return new DateTimeImmutable::createFromFormat('H:i:s', $str);
}