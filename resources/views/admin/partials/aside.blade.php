<aside class="bg-danger text-white">

<nav>
    <ul>
        {{-- <li><a href="{{ route('admin.home') }}" class="nav-link text-white {{ Request::is('admin/') ? 'active' : '' }}">Home</a></li> --}}
        <li class="nav-item">
            <a href="{{ url('admin') }}" class="nav-link text-white {{ Request::is('admin') ? 'active' : '' }}" aria-current="page">
                <i class="fa-solid fa-house me-1"></i>Home
            </a>
        </li>
        <li>
            <a href="{{ route('admin.dishes.index') }}" class="nav-link text-white {{ Request::is('admin/dishes') ? 'active' : '' }}">
                <i class="fa-solid fa-chart-line me-1"></i>Piatti</a>
        </li>
        <li>
            <a href="{{ route('admin.restaurants.index') }}" class="nav-link text-white {{ Request::is('admin/restaurants') ? 'active' : '' }}">
                <i class="fa-solid fa-chart-line me-1"></i>Ristoranti</a>
        </li>
        <li>
            <a href="{{ route('admin.dishes.create') }}" class="nav-link text-white {{ Request::is('admin/dishes/create') ? 'active' : '' }}">
                <i class="fa-solid fa-plus me-1"></i>Aggiungi Piatto</a>
        </li>
        <li>
            <a href="{{ route('admin.restaurants.create') }}" class="nav-link text-white {{ Request::is('admin/restaurants/create') ? 'active' : '' }}">
                <i class="fa-solid fa-plus me-1"></i>Aggiungi Ristorante</a>
        </li>

    </ul>
</nav>

</aside>
