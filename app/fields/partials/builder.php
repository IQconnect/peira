<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('builder');

$builder
    ->addTab('builder', ['placement' => 'left'])
        ->addFlexibleContent('components', ['button_label' => 'Add Component'])
            ->addLayout(get_field_partial('components.hero'))
            ->addLayout(get_field_partial('components.small-hero'))
            ->addLayout(get_field_partial('components.text-text'))
            ->addLayout(get_field_partial('components.text-img'))
            ->addLayout(get_field_partial('components.icon'))
            ->addLayout(get_field_partial('components.invests'))
            ->addLayout(get_field_partial('components.dropdown'))
            ->addLayout(get_field_partial('components.contactform'))
            ->addLayout(get_field_partial('components.localization'))
            ->addLayout('contact', ['label'=>'Kontakt'])
            ->addLayout('invests-map', ['label'=>'Nasze inwestycje - mapa']);
return $builder;
