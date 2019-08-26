<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crash;
use App\Thing;
use App\Type;

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
        //echo 'Добавить поломку для вещи с номером '.$id_thing;
        $crash = new Crash;
        $crash->id_of_thing = $id_thing;
        $thing = Thing::find($id_thing);
        $type = Type::find($thing->type);
        $crashes = explode(';',$type->often_crashes);
        for ($i = 0; $i < count($crashes); $i++) {
            if ($_POST[$i] == 'on') {
                $crash->description .= $crashes[$i];
                if ($i+1 != count($crashes)) $crash->description .= ';';
            }
        }
        if ($_POST[count($crashes)] == 'on')
        {
            $crash->description .= ';';
            $crash->description .= $_POST['problem'];
        }
        $crash->save();
        /*$i = $crash->id;
        $crash = Crash::find($i);
        echo $crash->id.' '.$crash->time.' '.$crash->description; для отладки */
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
            <h4 class="display-4"><em>Данные успешно отправлены. Спасибо!</em></h4>
        </body></html>';
    }

}
