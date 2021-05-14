<?php

return [
    // ...

    'unavailable_audits' => 'Nenhuma auditoria disponível',

    'created'            => [
        'metadata' => 'Na data <strong>:audit_created_at</strong>, o usuário <strong>:user_name [:audit_ip_address]</strong> criou este registro através do endereço <strong>:audit_url</strong>',
        'modified' => [
            'id'   => 'ID: <strong>:new</strong>',
            'cidade' => 'Cidade: <strong>:new</strong>',
            'idestado' => 'ID Estado: <strong>:new</strong>',
            'cep' => 'CEP: <strong>:new</strong>',
        ],
    ],
    
    'updated'            => [
        'metadata' => 'Na data <strong>:audit_created_at</strong>, o usuário <strong>:user_name [:audit_ip_address]</strong> atualizou este registro através do endereço <strong>:audit_url</strong>',
        'modified' => [
            'id'   => 'ID foi alterado de: <strong>:old</strong> para: <strong>:new</strong>',
            'cidade' => 'Cidade foi alterado de: <strong>:old</strong> para: <strong>:new</strong>',
            'idestado' => 'ID Estado foi alterado de: <strong>:old</strong> para: <strong>:new</strong>',
            'cep' => 'CEP foi alterado de: <strong>:old</strong> para: <strong>:new</strong>',
        ],
    ],

    
    // ...
];