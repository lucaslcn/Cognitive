<?php

return [
    // ...

    'unavailable_audits' => 'Nenhuma auditoria disponível',

    'created'            => [
        'metadata' => 'Na data <strong>:audit_created_at</strong>, o usuário <strong>:user_name [:audit_ip_address]</strong> criou este registro através do endereço <strong>:audit_url</strong>',
        'modified' => [
            'id'   => 'ID Turma: <strong>:new</strong>',
            'turma' => 'Turma: <strong>:new</strong>',
            'iddisciplina' => 'ID Disciplina: <strong>:new</strong>',
            'idprofessor' => 'ID Professor: <strong>:new</strong>',
        ],
    ],
    
    'updated'            => [
        'metadata' => 'Na data <strong>:audit_created_at</strong>, o usuário <strong>:user_name [:audit_ip_address]</strong> atualizou este registro através do endereço <strong>:audit_url</strong>',
        'modified' => [
            'id'   => 'ID Turma foi alterado de: <strong>:old</strong> para: <strong>:new</strong>',
            'turma' => 'Turma foi alterado de: <strong>:old</strong> para: <strong>:new</strong>',
            'iddisciplina' => 'ID Disciplina foi alterado de: <strong>:old</strong> para: <strong>:new</strong>',
            'idprofessor' => 'ID Professor foi alterado de: <strong>:old</strong> para: <strong>:new</strong>',
        ],
    ],

    
    // ...
];