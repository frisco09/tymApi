@extends('layouts.app')
@section('content')

 <a mp-mode="dftl" href="https://www.mercadopago.com/mla/checkout/start?pref_id=387659865-e6999607-2827-476f-9d1b-411d05b20ea8" name="MP-payButton" class='blue-ar-l-rn-none'>Pagar</a>
 <script type="text/javascript">
 (function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
 </script>
@endsection