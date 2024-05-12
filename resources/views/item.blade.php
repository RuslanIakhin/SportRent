@extends('layouts.skeleton')

@section('title', 'Велосипеды - SportRent')

@section('body')

<div class="modal fade" id="rental" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <form action="{{ route('user_capabilities.rental', ['item' => $item->id]) }}" method="POST" onsubmit="ajaxForm(this, event)" id="rentalForm">
                <div class="modal-header">
                    <div class="modal-title text-rob-med-22" id="exampleModalLabel">Аренда</div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="text-rob-20"><strong>{{ $item->name }}</strong></div>
                    <div class="text-rob-20 mt-1"><strong>Цена: </strong>{{ $item->price }} ₽ в день</div>
                    <div class="text-rob-20 mt-1"><strong>Залог: </strong>{{ $item->deposit }} ₽</div>
                    <div class="text-rob-20 mt-1"><strong>Город: </strong>{{ $item->city }}</div>
                    @if ($count > 0)
                    <div class="text-rob-20 mt-1"><strong>Занят в следующие даты: </strong>
                        @foreach ($rentals as $r)
                        <div class="text-rob">{{ $r->start->format('d.m.Y') }} — {{ $r->end->format('d.m.Y') }}</div>
                        @endforeach
                    </div>
                    @endif
                    <div class="input-group mt-2">
                        <input type="date" class="form-control rounded-2 text-rob" name="date1" id="date1Input" placeholder="ФИО">
                        <span id="date1Error" class="invalid-feedback"></span>
                    </div>
                    <div class="input-group mt-2">
                        <input type="date" class="form-control rounded-2 text-rob" name="date2" id="date2Input" placeholder="ФИО">
                        <span id="date2Error" class="invalid-feedback"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-brandgreen text-rob">Войти</button>
                    <button type="button" class="btn btn-branddark text-rob" data-bs-dismiss="modal">Закрыть</button>
                </div>
            <!-- </form> -->
        </div>
    </div>
</div>

<div class="container margin_30">
    <p class="way"><a href="{{ route('user_capabilities.index') }}">Главная</a> / <a href="{{ route('user_capabilities.category', ['category_id' => $item->category_id]) }}">{{ $item->category->name }}</a> / {{ $item->name }}</p>

    <h1 class="title-page mt-3">{{ $item->name }}</h1>

    <div class="row mt-4">
        <div class="col-8">
            <img src="{{ asset($item->image) }}" class="item-img rounded-4" alt="">
            <h3 class="text-rob mt-4">Описание</h3>
            <p class="text-rob-20">
                {{ $item->description }}
            </p>
        </div>
        <div class="col-4">
            <div class="p-3 mb-2 bg-brandgrey text-dark">
                <h3 class="text-rob">Цена: {{ $item->price }} в день</h3>
                <h3 class="text-rob">Залог: {{ $item->deposit }} ₽</h3>
                <div class="text-rob-20 mt-2"><strong>Категория:</strong> {{ $item->category->name }}</div>
                <div class="text-rob-20 mt-1"><strong>Город:</strong> {{ $item->city }}</div>
                @if ($count > 0)
                <div class="text-rob-20 mt-1"><strong>Занят в следующие даты: </strong>
                    @foreach ($rentals as $r)
                    <div class="text-rob">{{ $r->start->format('d.m.Y') }} — {{ $r->end->format('d.m.Y') }}</div>
                    @endforeach
                </div>
                @endif
                <button type="button" data-bs-toggle="modal" data-bs-target="#rental" class="btn btn-brandgreen btn-card mt-3">
                    <div class="text-rob-20">Арендовать</div>
                </button>
            </div>
        </div>
    </div>
</div>

@endsection