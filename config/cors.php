<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Aquí configuramos los permisos para que React pueda consumir la API.
    |
    */

    // 1. ¿A qué rutas aplicamos estos permisos? A toda nuestra API.
    'paths' => ['api/*'],

    // 2. Equivalente a: header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    'allowed_methods' => ['GET', 'PUT', 'POST', 'DELETE', 'OPTIONS'],

    // 3. Equivalente a: header('Access-Control-Allow-Origin: *');
    // *Nota: Como usarás credenciales (true), por regla estricta de navegadores modernos no puedes usar '*'. 
    // Debes poner la dirección exacta de tu React (localhost:3000).
    'allowed_origins' => ['http://localhost:3000', 'http://127.0.0.1:3000'],

    'allowed_origins_patterns' => [],

    // 4. Equivalente a: header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
    'allowed_headers' => ['Origin', 'Content-Type', 'X-Auth-Token', 'Authorization'],

    'exposed_headers' => [],

    // 5. Equivalente a: header('Access-Control-Max-Age: 1000');
    'max_age' => 1000,

    // 6. Equivalente a: header("Access-Control-Allow-Credentials: true");
    'supports_credentials' => true,

];