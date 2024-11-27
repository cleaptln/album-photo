<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Album Photo</title>
    <link rel="stylesheet" href='{{env("APP_URL")}}/public/css/style.css' />
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

<header>
    <nav>
        <a href="{{route('index')}}"> Accueil </a>
        <a href="{{route('photos')}}"> Photos </a>
        <a href="{{route('albums')}}"> Albums </a>
    </nav>


</header>


<main>
@yield('contenu')
</main>

</body>
</html>