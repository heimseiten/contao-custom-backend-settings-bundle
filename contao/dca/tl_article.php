<?php

if ( Contao\Config::get('publishArticleOnCreate') ) {
    $GLOBALS['TL_DCA']['tl_article']['fields']['published']['default'] = true;
}


// Show CSS ID and CSS class in article backend labels

declare(strict_types=1);

use Contao\StringUtil;
use Contao\BackendUser;

$GLOBALS['TL_DCA']['tl_article']['list']['label']['label_callback'] = static function (array $row, string $label): string {
    // Call original core callback
    $label = (new tl_article())->addIcon($row, $label);

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
        $label .= ' <span class="cssIdClass">' . implode(' ', $parts) . '</span>';
    }

    return $label;
};
