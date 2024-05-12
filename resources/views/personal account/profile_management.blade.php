@extends('layouts.skeleton')

@section('title', 'Велосипеды - SportRent')

@section('body')

<div class="modal fade" id="advertisement" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title text-rob-med-22" id="exampleModalLabel">Создать объявление</div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <input type="text" class="form-control rounded-2 text-rob" name="name" id="nameInput" placeholder="Название">
                    <span id="nameError" class="invalid-feedback"></span>
                </div>
                <div class="input-group mb-3">
                    <select name="cat" id="catInput" class="form-select rounded-2 text-rob">
                        <option selected disabled>Выберите категорию</option>
                        <option value="Велосипеды">Велосипеды</option>
                    </select>
                    <div class="invalid-feedback" id="catError"></div>
                </div>
                <div class="input-group mb-3">
                    <input type="number" class="form-control rounded-2 text-rob" name="price" id="priceInput" placeholder="Цена за аренду">
                    <span id="priceError" class="invalid-feedback"></span>
                </div>
                <div class="input-group mb-3">
                    <input type="number" class="form-control rounded-2 text-rob" name="deposit" id="depositInput" placeholder="Залог">
                    <span id="depositError" class="invalid-feedback"></span>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control rounded-2 text-rob" name="city" id="cityInput" placeholder="Город">
                    <span id="cityError" class="invalid-feedback"></span>
                </div>
                <div class="input-group mb-3">
                    <textarea name="desc" cols="30" rows="2" placeholder="Описание" id="descInput" class="form-control rounded-2 text-rob"></textarea><br>
                    <div class="invalid-feedback" id="descError"></div>
                </div>
                <label class="form-label text-rob-18" for="imgInput">Фотография</label>
                <div class="input-group mb-1">
                    <input type="file" class="form-control rounded-2 text-rob" name="img" id="imgInput" placeholder="Фото"><br>
                    <div class="invalid-feedback" id="imgError"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-brandgreen text-rob">Создать</button>
                <button type="button" class="btn btn-branddark text-rob" data-bs-dismiss="modal">Закрыть</button>
            </div>    
        </div>
    </div>
</div>

<div class="container profile margin_30">
    <div class="row">
        <div class="col-4">
            <div class="bg-brandgrey p-3 text-dark  margin_150">
                <h1 class="title-page">Личный кабинет</h1>
                <div class="text-rob-20 mt-2"><strong>Пользователь: </strong>{{ $user->fio }}</div>
                <div class="text-rob-20 mt-1"><strong>Email: </strong>{{ $user->email }}</div>
                <div class="text-rob-20 mt-1"><strong>Номер телефона: </strong>{{ $user->phone_number }}</div>
                <div class="text-rob-20 mt-1"><strong>Номер банковской карты:</strong></div>
                <div class="text-rob-20">8456 6873 1378 6127</div>
                <hr>
                <div class="mt-2"><a href="{{ route('user_capabilities.profile') }}" class="text-rob-20 text-brandblue text-decoration-none">Мои объявления</a></div>
                <div class="mt-1"><a href="{{ route('user_capabilities.list_of_tenants') }}" class="text-rob-20 text-brandblue text-decoration-none">Список арендующих</a></div>
                <div class="mt-1"><a href="{{ route('user_capabilities.my_rent') }}" class="text-rob-20 text-brandblue text-decoration-none">Моя аренда</a></div>
                <div class="mt-1"><a href="{{ route('user_capabilities.active_rental') }}" class="text-rob-20 text-brandblue text-decoration-none">Активная (оплаченная) аренда</a></div>
                {{-- <div class="mt-1"><a href="{{ route('user_capabilities.сompleted_lease') }}" class="text-rob-20 text-brandblue text-decoration-none">Завершенная аренда</a></div> --}}
                <div class="text-rob-20 mt-1"><strong>Управление профилем</strong></div>
            </div>
        </div>
        <div class="col-8">
            <h1 class="title-page pt-3">Управление профилем</h1>
            
            <table class="table table-borderless text-rob-20 ms-0">
                <tbody>
                    <tr>
                        <th scope="row">ФИО</th>
                        <td>{{ $user->fio }}</td>
                        <td class="text-end"><button class="list-button text-brandblue">Изменить</button></td>
                    </tr>
                    <tr>
                        <th scope="row">Email</th>
                        <td>{{ $user->email }}</td>
                        <td class="text-end"><button class="list-button text-brandblue">Изменить</button></td>
                    </tr>
                    <tr>
                        <th scope="row">Номер телефона</th>
                        <td>{{ $user->phone_number }}</td>
                        <td class="text-end"><button class="list-button text-brandblue">Изменить</button></td>
                    </tr>
                    <tr>
                        <th scope="row">Номер банковской карты</th>
                        <td>8456 6873 1378 6127</td>
                        <td class="text-end"><button class="list-button text-brandblue">Поменять карту</button></td>
                    </tr>
                    <tr>
                        <td><button class="list-button text-brandblue text-rob-20">Изменить пароль</button></th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection