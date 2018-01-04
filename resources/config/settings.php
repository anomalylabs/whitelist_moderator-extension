<?php

return [
    'enable' => [
        'env'  => 'ENABLE_WHITELIST_MODERATOR',
        'type' => 'anomaly.field_type.boolean',
        'bind' => 'anomaly.extension.whitelist_moderator::moderator.enabled',
    ],
];
