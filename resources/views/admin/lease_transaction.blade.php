@extends('layouts.skeleton_admin')

@section('title', 'Панель управления сайтом - SportRent')

@section('header')
<ul class="nav nav-pills flex-column mb-auto twxt-white text-rob-18">
    <li class="nav-item">
        <a href="{{ route('admin.control_panel') }}" class="nav-link text-white">
            Зарегистрированные пользователи
        </a>
    </li>
    <li>
        <a href="{{ route('admin.ads') }}" class="nav-link text-white">
            Объявления сдачи в аренду
        </a>
    </li>
    <li>
        <div class="nav-link active bg-brandgreen text-dark" aria-current="page">
            Текущие сделки аренды
        </div>
    </li>
    <li>
        <a href="{{ route('admin.controversial_situations') }}" class="nav-link text-white">
            <div class="row">
                <div class="col-10">
                    Спорные ситуации
                </div>
                <div class="col-2">
                    <div class="badge bg-brandred text-rob-18 px-2">0</div>
                </div>
            </div>     
        </a>
    </li>
</ul>
@endsection

@section('body')
<h1 class="title-page mt-3">Текущие сделки аренды</h1>
<div class="input-group mt-3" style="width: 405px">
    <input type="search" class="form-control " placeholder="Поиск">
    <button class="btn btn-brandblue px-4 text-white" type="button" id="button-addon2">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg>
    </button>
</div>
<table class="table table-striped mt-3 text-rob-20 align-middle">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Название</th>
            <th scope="col">Арендодатель</th>
            <th scope="col">Арендующий</th>
            <th scope="col">Даты аренды</th>
            <th scope="col">Город</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <tr>
            <td>12</td>
            <td>Велосипед горный Stern Energy 1.0 26"</td>
            <td>Рыбачук Артур Ядкарович</td>
            <td>Рыбачук Артур Ядкарович</td>
            <td>6.06.2023 - 12.06.2023</td>
            <td>Санкт-Петербург</td>
            <td><button type="button" class="btn btn-brandgreen text-center text-rob-18"><strong>Данные о ситуации</strong></button></td>
        </tr>
    </tbody>
@endsection