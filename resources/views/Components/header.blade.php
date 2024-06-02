<header>
    <div class="header-first">
        <i id="menu-icon" class=" fa-solid fa-bars"></i>
        <div class="user">HI,{{Auth::user()->name}}</div>
    </div>
    <div class="header-end">
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button class="btn btn-outline-danger">logout</button>
        </form>
    </div>
</header>
