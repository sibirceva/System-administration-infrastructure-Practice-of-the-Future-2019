@extends('layouts.app')

@php
use App\Type;
        foreach ($things as $thing)
        {
            $thing->type = Type::find($thing->type)->name;
            $thing->actions = '<a href="print_poster/'.$thing->id.'">Печать плаката</a> | <a href="edit/'.$thing->id.'">Редактировать</a> | <a href="delete/'.$thing->id.'">Удалить</a>';
        }
@endphp

@section('content')
<table class="table">
                <caption>&nbsp&nbsp<b><big>Список вещей</big></b></caption>
                <tr>
                    <thead  class="thead-light">
                        <th scope="col">Номер</th>
                        <th scope="col">Тип</th>
                        <th scope="col">Место</th>
                        <th scope="col">Действия</th>
                    </thead>
                </tr>
                @forelse($things as $thing)
                    <tr>
                        <th scope="row">{{ $thing->id }}</th>
                        <td>{{ $thing->type }}</td>
                        <td>{{ $thing->location }}</td>
                        <td>
                        @php
                            echo $thing->actions;
                        @endphp
                        </td>
                    </tr>
                @empty
                    <tr><td>Нет вещей</td></tr>
                @endforelse
        </table>
@endsection