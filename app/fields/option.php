<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$option_page = new FieldsBuilder('option');

$option_page
    ->setLocation('options_page', '==', 'acf-options-ustawienia-strony');
  
$option_page
    ->addTab('Main', ['label' => 'Ustawienia główne', 'placement' => 'left'])
        ->addImage('logo')
        ->addImage('logo-white')
    ->addTab('Social media', ['label' => 'Social Media', 'placement' => 'left'])
        ->addRepeater('icons', ['min' => 0, 'layout' => 'table'])
            ->addText('icon', ['title' => 'Font awesome kod ikonki'])
            ->addText('link', ['title' => 'link'])
        ->endRepeater()
    ->addTab('hero', ['label' => 'Hero', 'placement' => 'left'])
        ->addTextarea('hero_slogan', ['label'=>'Tytuł', 'new_lines'=>'br'])
        ->addLink('hero_link', ['label'=>'Link'])
        ->addGallery('hero')
    ->addTab('info-section', ['label' => 'Sekcja informacyjna', 'placement' => 'left'])
        ->addText('info-section_title', ['label' => 'Nagłówek', 'new_lines'=>'br'])
        ->addText('info-section_subtitle', ['label' => 'Nagłówek', 'new_lines'=>'br'])
        ->addTextarea('info-section_content', ['label' => 'Treść', 'new_lines'=>'br'])
        ->addLink('info-section_link', ['label'=>'link'])
        ->addImage('info-section_image', ['title'=> 'Zdjęcie w tle'])
        ->addRepeater('icon-boxs', ['label'=>'Boxy z ikonką','min' => 0, 'layout' => 'table'])
            ->addImage('img', ['title'=> 'Zdjęcie'])
            ->addTextarea('title', ['title' => 'Nagłówek', 'new_lines'=>'br'])
            ->addTextarea('subtitle', ['title' => 'Podtytuł', 'new_lines'=>'br'])
            ->addTextarea('content', ['title' => 'Treść'])
        ->endRepeater()
    ->addTab('footer', ['label' => 'Stopka', 'placement' => 'left'])
        ->addText('footer_title', ['label' => 'Nagłówek kolumny'])
        ->addText('footer_address', ['label' => 'Adres'] )
        ->addRepeater('footer_links', ['label' => 'Link', 'min' => 0, 'layout' => 'table'])
            ->addLink('link', ['title' => 'Link'])
        ->endRepeater()
        ->addRepeater('footer_tel', ['label' => 'Tel', 'min' => 0, 'layout' => 'table'])
            ->addText('tel', ['title' => 'Tel'])
        ->endRepeater()
        ->addRepeater('footer_mails', ['label' => 'Maile', 'min' => 0, 'layout' => 'table'])
            ->addText('mail', ['title' => 'Mail'])
        ->endRepeater()
        ->addText('footer_krs', ['label' => 'KRS'] )
        ->addText('footer_nip', ['label' => 'NIP'] )
        ->addText('footer_regon', ['label' => 'REGON'] )
    ->addTab('Formularz kontaktowy', ['placement' => 'left'])
        ->addText('office_title', ['label' => 'Tytuł biuro sprzedaży'])
        ->addTextarea('office_content', ['label' => 'Treść biuro sprzedaży'])
        ->addRepeater('office_persons', ['label' => 'Osoby do kontatku'])
            ->addImage('img',  ['label' => 'Zdjęcie'])
            ->addGroup('contact',  ['label' => 'Informacje kontaktowe'])
                ->addText('name', ['label' => 'Imię i nazwisko'])
                ->addText('tel', ['label' => 'Telefon'])
                ->addText('mail', ['label' => 'E-mail'])
            ->endGroup()
        ->endRepeater()    
        ->addText('form_title', ['label' => 'Tytuł formularza'])
        ->addText('form_subtitle', ['label' => 'Podtytuł formularza'])
        ->addTextarea('form_terms', ['label' => 'Treść checbkoxa'])
        ->addImage('form_bg', ['label' => 'Zdjęcie w tle']);
        

    
return $option_page;
