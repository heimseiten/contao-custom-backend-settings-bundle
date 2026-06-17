<?php

declare(strict_types=1);

if ( Contao\Config::get('addParagraphOptionToHeadlineField') ) {
    array_push( $GLOBALS['TL_DCA']['tl_content']['fields']['headline']['options'], 'p' );
}

if ( Contao\Config::get('addStrongOptionToHeadlineField') ) {
    array_push( $GLOBALS['TL_DCA']['tl_content']['fields']['headline']['options'], 'strong' );
}
