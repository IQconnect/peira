<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$page = new FieldsBuilder('page');

$page
    ->setLocation('post_type', '==', 'page')
        ->and('page_template', '!=', 'views/page-content.blade.php');
  
$page
    ->addFields(get_field_partial('partials.builder'));
return $page;
