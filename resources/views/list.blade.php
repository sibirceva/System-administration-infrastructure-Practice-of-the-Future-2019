@extends('layouts.app')

@section('content')
<table class="table">
                <caption><b>Список</b></caption>
                <tr>
                    <thead  class="thead-light">
                        <th scope="col">Номер</th>
                        <th scope="col">Вещь и место</th>
                        <!-- foreach ... 
                        <th scope="col">Описание</th>
                        <th scope="col">Время заявления</th>
                        <th scope="col">Кто закрыл</th>
                        <th scope="col">Когда закрыта</th>
                        <th scope="col">Действия</th>-->
                    </thead>
                </tr>
        <!--foreach //($crashes as $crash)
            $s = ($crash->who_closed != NULL) ? User::find(3)->name /*костыль!*/ : $crash->who_closed;
            <th scope="row">{{ $crash->id }}</th>
            <td>{{ Type::find(Thing::find($crash->id_of_thing)->type)->name }}<br>{{ Thing::find($crash->id_of_thing)->location }}</td>
			<td> - {{ str_replace('; ','<br> - ',$crash->description) }}</td>
			<td>{{ $crash->time }}</td>
			<td>{{ $s }}</td> 
			<td>{{ $crash->when_closed }}</td>
            <td><a href="close/{{ $crash->id }}">Закрыть</a> | <a href="view/{{ $crash->id }}">Просмотреть</a> | <a href="delete/{{ $crash->id }}">Удалить</a></td>
            </tr>
        //}-->
        </table>
@endsection