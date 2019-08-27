<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    public function view_all()
    {
        /*$user = new User;
        $user->login = 'admin';
        $user->save();

        $users = User::all();

        foreach ($users as $user) {
            echo $user->login;
            echo '<br>';
        }*/
        echo '<html>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        </head>
        
        <body>
        <ul class="list-group">
            <li class="list-group-item"><a href="/crash/view">Список поломок</a></li>
            <li class="list-group-item"><a href="/thing/view">Список вещей</a></li>
            <li class="list-group-item"><a href="/thing/add">Добавить вещь</a></li>
            <li class="list-group-item"><a href="/type/add">Добавить тип вещи</a></li>
            <li class="list-group-item"><a href="/user/edit/1">Изменить адрес почты для уведомлений</a></li>
            <li class="list-group-item"><a href="http://natribu.org/ru/#INGC0L7Qsi4g0JfQsNCy0YXQvtC3ICUgINCy0Ysg0L3QsNC20LDQu9C4INC60L3QvtC-0LrRgyAi0LLRi9GF0L7QtCIgJSAg0L3QtSDQvdCw0LbQuNC80LDQudGC0LUg0L3QsCDQstGB0LUg0LrQvdC+0L-QutC4IQ">Выход</a></li>
        </ul>';
    }

    public function view($id)
    {
        //echo 'Посмотреть пользователя с номером '.$id;
    }

    public function edit($id)
    {
        echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        </head>
        <body>
            <h4 class="display-4"><em>&nbsp;Изменение адреса почты</p></em></h4>
            <form action="/user/editmail/'.$id.'" method="POST">
            <div class="form-group col-md-6">
                <p>Текущий адрес: '.User::find($id)->email.'</p>
                <label for="name">Адрес электронной почты</label>
                <input type="email" name="email" class="form-control" id="name" placeholder="example@mail.ru">
            </div>
            <div class="form-group col-md-6">
                <button type="submit" class="btn btn-primary">Изменить</button>
            </div>
            </form>';
    }

    public function editmail($id)
    {
        $user = User::find($id);
        $user->email = $_POST['email'];
        $user->save();
        echo 'Успешно сохранено!';
    }

    public function delete($id)
    {
        User::destroy($id);
        echo 'Пользователь с номером '.$id.' удалён! <br> Список существующих пользователей: <br>';
        $users = User::all();

        foreach ($users as $user) {
            echo $user->id;
            echo '<br>';
        }
    }
}
