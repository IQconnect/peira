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
        ->addPageLink('search_link', ['label'=>'Link do wyszukiwarki'] )
    ->addTab('LokalizacjaMenu', ['label'=>'Lokalizacja Menu', 'placement' => 'left'])
       ->addRepeater('loc_nav')
            ->addText('name', ['Label'=>'Tytuł'])
            ->addImage('icon', ['Label'=>'Ikona', 'wrapper' => array ('width' => '25%')])
            ->addImage('image', ['Label'=>'Ikona', 'wrapper' => array ('width' => '25%')])
        ->endRepeater()
    ->addTab('Biuro sprzedaży', ['label'=>'Biuro sprzedaży', 'placement' => 'left'])
        ->addGroup('localization', ['label'=>''])
            ->addFields(get_field_partial('components.localization'))
        ->endGroup()
        ->addGroup('marker', ['label'=>''])
            ->addText('name', ['Label'=>'Ikona', 'wrapper' => array ('width' => '50%')])
            ->addNumber('zoom', ['Label'=>'Ikona', 'wrapper' => array ('width' => '50%')])
            ->addText('lat', ['Label'=>'Ikona', 'wrapper' => array ('width' => '50%')])
            ->addText('lng', ['Label'=>'Ikona', 'wrapper' => array ('width' => '50%')])
            ->addImage('icon', ['Label'=>'Ikona', 'wrapper' => array ('width' => '50%'), 'return_format'=>'url'])
        ->endGroup()
    ->addTab('contact', ['label'=>'Informacje kontatkowe', 'placement' => 'left'])
        ->addText('phone', ['label'=>'Telefon', 'wrapper' => array ('width' => '50%')])
        ->addText('email', ['label' => 'Email', 'wrapper' => array ('width' => '50%')])
        ->addText('send_email', ['label' => 'Email do formularza', 'wrapper' => array ('width' => '50%')])
        ->addWysiwyg('rodo', ['label'=>'RODO'])
        ->addTextarea('terms', ['label'=>'Przetwarzanie danych osobowych'])
        ->addFields(get_field_partial('components.contactform'))
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
    ->addTab('singleNav', ['label' => 'Nawigacja poj. Inwestycji', 'placement' => 'left'])
        ->addRepeater('menu')
            ->addTrueFalse('off', ['label'=>'Ukryj', 'wrapper' => array ('width' => '5%')])
            ->addText('title', ['label'=>'Tytuł'])
            ->addText('link', ['label'=>'link'])
        ->endRepeater()
    ;
return $option;
