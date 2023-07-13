<aside class="bg-danger text-white">

<nav>
    <ul>
        {{-- <li><a href="{{ route('admin.home') }}">Dashboard</a></li> --}}
        <li><a href="{{ route('admin.restaurants.index') }}" class="nav-link text-white {{ Request::is('admin/restaurants') ? 'active' : '' }}">Dashboard</a></li>
    </ul>
</nav>

</aside>
