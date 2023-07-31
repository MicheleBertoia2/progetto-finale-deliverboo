<aside class=" text-dark  ">

    <nav>
        <ul>
            <li>
                <a  href="{{ route('admin.home') }}">
                    <i class="fa-solid fa-house"></i>
                    <span>Home</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.dishes.index') }}">
                    <i class="fa-solid fa-utensils"></i> <span>Elenco Piatti</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.dishes.create') }}">
                    <i class="fa-solid fa-folder-plus"></i> <span>Aggiungi un Piatto</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.orders.index') }}">
                    <i class="fa-solid fa-truck"></i> <span>Ordini</span>
                </a>
            </li>

        </ul>
    </nav>

    </aside>
