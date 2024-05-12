@extends('layouts.skeleton')

@section('title', 'Велосипеды - SportRent')

@section('body')

<div class="modal fade" id="advertisement" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <form action="{{ route('user_capabilities.create_ad') }}" method="POST" id="create_adForm" enctype="multipart/form-data">
                @csrf
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
                            @foreach ($categories as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
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
                        <input type="file" class="form-control rounded-2 text-rob" name="img" id="imgInput" placeholder="Фото" accept="image/*"><br>
                        <div class="invalid-feedback" id="imgError"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-brandgreen text-rob">Создать</button>
                    <button type="button" class="btn btn-branddark text-rob" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </form>    
        </div>
    </div>
</div>

<div class="container profile margin_30">
    <div class="row">
        <div class="col-4">
            <div class="bg-brandgrey info p-3 text-dark">
                <h1 class="title-page">Личный кабинет</h1>
                <div class="text-rob-20 mt-2"><strong>Пользователь: </strong>{{ $user->fio }}</div>
                <div class="text-rob-20 mt-1"><strong>Email: </strong>{{ $user->email }}</div>
                <div class="text-rob-20 mt-1"><strong>Номер телефона: </strong>{{ $user->phone_number }}</div>
                <div class="text-rob-20 mt-1"><strong>Номер банковской карты:</strong></div>
                <div class="text-rob-20">8456 6873 1378 6127</div>
                <hr>
                <div class="text-rob-20 mt-2"><strong>Мои объявления</strong></div>
                <div class="mt-1"><a href="{{ route('user_capabilities.list_of_tenants') }}" class="text-rob-20 text-brandblue text-decoration-none">Список арендующих</a></div>
                <div class="mt-1"><a href="{{ route('user_capabilities.my_rent') }}" class="text-rob-20 text-brandblue text-decoration-none">Моя аренда</a></div>
                <div class="mt-1"><a href="{{ route('user_capabilities.active_rental') }}" class="text-rob-20 text-brandblue text-decoration-none">Активная (оплаченная) аренда</a></div>
                {{-- <div class="mt-1"><a href="{{ route('user_capabilities.сompleted_lease') }}" class="text-rob-20 text-brandblue text-decoration-none">Завершенная аренда</a></div> --}}
                <div class="mt-1"><a href="{{ route('user_capabilities.profile_management') }}" class="text-rob-20 text-brandblue text-decoration-none">Управление профилем</a></div>
            </div>
        </div>
        <div class="col-8">
            
                <h1 class="title-page pt-3">Мои объявления</h1>
            @if ($count > 0)
                <button type="button" data-bs-toggle="modal" data-bs-target="#advertisement" class="btn btn-brandgreen text-rob-18 mt-2">Разместить объявление</button>
            @endif
            
            
            <div class="item_cards_hor mt-4">
                @forelse ($items as $i)
                <div class="card border-0 rounded-2 mb-2">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <a href="" class="text-decoration-none text-dark">
                                <img src="{{ $i->image }}" class="img-fluid rounded-start rounded-2" alt="...">
                            </a>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body py-1 px-3">
                                <a href="" class="text-decoration-none text-dark">
                                    <br><div class="name text-rob-20"><strong>{{ $i->name }}</strong></div>
                                    <div class="text-rob-20"><strong>Цена:</strong> {{ $i->price }} ₽ в день</div>
                                    <div class="text-rob-20"><strong>Залог:</strong> {{ $i->deposit }} ₽</div>
                                    <div class="text-rob-18"><strong>Категория:</strong> {{ $i->category->name }}</div>
                                    <div class="text-rob-18"><strong>Город:</strong> {{ $i->city }}</div> 
                                </a>
                                <div class="row">
                                    <div class="col-8">
                                        <a href="">
                                            <strong class="text-rob-18 text-dark" style="display:inline-block">Статус: 
                                                @if ( $i->status == 'Видимый' )
                                                <strong class="text-success" style="display:inline-block">видимый</strong> </strong>
                                                @else
                                                <strong class="text-danger" style="display:inline-block">невидимый</strong> </strong>
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-brandblue text-white dropdown-toggle text-rob-18" data-bs-toggle="dropdown" aria-expanded="false" style="visibility: visible">Редактировать</button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item text-rob" href="{{ route('user_capabilities.changeStatus', ['id' => $i->id]) }}">
                                                        @if ( $i->status == 'Видимый' )
                                                        Сделать невидимым
                                                        @else
                                                        Сделать видимым
                                                        @endif
                                                    </a></li>
                                                    <li><a class="dropdown-item text-rob" href="{{ route('user_capabilities.deleteItem', ['id' => $i->id]) }}">Удалить</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="text-rob-20">Вы пока не размещали объявление.</p>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#advertisement" class="btn btn-brandgreen text-rob-18 mt-2">Разместить объявление</button>
                    @endforelse
                    <div class="card border-0 rounded-2 mb-2">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <a href="" class="text-decoration-none text-dark">
                                    <img src="/img/test/vel2.jpg" class="img-fluid rounded-start rounded-2" alt="...">
                                </a>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body py-1 px-3">
                                    <a href="" class="text-decoration-none text-dark"><br>
                                        <div class="name text-rob-20"><strong>Велосипед RX705 DISC ST 21ск RUSH HOUR</strong></div>
                                        <div class="text-rob-20"><strong>Цена:</strong> 1 200 ₽ в день</div>
                                        <div class="text-rob-18"><strong>Арендующий:</strong> Ярулин Максим Маратович</div>
                                        <div class="text-rob-18"><strong>Номер телефона арендующего:</strong> +7 (486) 100-25-20</div>
                                        <div class="text-rob-18"><strong>Даты аренды:</strong> 6.06.2023 - 12.06.2023</div> 
                                    </a>
                                    <div class="text-end">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-brandblue text-white dropdown-toggle text-rob-18" data-bs-toggle="dropdown" aria-expanded="false" style="visibility: visible">Выбрать операцию</button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item text-rob" href="#">Открыть спор</a></li>
                                                <li><a class="dropdown-item text-rob" href="#">Завершить</a></li>
                                            </ul>
                                        </div>   
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card border-0 rounded-2 mb-2">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <a href="" class="text-decoration-none text-dark">
                                    <img src="/img/test/f832ba120bf73c2fd18ac2bacf553bb5.jpg" class="img-fluid rounded-start rounded-2" alt="...">
                                </a>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body py-1 px-3">
                                    <a href="" class="text-decoration-none text-dark"><br>
                                        <div class="name text-rob-20"><strong>Велосипед горный 27,5 RX705 DISC ST 21ск RUSH HOUR</strong></div>
                                        <div class="text-rob-20"><strong>Цена:</strong> 1 820 ₽ в день</div>
                                        <div class="text-rob-18"><strong>Арендующий:</strong> Ярулин Максим Маратович</div>
                                        <div class="text-rob-18"><strong>Номер телефона арендующего:</strong> +7 (347) 186-20-20</div>
                                        <div class="text-rob-18"><strong>Даты аренды:</strong> 6.06.2023 - 12.06.2023</div> 
                                    </a>
                                    <div class="row">
                                        <div class="col-7">
                                            <a href="" class="text-decoration-none">
                                                <strong class="text-rob-18 text-success">Новая заявка</strong>
                                            </a>
                                        </div>
                                        <div class="col-5 text-end">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-brandblue text-white dropdown-toggle text-rob-18" data-bs-toggle="dropdown" aria-expanded="false" style="visibility: visible">Принять решение</button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item text-rob" href="#">Согласиться</a></li>
                                                    <li><a class="dropdown-item text-rob" href="#">Отказаться</a></li>
                                                </ul>
                                            </div>   
                                        </div>
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