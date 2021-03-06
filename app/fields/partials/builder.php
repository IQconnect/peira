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
            ->addLayout(get_field_partial('components.text-slide'))
            ->addLayout(get_field_partial('components.icon'))
            ->addLayout(get_field_partial('components.invests'))
            ->addLayout(get_field_partial('components.dropdown'))
            ->addLayout(get_field_partial('components.text-avatar'))
            ->addLayout('contact', ['label'=>'Kontakt'])
            ->addLayout('contactform', ['label'=>'Kontakt'])
            ->addLayout('search-flat', ['label'=>'Znajdź mieszkanie - wszystkie inwestycje'])
            ->addLayout('invests-map', ['label'=>'Nasze inwestycje - mapa']);
return $builder;
