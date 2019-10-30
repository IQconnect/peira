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
    ->addTab('footer', ['label' => 'Stopka', 'placement' => 'left'])
    ->addGroup('footer_info')
        ->addImage('image', ['label'=>'Zdjęcie w tle'])
        ->addText('email', ['label' => 'Email'] )
        ->addText('firm', ['label' => 'Firma'])
        ->addText('adress', ['label' => 'Adres'] )
        ->addText('krs', ['label' => 'KRS'] )
        ->addText('nip', ['label' => 'NIP'] )
        ->addText('regon', ['label' => 'Regon'] )
    ->endGroup()
    ->addTab('Ilikeart', ['label' => 'Ilikeart', 'placement' => 'left'])
    ->addImage('Ilikeart_logo', ['label'=>'Zdjęcie w tle'])
    ;
return $option;
