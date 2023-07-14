<aside class="bg-danger text-white">

<nav>
    <ul>
        <li><a href="{{ route('admin.home') }}" class="nav-link text-white">Home</a></li>

        <li><a href="{{ route('admin.dishes.index') }}"> Dishes</a></li>
        <li><a href="{{ route('admin.dishes.create') }}"> Create Dishes</a></li>

        <li><a href="{{ route('admin.restaurants.index') }}" class="nav-link text-white {{ Request::is('admin/restaurants') ? 'active' : '' }}">Dashboard</a></li>
        <li><a href="{{ route('admin.restaurants.create') }}" class="nav-link text-white {{ Request::is('admin/restaurants/create') ? 'active' : '' }}">Nuovo ristorante</a></li>
    </ul>
</nav>

</aside>
