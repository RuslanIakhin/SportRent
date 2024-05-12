<main class="d-flex flex-nowrap">
    <h1 class="visually-hidden">Sidebars examples</h1>
    
    <div id="admin-header" class="d-flex flex-column flex-shrink-0 p-3 bg-branddark">
        <a href="{{ route('user_capabilities.index') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis">
            <img width="100%" src="{{ asset('/img/logo/Лого SportRent (black bg V2).png') }}" alt="Логотип SportRent">
        </a>
        <hr>
        @yield('header')
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle text-white text-rob" data-bs-toggle="dropdown" aria-expanded="false">
                <strong>Рыбачук Артур Ядкарович</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li><a class="dropdown-item text-white text-rob" href="{{ route('user_capabilities.index') }}">На главную</a></li>
                <li><a class="dropdown-item text-white text-rob" href="#">Выйти</a></li>
            </ul>
        </div>
    </div>
    <div class="b-example-divider b-example-vr"></div>
    
</main>