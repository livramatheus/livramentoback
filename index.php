<?php
require __DIR__ . './vendor/autoload.php';

if (file_exists(__DIR__ . './src/Config/env.local.php')) {
    require __DIR__ . './src/Config/env.local.php';
}

use Livramatheus\Livramentoback\Controllers\ApiCore;

new ApiCore();