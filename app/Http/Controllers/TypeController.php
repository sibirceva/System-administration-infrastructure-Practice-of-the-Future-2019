<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;

class TypeController extends Controller
{
    public function add()
    {
        //Форма для добавления типа вещи
        echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        </head>
        <body>
            <h4 class="display-4"><em>&nbsp;Добавление нового типа вещи</p></em></h4>
            <form action="new" method="POST">
            <div class="form-group col-md-6">
                <label for="name">Название типа вещи</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Например: Кулер">
            </div>
            <div class="form-group col-md-6">
                <label for="crashes">Частые поломки</label>
                <input type="text" name="often_crashes" class="form-control" id="crashes" placeholder="Например: Нет воды; Нет стаканов">
                <small id="crashes" class="form-text text-muted">Вводите список поломок в формате "Поломка1; Поломка2" (см. пример)</small>
            </div>
            <div class="form-group col-md-6">
                <button type="submit" class="btn btn-primary">Добавить</button>
            </div>
            </form>';
    }

    public function add1() //добавление в БД
    {
        $type = new Type;
        $type->name = $_POST['name'];
        $type->often_crashes = $_POST['often_crashes'];
        $type->save();
        echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <br><br><p class="text-center h2">Новый тип вещи успешно добавлен!<br>[<a href="/user/view">Вернуться в личный кабинет</a>]</p>';
    }

    public function view_all()
    {
        echo 'Посмотреть все типы вещей';
    }

    public function edit($id)
    {
        echo 'Редактировать тип вещи с номером '.$id;
    }

    public function delete($id)
    {
        echo 'Удалить тип вещи с номером '.$id;
    }
}
