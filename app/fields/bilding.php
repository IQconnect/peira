<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$page = new FieldsBuilder('bilding');

$page
    ->setLocation('post_type', '==', 'budynki');
  
$page
    ->addText('subtitle', ['label'=>'Typ budynku'])
    ->addImage('img', ['label'=>'Zdjęcie w tle'])
    ->addRepeater('flats', ['title'=>'Mieszkania'])
        ->addText('nr', ['label'=> 'Numer'])
        ->addText('area', ['label'=> 'Powierzchnia'])
        ->addText('tarace', ['label'=> 'Taras / balkon'])
        ->addNumber('floor', ['label'=> 'Piętro'])
        ->addSelect('status', ['label'=> 'Status'])
            ->addChoice('wolne')
            ->addChoice('zajęte')
            ->addChoice('sprzedane')
        ->addGroup('price', ['label'=> 'Cena'])
            ->addText('regular', ['label'=> 'Cena'])
            ->addText('promo', ['label'=> 'Cena promocyjna'])
            ->addTextarea('promo_text', ['label'=> 'Wiadomość'])
        ->endGroup()
        ->addFile('plan', ['label'=> 'Plan']);
    ;
return $page;