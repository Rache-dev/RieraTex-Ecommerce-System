<aside class="side-nav">
    <div class="logo">
        <img src="{{asset('img/Riera Tex (1).png')}}" alt="">
        ADMIN PANEL
    </div>

    <ul>
        <li>
            <a href="{{route('adminpanel')}}">Dashboard</a>
        </li>
        <li>
            <a href="{{route('adminpanel.products')}}">Products</a>
        </li>
        <li>
            <a href="{{route('adminpanel.categories')}}">Categories</a>
        </li>
        <li>
            <a href="{{route('adminpanel.colors')}}">Colors</a>
        </li>
        <li>
            <a href="{{route('adminpanel.orders')}}">Orders</a>
        </li>
    </ul>

    <div class="logout">
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button class="" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4m7 14l5-5l-5-5m5 5H9"/></svg>
            &nbsp; Log out
            </button>
        </form>
    </div>
</aside>