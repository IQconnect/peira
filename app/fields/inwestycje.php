<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$inwestycje = new FieldsBuilder('inwestycje');

$inwestycje
    ->setLocation('post_type', '==', 'inwestycje');

$inwestycje
    ->addTab('main', ['label'=> 'Ustawienia główne','placement' => 'left'])
        ->addImage('logo', ['label'=> 'Logo inwestycji', 'wrapper' => array ('width' => '50%')])
        ->addImage('logo_dark', ['label'=> 'Logo inwestycji - Dark', 'wrapper' => array ('width' => '50%')])
        ->addImage('image', ['label'=> 'Zdjęcie inwestycji', 'wrapper' => array ('width' => '50%'), 'return_format' => 'id'])
        ->addTextarea('dsc', ['label'=>'opis', 'new_lines'=>'br'])
        ->addText('address', ['label'=>'Adres', 'new_lines'=>'br'])
        ->addTextarea('off_message', ['label'=>'Wiadomość nieaktywnej inwestycji', 'new_lines'=>'br'])
    ->addTab('gallery', ['label'=> 'Galeria','placement' => 'left'])
        ->addGallery('gallery', ['label'=> 'Galeria'])
    ->addTab('mapa', ['label'=> 'Mapa','placement' => 'left'])
        ->addText('lat', ['wrapper' => array ('width' => '33%')])
        ->addText('lng', ['wrapper' => array ('width' => '33%')])
        ->addNumber('zoom', ['wrapper' => array ('width' => '33%'), 'default_value' => '13'])
        ->addImage('img_active', ['label'=> 'Pin aktywny', 'wrapper' => array ('width' => '50%')])
        ->addImage('img_inactive', ['label'=> 'Pin nieaktywny', 'wrapper' => array ('width' => '50%')])
    ->addTab('Hero')
        ->addGroup('small-hero', ['label'=> ''])
            ->addFields(get_field_partial('components.small-hero'))
        ->endGroup()
    ->addTab('menu')
        ->addRepeater('menu')
            ->addTrueFalse('off', ['label'=>'Ukryj', 'wrapper' => array ('width' => '5%')])
            ->addText('title', ['label'=>'Tytuł'])
            ->addText('link', ['label'=>'link'])
        ->endRepeater()
    ->addTab('galeria inwestycji')
        ->addGallery('slider1', ['label'=>'WIZUALIZACJE'])
        ->addGallery('slider2', ['label'=>'WNĘTRZA'])
        ->addGallery('slider3', ['label'=>'OKOLICA'])
    ->addTab('Lokalizacja')
        ->addRepeater('localization')
            ->addText('name', ['label'=>'Title'])
            ->addText('lat', ['label'=>'LAT'])
            ->addText('lng', ['label'=>'LNG'])
            ->addSelect('cat', ['label'=>'Katogria'])
                ->addChoice('Sklepy')
                ->addChoice('Komunikacja')
                ->addChoice('Edukacja')
                ->addChoice('Rozrywka')
                ->addChoice('Inne')
        ->endRepeater()
    ->addTab('Osiedle')
        ->addGroup('text-slide')
            ->addFields(get_field_partial('components.text-slide'))
        ->endGroup()
    ;
return $inwestycje;
