<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$inteam = new FieldsBuilder('inteam');

$inteam
    ->setLocation('post_type', '==', 'inteam');

$inteam
    ->addImage('icon', ['label'=> 'Ikona'])
    ->addRepeater('people')
        ->addTextArea('name', ['label'=> 'Imie i nazwisko','rows'=>1,'wrapper' => array ('width' => '33%')])
        ->addTextArea('jobtitle', ['label'=> 'Stanowisko','rows'=>1,'wrapper' => array ('width' => '33%')])
        ->addTextArea('phone', ['label'=> 'Telephone','rows'=>1, 'wrapper' => array ('width' => '50%')])
        ->addTextArea('email', ['label'=> 'Email','rows'=>1, 'wrapper' => array ('width' => '50%')])
        ->addImage('avatar', ['label'=> 'Zdjęcie', 'wrapper' => array ('width' => '50%')])
    ;
return $inteam;
