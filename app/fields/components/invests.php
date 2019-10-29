<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$invests = new FieldsBuilder('invests', ['label'=> 'Inwestycje']);

$invests
    ->addRelationship('invests', ['label'=> 'Inwestycje', 'post_type' => 'inwestycje'])
    ;
return $invests;
