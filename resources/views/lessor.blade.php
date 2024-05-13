@extends('layouts.skeleton')

@section('title', 'Арендодателям - SportRent')

@section('body')

<div class="container margin_30 mb-5">
    
    <p class="way"><a href="{{ route('user_capabilities.index') }}">Главная</a> / Арендодателям</p>
    
    <h1 class="title-page mt-3">Арендодателям</h1>
    
    <h2 class="text-rob-30 mt-4">1. Войти или зарегистрироватся</h2>
    <p class="text-rob-20 mt-2">
        Разместить свое объявление можно только в личном кабинете. Для получения доступа необходимо войти или зарегистрироваться на веб-сайте.
    </p>
    <img src="{{ asset('/img/lessor/1.png') }}" class="img-for-users rounded-2 border border-1 border-dark" alt="" width="1256">
    
    <h2 class="text-rob-30 mt-4">2. Войти в личный кабинет</h2>
    <p class="text-rob-20 mt-2">
        Для входа в личный кабинет нажмите на кнопку “Профиль” и выберите пункт “Личный кабинет”.
    </p>
    <img src="{{ asset('/img/lessor/2.png') }}" class="img-for-users rounded-2 border border-1 border-dark" alt="" width="1256">
    
    <h2 class="text-rob-30 mt-4">3. Выбрать банковскую карту для получения средств за аренду</h2>
    <p class="text-rob-20 mt-2">
        Для получения средств за аренду необходимо привязать банковскую карту к личному кабинету. В личном кабинете зайдите в пункт “Управление профилем”. 
    </p>
    <img src="{{ asset('/img/lessor/3-1.png') }}" class="img-for-users rounded-2 border border-1 border-dark" alt="" width="1256">
    <p class="text-rob-20 mt-2"> 
        В данном пункте имеется возможность изменять следующую информацию о своем профиле: ФИО, Email, номер телефона и пароль. Также можно добавлять или поменять банковскую карту, на которую будет перечисляться оплата за аренду. 
    </p>
    <img src="{{ asset('/img/lessor/3-2.png') }}" class="img-for-users rounded-2 border border-1 border-dark" alt="" width="1256">
    
    <div style="margin-left: 36px">
        <h2 class="text-rob-26 mt-4">3.1. Добавление банковской карты</h2>
        <p class="text-rob-20 mt-2">
            Нажмите на “Добавить карту”. 
        </p>
        <img src="{{ asset('/img/lessor/3-1-1.png') }}" class="img-for-users rounded-2 border border-1 border-dark" alt="" width="855">
        <p class="text-rob-20 mt-2">
            Откроется окно “Добавление банковской карты”. Заполните в нем следующие данные: номер банковской карты, имя на карте, срок действия и CVV (Специальный код на обратной стороне карты). Затем нажмите на кнопку “Добавить”. 
        </p>
        <img src="{{ asset('/img/lessor/3-1-2.png') }}" class="img-for-users rounded-2 border border-1 border-dark" alt="" width="561">
        <p class="text-rob-20 mt-2">
            После добавления карты её номер будет отображаться в вашем личном кабинете.
        </p>
        <img src="{{ asset('/img/lessor/3-1-3.png') }}" class="img-for-users rounded-2 border border-1 border-dark" alt="" width="1256">
        
        <h2 class="text-rob-26 mt-4">3.2. Замена банковской карты</h2>
        <p class="text-rob-20 mt-2">
            Нажмите на “Поменять карту”. 
        </p>
        <img src="{{ asset('/img/lessor/3-2-1.png') }}" class="img-for-users rounded-2 border border-1 border-dark" alt="" width="855">
        <p class="text-rob-20 mt-2">
            Откроется окно “Поменять банковскую карту”. Заполните в нем следующие данные: номер банковской карты, имя на карте, срок действия и CVV (Специальный код на обратной стороне карты). Затем нажмите на кнопку “Поменять”.
        </p>
        <img src="{{ asset('/img/lessor/3-2-2.png') }}" class="img-for-users rounded-2 border border-1 border-dark" alt="" width="551">
        <p class="text-rob-20 mt-2">
            После смены номер новой карты будет отображаться в вашем личном кабинете вместо старой.
        </p>
        <img src="{{ asset('/img/lessor/3-2-3.png') }}" class="img-for-users rounded-2 border border-1 border-dark" alt="" width="1256">
    </div>
    
    <h2 class="text-rob-30 mt-4">4. Разместить объявление</h2>
    <p class="text-rob-20 mt-2">
        В личном кабинете в пункте “Мои объявления” нажмите на кнопку “Разместить объявление”.
    </p>
    <img src="{{ asset('/img/lessor/4-1.png') }}" class="img-for-users rounded-2 border border-1 border-dark" alt="" width="1256">
    <p class="text-rob-20 mt-2">
        Откроется окно “Создать объявление”, в котором необходимо ввести информацию о спортивном инвентаре или СИМ (средство индивидуальной мобильности). Для этого нужно выбрать категорию предмета, загрузить его фотографию и заполнить следующие поля: название, цена за аренду, залог, город и описание.
    </p>
    <img src="{{ asset('/img/lessor/4-2.png') }}" class="img-for-users rounded-2 border border-1 border-dark" alt="" width="555">
    <p class="text-rob-20 mt-2">
        Созданные вами объявления будут отображаться в пункте “Мои объявления”.
    </p>
    
    <h2 class="text-rob-30 mt-4">5. Редактировать объявление</h2>
    <p class="text-rob-20 mt-2">
        В пункте “Мои объявления” можно удалить объявление, сделать его видимым или невидимым для пользоваетелей веб-сайта. Для этого необходимо найти нужное Вам объявление, нажать на кнопку “Редактировать” и выбрать опеарцию.
    </p>
    <img src="{{ asset('/img/lessor/5.png') }}" class="img-for-users rounded-2 border border-1 border-dark" alt="" width="1256">
    
    <h2 class="text-rob-30 mt-4">6. Принять заявку/отказаться от заявки</h2>
    <p class="text-rob-20 mt-2">
        После публикации объявления, пользователи веб-сайта смогут оставлять заявки на вашу аренду. Вам позвонит пользователь веб-сайта, заинтересованный в вашем объявлении, для обсуждения условий аренды, также в списке арендующих у вас появится заявка на аренду, помеченная надписью “Новая заявка”.
    </p>
    <img src="{{ asset('/img/lessor/6-1.png') }}" class="img-for-users rounded-2 border border-1 border-dark" alt="" width="1256">
    <p class="text-rob-20 mt-2">
        Для принятия или отказа от заявки нажмите на кнопку “Принять решение” и выберите нужное Вам действие.
    </p>
    <img src="{{ asset('/img/lessor/6-2.png') }}" class="img-for-users rounded-2 border border-1 border-dark" alt="" width="1256">
    
    <h2 class="text-rob-30 mt-4">7. Завершение аренды</h2>
    <p class="text-rob-20 mt-2">
        Для завершения аренды необходимо в выпадающем списке выбрать операцию “Завершить”. В случае возникновения спорной ситуации по поводу исправности инвентаря или СИМ (средства индивидуальной мобильности), возможно, открытие спора, который будет разрешен администратором веб-сайта. Для этого необходимо выбрать операцию “Открыть спор”.
    </p>
    <img src="{{ asset('/img/lessor/7.png') }}" class="img-for-users rounded-2 border border-1 border-dark" alt="" width="1256">
</div>

@endsection
