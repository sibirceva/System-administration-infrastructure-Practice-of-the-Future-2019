<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function view_all()
    {
        echo 'Посмотреть всех пользователей';
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
        echo 'Удалить пользователя с номером '.$id;
    }
}
