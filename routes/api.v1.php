<?php

Route::post('/echo/{string}', fn($string
) => json_encode(['message' => (string) htmlspecialchars($string, ENT_QUOTES)]));
