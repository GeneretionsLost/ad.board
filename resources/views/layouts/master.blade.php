<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #cbd5e0;
        }

        * {
            box-sizing: content-box !important;
        }

        h1 {
            color: #FFFFFF;
        }

        .entry {

            color: white;
        }

        .header-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            height: 70px;
            width: auto;
            filter: invert(100%);
        }

        input[type="text"].search-input {
            font-size: 20px;
            margin: 30px auto;
            width: 820px;
            padding: 10px;

        }

        a {
            color: gray;
            font-family: "Segoe UI", sans-serif;
            text-decoration: none;
        }

        input[type="text"], textarea, input[type="password"] {
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin: auto;
            resize: none;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input[type="text"]:focus, textarea:focus {
            outline: none;
            border-color: #181340;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #181340;
            color: white;
            padding: 25px 20px;
            position: relative;
            height: 55px;

        }

        main {
            max-width: 90%;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            display: flex;
            justify-content: center;
        }

        .create {

            color: white;
        }

        .entry-create-container {
            display: flex;
            gap: 20px;
        }

        .banner {
            position: absolute; /* Абсолютное позиционирование */
            left: 50%; /* Сдвигаем к центру по горизонтали */
            transform: translateX(-50%); /* Центруем относительно собственной ширины */
            text-align: center;
        }

        .cards-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: flex-start;
            margin-top: 20px;
        }

        .card {
            width: 185px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            border: 1px solid #ccc;
        }

        .card-img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .card-title {
            font-size: 18px;
            margin-top: 10px;
            font-weight: bold;
        }

        .card-description {
            font-size: 14px;
            color: #555;
            margin: 10px 0;
        }

        .card-price {
            font-size: 16px;
            color: #333;
            font-weight: bold;
            margin: 10px 0;
        }

        .btn {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            font-size: 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

@include('partials.header')

@yield('content')

</body>
</html>