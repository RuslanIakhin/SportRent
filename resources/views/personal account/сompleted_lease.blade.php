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
            <div class="bg-brandgrey p-3 text-dark">
                <h1 class="title-page">Личный кабинет</h1>
                <div class="text-rob-20 mt-2"><strong>Пользователь: </strong>Яхин Руслан Артурович</div>
                <div class="text-rob-20 mt-1"><strong>Email: </strong>rusufa.ia@gmail.con</div>
                <div class="text-rob-20 mt-1"><strong>Номер телефона: </strong>+7 (347) 100-20-20</div>
                <div class="text-rob-20 mt-1"><strong>Номер банковской карты:</strong></div>
                <div class="text-rob-20">8456 6873 1378 6127</div>
                <hr>
                <div class="mt-2"><a href="{{ route('user_capabilities.profile') }}" class="text-rob-20 text-brandblue text-decoration-none">Мои объявления</a></div>
                <div class="mt-1"><a href="{{ route('user_capabilities.list_of_tenants') }}" class="text-rob-20 text-brandblue text-decoration-none">Список арендующих</a></div>
                <div class="mt-1"><a href="{{ route('user_capabilities.my_rent') }}" class="text-rob-20 text-brandblue text-decoration-none">Моя аренда</a></div>
                <div class="mt-1"><a href="{{ route('user_capabilities.active_rental') }}" class="text-rob-20 text-brandblue text-decoration-none">Активная (оплаченная) аренда</a></div>
                <div class="text-rob-20 mt-1"><strong>Завершенная аренда</strong></div>
                <div class="mt-1"><a href="{{ route('user_capabilities.profile_management') }}" class="text-rob-20 text-brandblue text-decoration-none">Управление профилем</a></div>
            </div>
        </div>
        <div class="col-8">
            <h1 class="title-page pt-3">Завершенная аренда</h1>
            
            <div class="item_cards_hor mt-4">
                <div class="card border-0 rounded-2 mb-2">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <a href="" class="text-decoration-none text-dark">
                                <img src="/img/test/vel2.jpg" class="img-fluid rounded-start rounded-2" alt="...">
                            </a>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body py-1 px-3">
                                <a href="" class="text-decoration-none text-dark">
                                    <div class="name text-rob-20"><strong>Велосипед горныйfsdafdasfdasfadsfasdf 27,5 RX705 DISC ST 21ск RUSH HOUR</strong></div>
                                    <div class="text-rob-20"><strong>Цена:</strong> 1 000 ₽ в день</div>
                                    <div class="text-rob-20"><strong>Залог:</strong> 5 000 ₽</div>
                                    <div class="text-rob-18"><strong>Город:</strong> Москва</div> 
                                    <div class="text-rob-18"><strong>Даты аренды:</strong> 6.06.2023 - 12.06.2023</div> 
                                </a>
                                <div class="text-end">
                                    <button type="button" class="btn btn-brandgreen text-rob-18" data-bs-dismiss="modal" style="visibility: visible">Данные об аренде</button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection