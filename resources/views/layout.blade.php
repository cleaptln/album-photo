<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Album Photo</title>
    <link rel="stylesheet" href='{{env("APP_URL")}}/css/style.css' />
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

<header>
    <nav>
        <a> Photos </a>
        <a> Albums </a>
    </nav>
    <i class='bx bxs-user'></i>


</header>


<main>
@yield('contenu')
</main>

</body>
</html>