@extends('layouts.app')

@php
use App\Type;
use App\Thing;
$url=$_SERVER['REQUEST_URI'];
header("Refresh: 5; URL=$url");
foreach ($crashes as $crash)
        {
            $crash->who_closed = ($crash->who_closed != NULL) ? 'ADMIN' : $crash->who_closed;
            $crash->thing = Type::find(Thing::find($crash->id_of_thing)->type)->name;
            $crash->loc .= Thing::find($crash->id_of_thing)->location;
			$crash->description ='- ' . str_replace('; ','<br> - ',$crash->description);
			$crash->actions = '<a href="close/'.$crash->id.'">Закрыть</a> | <a href="delete/'.$crash->id.'">Удалить</a>'; /*| <a href="view/'.$crash->id.'">Просмотреть</a>*/
        }
@endphp

@section('content')
<table class="table">
                <caption>&nbsp&nbsp<b><big>Список поломок</big></b></caption>
                <tr>
                    <thead  class="thead-light">
                        <th scope="col">Номер</th>
                        <th scope="col">Вещь и место</th>
                        <th scope="col">Описание</th>
                        <th scope="col">Время заявления</th>
                        <th scope="col">Кто закрыл</th>
                        <th scope="col">Когда закрыта</th>
                        <th scope="col">Действия</th>
                    </thead>
                </tr>
                @forelse($crashes as $crash)
                    <tr>
                        <th scope="row">{{ $crash->id }}</th>
                        <td>{{ $crash->thing }} <br> {{ $crash->loc }}</td>
                        <td>
                        @php
                            echo $crash->description;
                        @endphp
                        </td>
                        <td>{{ $crash->time }}</td>
                        <td>{{ $crash->who_closed }}</td>
                        <td>{{ $crash->when_closed }}</td>
                        <td>
                        @php
                            echo $crash->actions;
                        @endphp
                        </td>
                    </tr>
                @empty
                    <tr><td>Нет поломок</td></tr>
                @endforelse
        </table>
@endsection