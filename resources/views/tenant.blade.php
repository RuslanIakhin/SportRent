@extends('layouts.skeleton')

@section('title', 'Арендующим - SportRent')

@section('body')

<div class="container margin_30 mb-5">
    
    <p class="way"><a href="{{ route('user_capabilities.index') }}">Главная</a> / Арендующим</p>
    
    <h1 class="title-page mt-3">Арендующим</h1>
    
    <h2 class="text-rob-30 mt-4">1. Войти или зарегистрироватся</h2>
    <p class="text-rob-20 mt-2">
        Арендовать спортивный инвентарь или СИМ (Средство индивидуальной мобильности) возможно только после регистрации на веб-сайте или авторизации  в личном кабинете.
    </p>
    <img src="{{ asset('/img/tenant/1.png') }}" class="img-for-users rounded-2 border border-1 border-dark" alt="" width="1256">
    
    <h2 class="text-rob-30 mt-4">2. Оставить заявку на аренду</h2>
    <p class="text-rob-20 mt-2">
        Оставить заявку на аренду можно на главной странице, в категориях и непосредственно на странице просмотра спортивного инвентаря или СИМ.
    </p>
    <img src="{{ asset('/img/tenant/2-1.png') }}" class="img-for-users rounded-2 border border-1 border-dark" alt="" width="1256">
    <img src="{{ asset('/img/tenant/2-2.png') }}" class="img-for-users rounded-2 border border-1 border-dark mt-3" alt="" width="1256">
    <img src="{{ asset('/img/tenant/2-3.png') }}" class="img-for-users rounded-2 border border-1 border-dark mt-3" alt="" width="1256">
    <p class="text-rob-20 mt-2">
        При нажатии на кнопку “Арендовать” открывается окно “Аренда”, в которое необходимо указать даты начала и конца аренды, затем нажать на кнопку “Арендовать”.
    </p>
    <img src="{{ asset('/img/tenant/2-4.png') }}" class="img-for-users rounded-2 border border-1 border-dark" alt="" width="558">
    <p class="text-rob-20 mt-2">
        После отправки заявки на странице выбранного инвентаря или СИМ Вы получаете доступ к ФИО и номеру телефона арендодателя для связи. 
    </p>
    <img src="{{ asset('/img/tenant/2-5.png') }}" class="img-for-users rounded-2 border border-1 border-dark" alt="" width="1256">
    
    <h2 class="text-rob-30 mt-4">3. Войти в личный кабинет</h2>
    <p class="text-rob-20 mt-2">
        Для входа в личный кабинет нажмите на кнопку “Профиль” и выберите пункт “Личный кабинет”.
    </p>
    <img src="{{ asset('/img/tenant/3.png') }}" class="img-for-users rounded-2 border border-1 border-dark" alt="" width="1256">
    
    <h2 class="text-rob-30 mt-4">4. Оплатить аренду и удалить заявку</h2>
    <p class="text-rob-20 mt-2">
        В личном кабинете в пункте “Мои аренды” есть возможность управления вашими заявками.
    </p>
    <img src="{{ asset('/img/tenant/4-1.png') }}" class="img-for-users rounded-2 border border-1 border-dark" alt="" width="1256">
    <p class="text-rob-20 mt-2">
        В случае подтвеждения Вашей заявки арендодателем будет открыта возможность оплатить аренду в выпадающем списке под кнопкой “Выбрать действие”. В случае отказа Вы сможете удалить заявку. Также имеется возможность просмотреть данные о заявке
    </p>
    <img src="{{ asset('/img/tenant/4-2.png') }}" class="img-for-users rounded-2 border border-1 border-dark" alt="" width="1256">
    
    <h2 class="text-rob-30 mt-4">5. Завершить аренду и открыть спор</h2>
    <p class="text-rob-20 mt-2">
        Также в личном кабинете Вы можете управлять действующими или завершенными арендами в пункте “Активная (оплаченная) аренда”.
    </p>
    <img src="{{ asset('/img/tenant/5-1.png') }}" class="img-for-users rounded-2 border border-1 border-dark" alt="" width="1256">
    <p class="text-rob-20 mt-2">
        После нажатия кнопки “Выбрать операцию” Вы можете просмотреть данные о текущей аренде. Для завершения аренды необходимо в выпадающем списке выбрать операцию “Завершить”. В случае возникновения спорной ситуации по поводу исправности инвентаря или СИМ, возможно, открытие спора, который будет разрешен администратором веб-сайта. Для этого необходимо выбрать операцию “Открыть спор”.
    </p>
    <img src="{{ asset('/img/tenant/5-2.png') }}" class="img-for-users rounded-2 border border-1 border-dark" alt="" width="1256">
    
    <h2 class="text-rob-30 mt-4">6. Просмотреть информацию о завершенной аренде</h2>
    <p class="text-rob-20 mt-2">
        В пункте личного кабинета “Завершенная аренда” хранится история ранее выполненых аренд для удобства повторной аренды, если инвентарь или СИМ Вам понравился. Для просмотра более подробной информации об аренде есть кнопка “Данные об аренде”.
    </p>
    <img src="{{ asset('/img/tenant/6-1.png') }}" class="img-for-users rounded-2 border border-1 border-dark" alt="" width="1256">
    <p class="text-rob-20 mt-2">
        При клике на кнопку открывается окно с подробной информацией об аренде.
    </p>
    <img src="{{ asset('/img/tenant/6-2.png') }}" class="img-for-users rounded-2 border border-1 border-dark" alt="" width="523">
</div>

@endsection
