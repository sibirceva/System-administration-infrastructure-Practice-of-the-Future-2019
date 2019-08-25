<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThingController extends Controller
{
    public function add()
    {
        echo 'Добавить вещь';
    }

    public function view_all()
    {
        echo 'Посмотреть все вещи';
    }

    public function print_poster($id)
    {
        echo 'Печать плаката для вещи с номером '.$id;
    }

    public function edit($id)
    {
        echo 'Редактировать вещь с номером '.$id;
    }

    public function delete($id)
    {
        echo 'Удалить вещь с номером '.$id;
    }
}
