<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>In 'n Out</title>
        <link rel="stylesheet" href="assets/css/login.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/comum.css">
        <link rel="stylesheet" href="assets/css/icofont.min.css">
    </head>
    <body>
        <form class='login-form' action="#" method="post">
            <div class="login-card card">
                <div class="card-header">
                    <i class="icofont-travelling mr-2"></i>
                    <span class="font-weight-light">In</span>
                    <span class="font-weight-bold mx-1">'n</span>
                    <span class="font-weight-light">Out</span>
                    <i class="icofont-runner-alt-1 ml-2"></i>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" name='email' id="email" class="form-control" value="<?= $email ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" name='password' id="password" class="form-control">
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary">Entrar <i class="icofont-login"></i></button>
                </div>
            </div>
        </form>
    </body>
</html>