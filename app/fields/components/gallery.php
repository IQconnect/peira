<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('gallery');

$builder
    ->addGallery('gallery', ['title'=>'Galeria'])
    ;
return $builder;