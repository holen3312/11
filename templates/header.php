<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Мой блог</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>

<table class="layout">
    <tr>
        <td colspan="2" class="header">
            Мой блог
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: right">
            <?php if (!empty($user)) {?>
            привет, <?= $user->getNickname();?> | <a href="http://myproject.loc/users/exit">EXIT</a>
            <?php } else { ?>
                <a href="http://myproject.loc/users/login"> Войдите на сайт</a>| <a href="http://myproject.loc/users/register">Registration</a>
            <?php } ?>
        </td>
    </tr>
    <tr>
        <td>