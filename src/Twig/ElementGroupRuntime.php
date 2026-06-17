<?php

declare(strict_types=1);

namespace Heimseiten\ContaoCustomBackendSettingsBundle\Twig;

use Contao\ContentModel;
use Contao\CoreBundle\Framework\ContaoFramework;
use Contao\StringUtil;
use Twig\Extension\RuntimeExtensionInterface;

final class ElementGroupRuntime implements RuntimeExtensionInterface
{
    public function __construct(private readonly ContaoFramework $framework)
    {
    }

    /**
     * Returns the CSS class stored in the cssID field of the given content element.
     */
    public function getCssClass(int|string|null $id): string
    {
        if (!$id) {
            return '';
        }

        $this->framework->initialize();

        $model = $this->framework->getAdapter(ContentModel::class)->findByPk((int) $id);

        if (!$model || !$model->cssID) {
            return '';
        }

        $cssId = StringUtil::deserialize($model->cssID, true);

        return $cssId[1] ?? '';
    }
}
