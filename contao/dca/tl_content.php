<?php

declare(strict_types=1);

use Contao\Image;
use Contao\StringUtil;
use Contao\BackendUser;

if ( Contao\Config::get('addParagraphOptionToHeadlineField') ) {
    array_push( $GLOBALS['TL_DCA']['tl_content']['fields']['headline']['options'], 'p' );
}

if ( Contao\Config::get('addStrongOptionToHeadlineField') ) {
    array_push( $GLOBALS['TL_DCA']['tl_content']['fields']['headline']['options'], 'strong' );
}

$GLOBALS['TL_DCA']['tl_content']['list']['sorting']['child_record_callback'] = static function (array $row): string {
    $labelResult = (new tl_content())->addCteType($row);
    $isNestedStructure = is_array($labelResult);

    if ($isNestedStructure) {
        [$type, $preview, $key] = $labelResult;
        $dragHandle = '<button type="button" class="drag-handle" data-action="keydown->contao--sortable#move">' . Image::getHtml('drag.svg') . '</button>';
        $label = '<div class="cte_type draggable ' . $key . '">' . $dragHandle . '<div>' . $type . '</div></div>';
        if ($preview !== '') {
            $label .= '<div class="cte_content" data-contao--limit-height-target="node"><div class="cte_preview" style="contain:paint">' . $preview . '</div></div>';
        }
    } else {
        $label = $labelResult;
    }

    $user = BackendUser::getInstance();
    if (false === (bool) $user->viewIdAndCssInArticlesAndContentElements) {
        return $label;
    }

    $renderWords = static function(string $value, string $class): string {
        $words = explode(' ', $value);
        sort($words);
        return '<code class="' . $class . '">' . implode(' ', array_map(
            fn($w) => '<span>' . htmlspecialchars($w) . '</span>',
            $words
        )) . '</code>';
    };

    $cssId = StringUtil::deserialize($row['cssID'] ?? '');
    $parts = array_filter([
        trim($cssId[0] ?? '') !== '' ? $renderWords(trim($cssId[0]), 'cssID')    : null,
        trim($cssId[1] ?? '') !== '' ? $renderWords(trim($cssId[1]), 'cssClass') : null,
    ]);

    if ($parts !== []) {
        $cssIdSpan = '<span class="cssIdClass">' . implode(' ', $parts) . '</span>';
        if ($isNestedStructure) {
            // Contao 5.7+: <div class="cte_type draggable X"><button/><div>type</div></div>
            // → inject span after inner </div>, before outer </div>
            $label = preg_replace(
                '/(<div class="cte_type [^"]*">)(.*?(<\/div>))(<\/div>)/s',
                '$1$2' . $cssIdSpan . '$4',
                $label,
                1
            ) ?? $label;
        } else {
            // Contao 5.3: <div class="cte_type X">type</div>
            // → inject span inside div, before </div>
            $label = preg_replace(
                '/(<div class="cte_type [^"]*">)(.*?)(<\/div>)/s',
                '$1$2' . $cssIdSpan . '$3',
                $label,
                1
            ) ?? $label;
        }
    }

    return $label;
};
