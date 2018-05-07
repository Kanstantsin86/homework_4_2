<?php
require ("config.php");
$id = $_GET['id'];
$action = $_GET['action'];

if($action == "done") {
    $db->exec("UPDATE tasks SET is_done='Выполнено' WHERE id = $id");
}
if($action == "delete") {
    $db->exec("DELETE FROM tasks WHERE id = $id");
}

$st = $db->query('SELECT * FROM tasks');

?>

<html>
<head>
    <title>TODO List</title>
    <meta charset="utf-8" lang="ru">
    <style>
        table {
            width: 70%;
            border-collapse: collapse;
        }
        td, th {
            border: 1px solid #C2C2FF;
            padding: 3px 7px 2px 7px;
        }
        th {
            text-align: left;
            padding: 5px;
            background-color: #9999FF;
            color: #fff;
        }
        tr:hover { background-color: #E0E0FF; }
        td:hover { background-color: #FFFFE0; }
    </style>
</head>
<body>

<h2>Список дел на сегодня</h2>

<form method="POST">
    <input type="text" name="description" placeholder="Описание задачи" value="">
    <input type="submit" name="save" value="Добавить">
</form>

<!--label for="sort">Сортировать по:</label>

<select name="sort_by">
    <option value="date_created">Дате добавления</option>
    <option value="is_done">Статусу</option>
    <option value="description">Описанию</option>
</select>


<input type="submit" name="sort" value="Отсортировать">

<form></form-->

<table>
    <thead>
    <tr>
        <td><h4>Идентификатор</h4></td>
        <td><h4>Описание задачи</h4></td>
        <td><h4>Дата добавления</h4></td>
        <td><h4>Статус</h4></td>
        <td><h4>Действия</h4></td>
    </tr>
    </thead>


    <tbody>
    <?php
    if(!empty($_POST['description'])) {
        $thSave = $_POST['description'];
        $thDate = date ('Y-m-d H:i:s');
        $thDone = "В процессе";
        $rows = $db->exec("INSERT INTO tasks(id, description, is_done, date_added) VALUES (null, '".@$thSave."','".@$thDone."','".@$thDate."')");
        $st = $db->query('SELECT * FROM tasks');
    }

    while ($rows = $st->fetch()) { ?>
            <tr>
                <td><?php echo $rows ['id'] ?></td>
                <td><?php echo $rows ['description'] ?></td>
                <td><?php echo $rows ['date_added'] ?></td>
                <td><span style="color: goldenrod;"><?php echo $rows ['is_done'] ?></span></td>
                <td><a href="?id=<?= $rows ['id'];?>&action=done">Выполнить</a>
                    <a href="?id=<?= $rows ['id'];?>&action=delete">Удалить</a></td>
            </tr>


    <?php }?>
    </tbody>
</table>
</body>
</html>