@extends('layouts.app')

@php

        foreach ($types as $type)
        {
            $type->often_crashes = '- ' . str_replace('; ','<br> - ', $type->often_crashes);
            $type->actions = '<a href="things/'.$type->id.'">Просмотреть все вещи этого типа</a> | <a href="edit/'.$type->id.'">Редактировать</a> | <a href="delete/'.$type->id.'">Удалить</a>';
        }
@endphp

@section('content')
<table class="table">
                <caption>&nbsp&nbsp<b><big>Список типов вещей</big></b></caption>
                <tr>
                    <thead  class="thead-light">
                        <th scope="col">Номер</th>
                        <th scope="col">Название</th>
                        <th scope="col">Частые поломки</th>
                        <th scope="col">Действия</th>
                    </thead>
                </tr>
                @forelse($types as $type)
                    <tr>
                        <th scope="row">{{ $type->id }}</th>
                        <td>{{ $type->name }}</td>
                        <td>@php
                            echo $type->often_crashes;
                        @endphp
                        </td>
                        <td>
                        @php
                            echo $type->actions;
                        @endphp
                        </td>
                    </tr>
                @empty
                    <tr><td>Нет типов вещей</td></tr>
                @endforelse
        </table>
@endsection