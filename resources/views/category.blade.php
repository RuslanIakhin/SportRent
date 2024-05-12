@extends('layouts.skeleton')

@section('title', 'Велосипеды - SportRent')

@section('body')

<div class="container margin_30">
    <p class="way"><a href="{{ route('user_capabilities.index') }}">Главная</a> / {{ $page->name }}</p>
    
    <h1 class="title-page mt-3">{{ $page->name }}</h1>
    
    <div class="row mt-3">
        <div class="col-3 mb-3">
            <select name="sort" class="form-select" aria-label="Сортировка" data-category="{{ request('category_id')->id}}">
                <option value="created_at">По новизне</option>
                <option value="price_asc">По возрастанию цены</option>
                <option value="price">По убыванию цены</option>
            </select>
        </div>
    </div>
    <div class="item_cards margin_150">
        @include('partials.item_card')
    </div>
</div>

@endsection