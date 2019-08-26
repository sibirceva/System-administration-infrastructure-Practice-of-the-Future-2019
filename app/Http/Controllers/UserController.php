<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    public function view_all()
    {
        $user = new User;
        $user->login = 'admin';
        $user->save();

        $users = User::all();

        foreach ($users as $user) {
            echo $user->login;
            echo '<br>';
        }
    }

    public function view($id)
    {
        echo 'Посмотреть пользователя с номером '.$id;
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
