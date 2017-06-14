<?php
return [
    'client_id' => 'AQOnuJTMtmUCEpuy7JdCkPeM7L0lGz0p0aVtQuOvcbFwjcPM5d1z9Qt-W0ZlfmMzOem5TMVcYkEsqx4d',
    'secret' => 'ENi-C48lIQmv5hNLmf3sgxJVMAzwtMC50jNPOA0wWzHWP6uA56tMvO_L31WRmmAEqv9Gvo_E1jOQW9Vt',
    'settings' => [
        'http.CURLOPT_CONNECTTIMEOUT' => 30,
        'mode' => 'sandbox',
        'log.LogEnabled' => true,
        'log.FileName' => storage_path().'/logs/paypal.php',
        'log.LogLevel' => 'INFO',
    ]
];
