<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$inwestycje = new FieldsBuilder('inwestycje');

$inwestycje
    ->setLocation('post_type', '==', 'inwestycje');

$inwestycje
    ->addTab('main', ['label'=> 'Ustawienia główne','placement' => 'left'])
        ->addImage('logo', ['label'=> 'Logo inwestycji'])
        ->addTextarea('dsc', ['label'=>'opis', 'new_lines'=>'br'])
    ->addTab('gallery', ['label'=> 'Galeria','placement' => 'left'])
        ->addGallery('gallery', ['label'=> 'Galeria'])

    ;
return $inwestycje;
