<?php
session_start();
requireValidSession();

$user = $_SESSION['user'];

$registries = WorkingHours::getMonthlyReport($user->id, new Datetime());

loadTemplateView('monthly_report', [
    'registries' => $registries
]);