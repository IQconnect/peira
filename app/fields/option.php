<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$option = new FieldsBuilder('option');

$option
    ->setLocation('options_page', '==', 'acf-options-ustawienia-strony');

$option
    ->addTab('main', ['label'=>'Ustawienia główne', 'placement' => 'left'])
        ->addImage('logo_header', ['label'=>'Logo Header'])
    ->addTab('contact', ['label'=>'Informacje kontatkowe', 'placement' => 'left'])
        ->addText('phone', ['label'=>'Telefon'])
        ->addWysiwyg('rodo', ['label'=>'RODO'])
        ->addTextarea('terms', ['label'=>'Przetwarzanie danych osobowych'])
    ;
return $option;
