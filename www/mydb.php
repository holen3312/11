<?php
//$dbh = new \PDO(
//    'mysql:host=localhost;dbname=my_db;',
//    'root',
//    ''
//);
//$dbh->exec('SET NAMES UTF8');
//$stm = $dbh->prepare('INSERT INTO users (`email`, `name`) VALUES (:email, :name)');
//$stm->bindValue('email', 'x100@php.zone');
//$stm->bindValue('name', 'Вячеслав');
//$stm->execute();
//$dbh = new \PDO('mysql:host=localhost;dbname=my_db;', 'root', '');
//$dbh->exec('SET NAMES UTF8');
//$stm = $dbh->prepare('SELECT * FROM `users`');
//$stm->execute();
//$allUsers = $stm->fetchAll();
//var_dump($allUsers);

$dbh = new \PDO('mysql:host=localhost;dbname=my_db;', 'root', '');
$dbh->exec('SET NAMES UTF8'); //Выполнить внешнюю программу

$stm = $dbh->prepare('SELECT * FROM `users`');
//Подготавливает запрос к выполнению и возвращает связанный с этим запросом объект

$stm->execute(); //Запускает подготовленный запрос на выполнение
$allUsers = $stm->fetchAll(); //возвращает массив, содержащий все строки результирующего набора
?>
<table border="1">
    <tr><td>id</td><td>Имя</td><td>Email</td></tr>
    <?php foreach ($allUsers as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['name'] ?></td>
            <td><?= $user['email'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<!--$stm = $dbh->prepare('SELECT * FROM `users` WHERE name=:name');-->
<!--$stm->bindValue('name', 'Иван');-->
<!--$stm->execute();-->
<!--$allUsers = $stm->fetchAll();-->
<?php
$dbOptions = (require_once __DIR__ . '/../SRC/settings.php') ['db'];
var_dump($dbOptions);