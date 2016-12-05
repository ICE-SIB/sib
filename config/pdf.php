<?php 
return [
    'CakePdf' => [
        'engine' => [
            'className' => 'CakePdf.WkHtmlToPdf',
            'binary' => '/usr/bin/wkhtmltopdf'
        ],
        'pageSize' => 'Letter',
        'download' => true
    ]
]
?>
