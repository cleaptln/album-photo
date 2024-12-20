<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Album Photo</title>
    <link rel="stylesheet" href='{{env("APP_URL")}}/style.css' />
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

<header>

<div class="text-container">
    
    <div class="text-initial">
        <a href="{{route('index')}}"><i class='bx bx-photo-album' id="logo 2"></i><p><p>pictura</p></p></a>
    </div>
    
    <div class="text-hover">
        <a href="{{route('index')}}"><i class='bx bxs-photo-album' id="logo"></i><p>pictura</p></a>
    </div>
    
</div>

    <nav>


            <div class="text-container2">
            @auth
                <a href="{{route('userAlbums',['id'=>Auth::user()->id]) }}">Mes albums</a>
                
                Bonjour {{Auth::user()->name}}
                <a href="{{route('logout')}}"
                onclick="document.getElementById('logout').submit(); return false;">Logout</a> <!-- mettre un symbole logout-->
                <i class='bx bx-log-out' id="logo 2"></i>
                <form id="logout" action="{{route('logout')}}" method="post">
                @csrf
                </form>
            @else
            <div class="text-initial"><a href="{{route('register')}}"><i class='bx bx-user-circle' id="logo 2"></i></a></div>
            <div class="text-hover"><a href="{{route('register')}}"><i class='bx bxs-user-circle' id="logo"></i></a></div>
            @endauth
            </div>
    </nav>


</header>


<main>
@yield('contenu')
</main>

</body>
</html>