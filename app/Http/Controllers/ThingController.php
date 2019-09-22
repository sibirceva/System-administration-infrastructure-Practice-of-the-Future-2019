<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Thing;

use App\Type;

class ThingController extends Controller
{
    public function add()
    {
        //Форма для добавления вещи
        echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        </head>
        <body>
            <h4 class="display-4"><em>&nbsp;Добавление новой вещи</p></em></h4>
            <form action="new" method="POST">
                <div class="form-group col-md-6">
                    <label for="inputType">Тип вещи</label>
                    <select id="inputType" class="form-control" name="type">
                    <option selected>Выберите тип вещи...</option>';
        $types = Type::all();
        foreach ($types as $type) {
            echo '<option>'.$type->name.'</option>';
        }
        echo '  </select>
            </div>
            <div class="form-group col-md-6">
                <label for="location">Местоположение вещи</label>
                <input type="text" name="location" class="form-control" id="location" placeholder="Например: 4 корпус, холл 3 этажа">
            </div>
            <div class="form-group col-md-6">
                <button type="submit" class="btn btn-primary">Добавить</button>
            </div>
            </form>';
    }

    public function add1() //добавление в БД
    {
        $thing = new Thing;
        $thing->location = $_POST['location'];
        $thing->type = Type::where('name',$_POST['type'])->first()->id;
        $thing->save();
        return view('message', ['msg' => 'Новая вещь успешно добавлена!', 'link' => 'Добавить ещё одну вещь', 'link_url' => '/thing/add']);
    }

    public function view_all()
    {
        return view('thing_list', [ 'things' => Thing::all()]);
    }

    public function print_poster($id)
    {
        //echo 'Печать плаката для вещи с номером '.$id;
        $thing = Thing::find($id);
        $type = Type::find($thing->type);
        require_once('tfpdf\report.php');
    }

    public function edit($id)
    {
        echo 'Редактировать вещь с номером '.$id;
    }

    public function delete($id)
    {
        Thing::destroy($id);
        return view('message', ['msg' => 'Вещь с номером '.$id.' успешно удалена!', 'link' => 'Вернуться к списку вещей', 'link_url' => '/thing/view']);
    }

    public function form($id)
    {
        echo '<!DOCTYPE HTML>

        <html xmlns="http://www.w3.org/1999/xhtml">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        
        <head>
         
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
         
            <style type="text/css">
        
            #header, #content { position: absolute; }
            #header, #content { overflow: auto; padding: 10px; }
        
            #content {
                top: 20px;
                bottom: 0; 
                right: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                width: 100%;
            }
            
            .display-4 { font-size: 9vw; }

            .custom-control-label { 
                font-size: 110%;
                display: inline; 
            }

        
            </style>
         
            </head>
        
            <body>
        
            <form action="/thing/crash_add/'.$id.'" method="POST">
            <blockquote class="blockquote">
        
            <div id="content">
            <h4 class="display-4"><em>Что случилось?</em></h4> <br> <div>';
            //код для вывода частых поломок
            $i = 0;
            $thing = Thing::find($id);
            $type = Type::find($thing->type);
            $crashes = explode('; ',$type->often_crashes);
            foreach ($crashes as $crash) {
                echo '<div class="custom-control custom-checkbox mr-sm-2">
                <input type="checkbox" class="custom-control-input" id="'.$i.'" name="'.$i.'">
                <label class="custom-control-label" for="'.$i.'">'.$crash.'</label>
              </div>';
              $i++;
            }
            //конец кода для частых поломок
            echo '<div class="custom-control custom-checkbox mr-sm-2">
            <input type="checkbox" class="custom-control-input" id="'.$i.'" name="other">
            <label class="custom-control-label" for="'.$i.'">Другое:</label>
          </div>
        </div>  
        <br>
        <TEXTAREA NAME="problem" DOWS=70 COLS=70></TEXTAREA>
        
    <BR>
        
    <button type="submit" class="btn btn-primary">
    
        <span class="rounded-pill">Отправить</span> 
    </button> 
    </form>
    </blockquote>
    </div>
    </body>
    
    </html>';
    }
}
