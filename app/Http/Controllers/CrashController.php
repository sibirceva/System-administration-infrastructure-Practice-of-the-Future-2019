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
        echo '<!DOCTYPE HTML>
        <html>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        </head>
        
        <body>
            <table class="table">
                <caption><b>Список поломок</b></caption>
                <tr>
                    <thead  class="thead-light">
                        <th scope="col">Номер</th>
                        <th scope="col">Вещь и место</th>
                        <th scope="col">Описание</th>
                        <th scope="col">Время заявления</th>
                        <th scope="col">Кем закрыта</th>
                        <th scope="col">Кто закрыл</th>
                        <th scope="col">Действия</th>
                    </thead>
                </tr>';
        $crashes = Crash::all();
        foreach ($crashes as $crash)
        {
            echo '<th scope="row">'.$crash->id.'</th>
            <td>'.Type::find(Thing::find($crash->id_of_thing)->type)->name.'<br>'.Thing::find($crash->id_of_thing)->location.'</td>
			<td> - '.str_replace(';','<br> - ',$crash->description).'</td>
			<td>'.$crash->time.'</td>
			<td>'.$crash->who_closed.'</td>
			<td>'.$crash->when_closed.'</td>
            <td><a href="close/'.$crash->id.'">Закрыть</a> | <a href="view/'.$crash->id.'">Просмотреть</a> | <a href="delete/'.$crash->id.'">Удалить</a></td>
            </tr>';
        }
        echo '</table>
        </body>
        
        </html>';
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
        $crashes = explode(';', $type->often_crashes);
        for ($i = 0; $i < count($_POST)-1; $i++) { //проверка чекбоксов частых поломок
            $crash->description .= $crashes[$i];
            if ($i+1 != count($crashes)) $crash->description .= ';';
        }
        if (count($_POST)-1 > count($crashes)) //проверка чекбокса "другое"
        {
            $crash->description .= ';';
            $crash->description .= $_POST['problem'];
        }
        $crash->save();
        $n = $crash->id;
        $crash = Crash::find($n);
        //Отправка письма
        $crash->obj = $type->name;
        $crash->loc = $thing->location;
 
        Mail::to("eug-potato@yandex.ru")->send(new CrashNotification($crash));
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
