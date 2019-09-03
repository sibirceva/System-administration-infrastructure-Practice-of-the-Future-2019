@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="/crash/view">Список поломок</a></li>
                        <li class="list-group-item"><a href="/thing/view">Список вещей</a></li>
                        <li class="list-group-item"><a href="/thing/add">Добавить вещь</a></li>
                        <li class="list-group-item"><a href="/type/add">Добавить тип вещи</a></li>
                        <li class="list-group-item"><a href="/user/edit/1">Изменить адрес почты для уведомлений</a></li>
                        <li class="list-group-item"><a href="https://cs3-1v4.vkuseraudio.net/p21/2432be17092fd4.mp3?extra=RfsrEaMR0sZSAogOm_A_iwbtnlpwHCICifbaNMlO6imZKLatm44gebItk1SAEgRx8jWP0SBjAXwUmPFM-tCnP2ykJgSTvbUlJy0qIERlBiNPdQY2sZjT2pQ7opLHH99Mic7LGPZ0y24aRqupNU_TMlpxoeY">Выход</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
