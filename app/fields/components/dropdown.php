<?php
namespace App;
use StoutLogic\AcfBuilder\FieldsBuilder;
$dropdown = new FieldsBuilder('dropdown');
$dropdown
        ->addText('title')
        ->addRelationship('team', ['label'=> 'Zespół', 'post_type' => 'inteam'])
;
return $dropdown;
