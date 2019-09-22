<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    public function view_all()
    {
        $users = User::all();

        foreach ($users as $user) {
            echo $user->id . ' ' . $user->name . ' ' . $user->email . '<br>';
        }
    //     /*$user = new User;
    //     $user->login = 'admin';
    //     $user->save();

    //     $users = User::all();

    //     foreach ($users as $user) {
    //         echo $user->login;
    //         echo '<br>';
    //     }*/
    //     echo '<html>
    //         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    //     <head>
    //         <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    //     </head>
        
    //     <body>
    //     <ul class="list-group">
    //         <li class="list-group-item"><a href="/crash/view">Список поломок</a></li>
    //         <li class="list-group-item"><a href="/thing/view">Список вещей</a></li>
    //         <li class="list-group-item"><a href="/thing/add">Добавить вещь</a></li>
    //         <li class="list-group-item"><a href="/type/add">Добавить тип вещи</a></li>
    //         <li class="list-group-item"><a href="/user/edit/1">Изменить адрес почты для уведомлений</a></li>
    //         <li class="list-group-item"><a href="https://cs3-1v4.vkuseraudio.net/p21/2432be17092fd4.mp3?extra=RfsrEaMR0sZSAogOm_A_iwbtnlpwHCICifbaNMlO6imZKLatm44gebItk1SAEgRx8jWP0SBjAXwUmPFM-tCnP2ykJgSTvbUlJy0qIERlBiNPdQY2sZjT2pQ7opLHH99Mic7LGPZ0y24aRqupNU_TMlpxoeY">Выход</a></li>
    //     </ul>';
    }

    // public function view($id)
    // {
    //     echo 'Посмотреть пользователя с номером '.$id;
    // }

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
        return view('message', ['msg' => 'Ваш e-mail успешно изменён!', 'link' => 'Вернуться в личный кабинет', 'link_url' => '/home']);
    }

    public function delete($id)
    {
        User::destroy($id);
        return view('message', ['msg' => 'Пользователь с номером '.$id.' успешно удалён!', 'link' => 'Вернуться к списку пользователей', 'link_url' => '/user/view']);
    }
}
