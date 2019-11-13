<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$subMenu = new FieldsBuilder('extra-menu');

$subMenu
    ->addRepeater('menu', ['label'=>'Dodatkowe menu'])
        ->addLink('link', ['title'=>'Link'])
    ;
return $subMenu;
