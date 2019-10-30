<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$inwestycje = new FieldsBuilder('inwestycje');

$inwestycje
    ->setLocation('post_type', '==', 'inwestycje');

$inwestycje
    ->addTab('main', ['label'=> 'Ustawienia główne','placement' => 'left'])
        ->addImage('logo', ['label'=> 'Logo inwestycji', 'wrapper' => array ('width' => '50%')])
        ->addImage('image', ['label'=> 'Zdjęcie inwestycji', 'wrapper' => array ('width' => '50%'), 'return_format' => 'id'])
        ->addTextarea('dsc', ['label'=>'opis', 'new_lines'=>'br'])
        ->addText('address', ['label'=>'Adres', 'new_lines'=>'br'])
    ->addTab('gallery', ['label'=> 'Galeria','placement' => 'left'])
        ->addGallery('gallery', ['label'=> 'Galeria'])
    ->addTab('mapa', ['label'=> 'Mapa','placement' => 'left'])
        ->addText('lat', ['wrapper' => array ('width' => '33%')])
        ->addText('lng', ['wrapper' => array ('width' => '33%')])
        ->addNumber('zoom', ['wrapper' => array ('width' => '33%'), 'default_value' => '13'])
        ->addImage('img_active', ['label'=> 'Pin aktywny', 'wrapper' => array ('width' => '50%')])
        ->addImage('img_inactive', ['label'=> 'Pin nieaktywny', 'wrapper' => array ('width' => '50%')])
    ;
return $inwestycje;
