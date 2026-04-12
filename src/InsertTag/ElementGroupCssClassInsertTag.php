<?php

declare(strict_types=1);

namespace Heimseiten\ContaoCustomBackendSettingsBundle\InsertTag;

use Contao\ContentModel;
use Contao\CoreBundle\DependencyInjection\Attribute\AsInsertTag;
use Contao\CoreBundle\Framework\ContaoFramework;
use Contao\CoreBundle\InsertTag\InsertTagResult;
use Contao\CoreBundle\InsertTag\OutputType;
use Contao\CoreBundle\InsertTag\ResolvedInsertTag;
use Contao\CoreBundle\InsertTag\Resolver\InsertTagResolverNestedResolvedInterface;
use Contao\StringUtil;

#[AsInsertTag('element_group_cssclass')]
class ElementGroupCssClassInsertTag implements InsertTagResolverNestedResolvedInterface
{
    public function __construct(private readonly ContaoFramework $framework) {}

    public function __invoke(ResolvedInsertTag $insertTag): InsertTagResult
    {
        $this->framework->initialize();

        $id = (int) $insertTag->getParameters()->get(0);
        $model = $this->framework->getAdapter(ContentModel::class)->findByPk($id);

        if (!$model || !$model->cssID) {
            return new InsertTagResult('', OutputType::text);
        }

        $cssId = StringUtil::deserialize($model->cssID, true);

        return new InsertTagResult($cssId[1] ?? '', OutputType::text);
    }
}
