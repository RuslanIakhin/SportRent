<div class="modal fade" id="authorization" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('user_capabilities.login') }}" method="post" onsubmit="ajaxForm(this, event)" id="authForm">
            @csrf
                <div class="modal-header">
                    <div class="modal-title text-rob-med-22" id="exampleModalLabel">Вход <button type="button" class="mdl-reg-auth" data-bs-target="#registration" data-bs-toggle="modal">/ Регистрация</button></div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input type="emailAuth" class="form-control rounded-2 text-rob" name="email" id="emailAuthInput" placeholder="Email">
                        <span id="emailError" class="invalid-feedback"></span>
                    </div>
                    <div class="input-group mb-1">
                        <input type="password" class="form-control rounded-2 text-rob" name="password" id="passInput" placeholder="Пароль">
                        <span id="passwordError" class="invalid-feedback"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-brandgreen text-rob">Войти</button>
                    <button type="button" class="btn btn-branddark text-rob" data-bs-dismiss="modal">Закрыть</button>
                </div>    
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="registration" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('user_capabilities.register') }}" method="POST" onsubmit="ajaxForm(this, event)" id="registerForm">
                <div class="modal-header">
                @csrf
                    <div class="modal-title text-rob-med-22" id="exampleModalLabel"><button type="button" class="mdl-reg-auth" data-bs-target="#authorization" data-bs-toggle="modal">Вход /</button> Регистрация</div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control rounded-2 text-rob" name="fio" id="fioInput" placeholder="ФИО">
                        <span id="fioError" class="invalid-feedback"></span>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control rounded-2 text-rob" name="email" id="emailInput" placeholder="Email">
                        <span id="emailError" class="invalid-feedback"></span>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control rounded-2 text-rob phoneInputMask" name="phone_number" id="phone_numberInput" placeholder="Номер телефона"/>
                        <span id="phone_numberError" class="invalid-feedback"></span>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control rounded-2 text-rob" name="password" id="pass1Input" placeholder="Пароль">
                        <span id="passwordError" class="invalid-feedback"></span>
                    </div>
                    <div class="input-group mb-1">
                        <input type="password" class="form-control rounded-2 text-rob" name="password_confirmation" id="pass2Input" placeholder="Повторите пароль">
                        <span id="password_confirmationError" class="invalid-feedback"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-brandgreen text-rob">Зарегистрироваться</button>
                    <button type="button" class="btn btn-branddark text-rob" data-bs-dismiss="modal">Закрыть</button>
                </div>    
            </form>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg p-3 position-fixed w-100" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('user_capabilities.index') }}">
            <img class="logo" src="{{ asset('/img/logo/Лого SportRent (black bg V2).png') }}" alt="Логотип SportRent">
        </a>
        <button id="down" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item me-5">
                    <a class="nav-link text-white" href="{{ route('user_capabilities.index') }}">Главная</a>
                </li>
                <li class="nav-item dropdown me-5">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Категории
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $c)
                        <li><a class="dropdown-item" href="{{ route('user_capabilities.category', ['category_id' => $c->id]) }}"><div class="text-rob text-white">{{ $c->name }}</div></a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Пользователям
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('user_capabilities.lessor') }}"><div class="text-rob text-white">Арендодателям</div></a></li>
                        <li><a class="dropdown-item" href="{{ route('user_capabilities.tenant') }}"><div class="text-rob text-white">Арендующим</div></a></li>
                    </ul>
                </li>
            </ul>
            @auth
            @if (Auth::user()->status == 'Администратор')
            <div class="btn-group">
                <button type="button" class="btn btn-outline-brandgreen dropdown-toggle text-rob-18" data-bs-toggle="dropdown" aria-expanded="false">Администрация</button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item text-rob text-white" href="{{ route('admin.control_panel') }}">Панель управления сайтом</a></li>
                    <li><a class="dropdown-item text-rob text-white" href="{{ route('user_capabilities.logout') }}">Выйти</a></li>
                </ul>
            </div>
            @else
            <div class="btn-group">
                <button type="button" class="btn btn-outline-brandgreen dropdown-toggle text-rob-18" data-bs-toggle="dropdown" aria-expanded="false">Профиль</button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item text-rob text-white" href="{{ route('user_capabilities.profile') }}">Личный кабинет</a></li>
                    <li><a class="dropdown-item text-rob text-white" href="{{ route('user_capabilities.logout') }}">Выйти</a></li>
                </ul>
            </div>
            @endif   
            @else
            <button type="button" class="btn btn-outline-brandblue text-rob-18" data-bs-toggle="modal" data-bs-target="#authorization">Вход/Регистрация</button>
            @endauth
        </div>
    </div>
</nav>