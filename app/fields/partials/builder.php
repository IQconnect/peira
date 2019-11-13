<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('builder');

$builder
    ->addTab('builder', ['placement' => 'left'])
        ->addFlexibleContent('components', ['button_label' => 'Add Component'])
            ->addLayout('hero')
            ->addLayout(get_field_partial('components.text-section'))
            ->addLayout(get_field_partial('components.full-img'))
            ->addLayout(get_field_partial('components.icon-section'))
            ->addLayout(get_field_partial('components.gallery'))
            ->addLayout('info-section')
            ->addLayout('contact')
            ->addLayout('bildings')
            ->addLayout('content')
            ->addLayout(get_field_partial('components.small-hero'))
            ->addLayout(get_field_partial('components.stats'))
            ->addLayout(get_field_partial('components.flex'))
            ->addLayout(get_field_partial('components.extra-menu'))
            ->addLayout(get_field_partial('components.list'));
return $builder;
