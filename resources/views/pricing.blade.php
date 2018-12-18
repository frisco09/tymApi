@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    * {
    box-sizing: border-box;
    }

    .columns {
    float: left;
    width: 33.3%;
    padding: 8px;
    }

    .price {
    list-style-type: none;
    border: 1px solid #eee;
    margin: 0;
    padding: 0;
    -webkit-transition: 0.3s;
    transition: 0.3s;
    }

    .price:hover {
    box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
    }

    .price .header {
    background-color: #111;
    color: white;
    font-size: 25px;
    }

    .price li {
    border-bottom: 1px solid #eee;
    padding: 20px;
    text-align: center;
    }

    .price .grey {
    background-color: #eee;
    font-size: 20px;
    }

    .button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px 25px;
    text-align: center;
    text-decoration: none;
    font-size: 18px;
    }

    @media only screen and (max-width: 600px) {
    .columns {
        width: 100%;
    }
    }
    </style>
</head>
<body>

        <div class="container-fluid">
                <h2 style="text-align:center">COMPRA CREDITOS PARA APOSTAR EN TUS JUEGOS</h2>
                <p style="text-align:center">Plan de compra de creditos y esquivalencias peso/credito.</p>
                <div class="row">
                    <div class="columns">
                        <ul class="price">
                            <li class="header">Basic</li>
                            <li class="grey">$ 99.99 / 100 CREDITOS</li>
                            <li>Pack de creidtos basico</li>
                            <li>100 creditos para tus partidos</li>
                            <li>-25% en apuestas</li>
                            <li class="grey">
                                <a mp-mode="dftl" href="https://www.mercadopago.com/mla/checkout/start?pref_id=387659865-de0dafe7-3945-4416-aa0f-8feefc4b6365" name="MP-payButton" class='red-ar-l-rn-aron'>Pagar</a>
                                <script type="text/javascript">
                                (function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
                                </script>
                            </li>
                        </ul>
                    </div>

                    <div class="columns">
                        <ul class="price">
                            <li class="header">Pro</li>
                            <li class="grey">$ 499.99 / 500 CREDITOS</li>
                            <li>Pack de creidtos pro</li>
                            <li>500 creditos para tus partidos</li>
                            <li>-10% en apuestas</li>
                            <li class="grey">
                                <a mp-mode="dftl" href="https://www.mercadopago.com/mla/checkout/start?pref_id=387659865-e6b50053-5e78-4b4f-94ae-424ed9dab2e8" name="MP-payButton" class='red-ar-l-rn-aron'>Pagar</a>
                                <script type="text/javascript">
                                (function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
                                </script>
                            </li>
                        </ul>
                    </div>

                    <div class="columns">
                        <ul class="price">
                            <li class="header">Full</li>
                            <li class="grey">$ 999.99 / 1000 CREDITOS</li>
                            <li>Pack de creidtos full</li>
                            <li>1000 creditos para tus partidos</li>
                            <li>-5% en apuestas</li>
                            <li class="grey">
                                <a mp-mode="dftl" href="https://www.mercadopago.com/mla/checkout/start?pref_id=387659865-e6999607-2827-476f-9d1b-411d05b20ea8" name="MP-payButton" class='red-ar-l-rn-aron'>Pagar</a>
                                <script type="text/javascript">
                                (function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
                                </script>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-4">
                    <h2>Coprar creditos por unidad <span class="badge badge-dark"> $ 1.25 / 1 credito</span>
                    <span class="badge badge-dark"> -30% en apuestas</span>
                    </h2>
                    </div>
                    <div class="col-4">
                        <div class="input-group mb-3">
                            <input type="number" min="0" class="form-control" placeholder="creditos" aria-label="cantidad de creditos" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-danger" type="button">COMPRAR</button>
                            </div>
                        </div>
                    </div>
                </div>
         </div>

</body>
</html>

@endsection