<?php

if ( Contao\Config::get('addParagraphOptionToHeadlineField') ) {
    $GLOBALS['TL_DCA']['tl_content']['fields']['headline']['options'] = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p'];
}