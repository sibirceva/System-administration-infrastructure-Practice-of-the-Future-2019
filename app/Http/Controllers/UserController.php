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
            <li class="list-group-item"><a href="/user/edit/1">Редактировать учётную запись</a></li>
            <li class="list-group-item"><a href="http://natribu.org/ru/#INGC0L7Qsi4g0JfQsNCy0YXQvtC3ICUgINCy0Ysg0L3QsNC20LDQu9C4INC60L3QvtC-0LrRgyAi0LLRi9GF0L7QtCIgJSAg0L3QtSDQvdCw0LbQuNC80LDQudGC0LUg0L3QsCDQstGB0LUg0LrQvdC+0L-QutC4IQ">Выход</a></li>
        </ul>';
    }

    public function view($id)
    {
        //echo 'Посмотреть пользователя с номером '.$id;
    }

    public function edit($id)
    {
        echo 'Редактировать пользователя с номером '.$id;
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
