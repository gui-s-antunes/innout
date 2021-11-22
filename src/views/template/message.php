<?php
$errors = [];

if($exception){
    $message = [
        'type' => 'error',
        'message' => $exception->getmessage()
    ];

    if(get_class($exception) === 'ValidationException'){
        $errors = $exception->getErrors();
    }
}

$alertType = '';

if($message['type'] === 'error'){
    $alertType = 'danger';
} else{
    $alertType = 'info';
}
?>

<?php if($message): ?>
    <div class="my-3 alert alert-<?= $alertType ?>" role='alert'>
        <?= $message['message'] ?>
    </div>
<?php endif ?>