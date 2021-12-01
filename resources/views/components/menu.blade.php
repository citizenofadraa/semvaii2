<div class="topnav">
    <a href="/">Index</a>
    <a href="prehlad">Prehľad pravidiel</a>
    <a href="results">Výsledky jazdcov</a>
    <a href="teamresults">Výsledky tímov</a>
    @guest
    <a href="login" style="float:right">Login</a>
    <a href="register" style="float:right">Register</a>
    @endguest
    <div class="logoutForm">
        <form method="POST" action="{{ route('logout') }}">
            @csrf @auth<button id="banan" type="submit">Logout</button>
            <a style="float:right" href="update">{{Auth::user()->name}}</a>@endauth
        </form>
    </div>

</div>
