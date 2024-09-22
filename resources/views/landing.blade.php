<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Andis Futsal - Booking Sekarang!</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            color: white;
        }

        .bg {
            background-image: url('images/background-futsal.png');
            background-size: cover;
            background-position: center;
            position: relative;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .content {
            position: relative;
            z-index: 2;
            text-align: center;
            padding: 20px;
        }

        .content img {
            width: 200px;
            margin-bottom: 20px;
        }

        .content h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .content p {
            margin-bottom: 10px;
        }

        .address {
            font-size: 1.25rem;
            color: #dcdcdc;
            margin-bottom: 20px;
        }
        .ayo{
            padding-top: 30px;
            
        }

        .btn-book {
            background-color: #28a745;
            color: white;
            font-size: 1rem;
            font-weight: bold;
            padding: 10px 25px;
            border-radius: 50px;
            transition: background-color 0.3s;
            border: none;
            text-decoration: none;
        }

        .btn-book:hover {
            background-color: #218838;
        }

        /* Remove button underline */
        .btn-book {
            text-decoration: none;
        }

        @media (max-width: 768px) {
            .content h1 {
                font-size: 2.5rem;
            }

            .content img {
                width: 150px;
            }
        }
    </style>
</head>
<body>

    <div class="bg">
        <div class="content">
            <!-- Logo -->
            <img src="{{ asset('images/logo.png') }}" alt="Andis Futsal">
            
            <!-- Heading -->
            <h1>Andi's Futsal</h1>
            <p class="address">Panam (Jl. Kamboja), Pekanbaru, Riau, Indonesia</p>
            <p class="ayo">Ayo Booking Sekarang</p>

            <!-- Button -->
            <a href="{{ route('login') }}" class="btn btn-book mt-2">Login untuk Booking</a>
            
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
