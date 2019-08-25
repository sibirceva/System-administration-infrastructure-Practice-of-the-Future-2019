<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrashController extends Controller
{
    public function close($id)
    {
        echo 'Закрыть поломку с номером '.$id;
    }

    public function delete($id)
    {
        echo 'Удалить поломку с номером '.$id;
    }

    public function view($id)
    {
        echo 'Посмотреть поломку с номером '.$id;
    }

    public function view_all()
    {
        echo 'Посмотреть все поломки';
    }

    public function add($id_thing)
    {
        echo 'Добавить поломку для вещи с номером '.$id_thing;
    }

}
