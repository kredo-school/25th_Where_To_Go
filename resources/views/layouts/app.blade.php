<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Where To Go?</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> <!-- CSSファイルを読み込む -->
    <style>
        /* Additional CSS for styling */
        .header {
            background-color: #5aa8c5;
            padding: 20px;
            color: white;
        }

        .card img {
            height: 200px;
            object-fit: cover;
        }

        .social-icons i {
            font-size: 24px;
            margin: 0 10px;
        }
    </style>
</head>
<body>
    <header class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Where To Go?</a>
        <div class="ml-auto">
            <a href="#"><i class="fas fa-home"></i></a>
            <a href="#" class="ml-3"><i class="fas fa-user"></i></a>
            <a href="#" class="ml-3"><img src="path_to_flag_icon" alt="Language" /></a>
        </div>
    </header>

    @yield('content')

</body>
</html>
