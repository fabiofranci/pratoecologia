<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $page->nome ?? 'Prato Ecologia' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/7077614094.js" crossorigin="anonymous"></script>

    <style>
        body {
            background: #f5f5f5;
        }

        .hero {
            text-align: center;
            padding: 20px;
        }

        .hero img {
            max-width: 100%;
            height: auto;
        }

        .offerta {
            font-size: 22px;
            font-weight: 500;
            text-align: center;
            margin-top: 20px;
        }

        .offerta strong {
            color: red;
            font-weight: bold;
        }

        .btn-custom {
            width: 100%;
            font-size: 18px;
            padding: 15px;
            margin: 10px 0;
        }
    </style>
</head>

<body>

<div class="container">

    {{-- LOGO --}}
    <div class="hero">
        <img src="/PratoEcologiaLogo.png" alt="Prato Ecologia">
    </div>

    {{-- OFFERTA --}}
    <div class="offerta">

        @if($offers->count())
            <h3>{!! $offers->first()->descrizione !!}</h3>
        @else
            <p>Nessuna offerta attiva</p>
        @endif

    </div>

    {{-- BOTTONI --}}
    <div class="row mt-4">

        <div class="col-12 col-md-6">
            <a href="tel:0574603681" class="btn btn-warning btn-custom">
                <i class="fa fa-phone"></i> CHIAMACI
            </a>
        </div>

        <div class="col-12 col-md-6">
            <a href="https://wa.me/393281792408" class="btn btn-success btn-custom">
                <i class="fa fa-whatsapp"></i> WHATSAPP
            </a>
        </div>

        <div class="col-12 col-md-6">
            <a href="https://www.pratoecologia.it/" class="btn btn-danger btn-custom">
                <i class="fa fa-link"></i> SITO WEB
            </a>
        </div>

        <div class="col-12 col-md-6">
            <a href="https://www.facebook.com/pratoecologia/" class="btn btn-primary btn-custom">
                <i class="fa fa-facebook"></i> FACEBOOK
            </a>
        </div>

    </div>

</div>

</body>
</html>