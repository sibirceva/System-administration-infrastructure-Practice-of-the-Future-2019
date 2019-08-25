<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function add()
    {
        echo 'Добавить тип вещи и форму к нему';
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
