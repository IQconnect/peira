<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$option = new FieldsBuilder('option');

$option
    ->setLocation('options_page', '==', 'acf-options-ustawienia-strony');

$option
    ->addTab('main', ['label'=>'Ustawienia główne', 'placement' => 'left'])
        ->addImage('logo_header', ['label'=>'Logo Header'])
        ->addPageLink('invest_link', ['label'=>'Link do inwestycji'] )
    ->addTab('contact', ['label'=>'Informacje kontatkowe', 'placement' => 'left'])
        ->addText('phone', ['label'=>'Telefon', 'wrapper' => array ('width' => '50%')])
        ->addText('email', ['label' => 'Email', 'wrapper' => array ('width' => '50%')])
        ->addWysiwyg('rodo', ['label'=>'RODO'])
        ->addTextarea('terms', ['label'=>'Przetwarzanie danych osobowych'])
    ->addTab('footer', ['label' => 'Stopka', 'placement' => 'left'])
        ->addGroup('footer_info')
            ->addImage('image', ['label'=>'Logo footer', 'wrapper' => array ('width' => '50%')])
            ->addImage('Ilikeart_logo', ['label'=>'By', 'wrapper' => array ('width' => '50%')])
            ->addText('firm', ['label' => 'Firma', 'wrapper' => array ('width' => '50%')])
            ->addText('adress', ['label' => 'Adres', 'wrapper' => array ('width' => '50%')] )
            ->addText('krs', ['label' => 'KRS', 'wrapper' => array ('width' => '33%')] )
            ->addText('nip', ['label' => 'NIP', 'wrapper' => array ('width' => '33%')] )
            ->addText('regon', ['label' => 'Regon', 'wrapper' => array ('width' => '33%')] )
        ->endGroup()
    ;
return $option;
