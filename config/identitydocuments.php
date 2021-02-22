<?php

use Werk365\IdentityDocuments\Services\Google;

return [
    'ocrService' => Google::class,
    'faceDetectionService' => Google::class,
    'mergeImages' => false, // bool
];
