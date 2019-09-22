<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crash;
use App\Thing;
use App\Type;
use App\User;
use App\Http\Controllers\Controller;
use App\Mail\CrashNotification;
use Illuminate\Support\Facades\Mail;

class CrashController extends Controller
{
    public function close($id)
    {
        $crash = Crash::findOrFail($id);
        if ($crash->who_closed == NULL)
        {
            $crash->who_closed = 1;
            $crash->when_closed = date('Y-m-d H:i:s');
            $crash->save();
            return view('message', ['msg' => 'Поломка с номером '.$id.' успешно закрыта!', 'link' => 'Вернуться к списку поломок', 'link_url' => '/crash/view']);
        }
        else return view('message', ['msg' => 'Поломка уже была закрыта!', 'link' => 'Вернуться к списку поломок', 'link_url' => '/crash/view']);
    }

    public function delete($id)
    {
        Crash::destroy($id);
        return view('message', ['msg' => 'Поломка с номером '.$id.' успешно удалена!', 'link' => 'Вернуться к списку поломок', 'link_url' => '/crash/view']);
    }

    public function view($id)
    {
        echo 'Посмотреть поломку с номером '.$id;
    }

    public function view_all()
    {
        return view('crash_list', [ 'crashes' => Crash::all()]);
    }

    public function add($id_thing)
    {
        //echo 'Добавить поломку для вещи с номером '.$id_thing;
        //echo '<pre>';
        //print_r($_POST);
        
        $crash = new Crash;
        $crash->id_of_thing = $id_thing;
        $thing = Thing::find($id_thing);
        $type = Type::find($thing->type);
        $crashes = explode('; ', $type->often_crashes);
        $cpost = array_key_exists('other', $_POST) ? count($_POST)-2 : count($_POST)-1;
        $count = (count($_POST)>count($crashes)) ? count($crashes)-1 : $cpost;
        for ($i = 0; $i < $count; $i++) { //проверка чекбоксов частых поломок
            $crash->description .= $crashes[$i];
            if ($i+1 != $count) $crash->description .= '; ';
        }
        if (array_key_exists('other', $_POST)) //проверка чекбокса "другое"
        {
            if(strlen($crash->description)>0) $crash->description.= '; ';
            $crash->description .= $_POST['problem'];
        }
        $crash->save();
        $n = $crash->id;
        $crash = Crash::find($n);
        //Отправка письма
        $crash->obj = $type->name;
        $crash->loc = $thing->location;
        $mail = User::find(1)->email;
        Mail::to($mail)->send(new CrashNotification($crash));
        echo '<html><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
            <style type="text/css">
                h4 {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    flex-direction: column;
                    width: 100%;
                }
            </style>
        </head>
        <body>
            <br> <br>
            <h4 class="display-4"><em>Данные успешно отправлены. Спасибо!</em></h4>
        </body></html>';
    }

}
