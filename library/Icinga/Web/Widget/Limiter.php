<?php
/* Icinga Web 2 | (c) 2013-2015 Icinga Development Team | GPLv2+ */

namespace Icinga\Web\Widget;

use Icinga\Web\Navigation\Navigation;
use Icinga\Web\Url;

/**
 * Limiter control
 */
class Limiter extends AbstractWidget
{
    /**
     * CSS class for the limiter widget
     *
     * @var string
     */
    const CSS_CLASS_LIMITER = 'limiter-control';

    /**
     * Default limit
     *
     * @var int
     */
    const DEFAULT_LIMIT = 50;

    /**
     * Selectable limits
     *
     * @var int[]
     */
    public static $limits = array(
        10  => '10',
        25  => '25',
        50  => '50',
        100 => '100',
        500 => '500'
    );

    /**
     * Default limit for this instance
     *
     * @var int|null
     */
    protected $defaultLimit;

    /**
     * Get the default limit
     *
     * @return int
     */
    public function getDefaultLimit()
    {
        return $this->defaultLimit !== null ? $this->defaultLimit : static::DEFAULT_LIMIT;
    }

    /**
     * Set the default limit
     *
     * @param   int $defaultLimit
     *
     * @return  $this
     */
    public function setDefaultLimit($defaultLimit)
    {
        $this->defaultLimit = (int) $defaultLimit;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function render()
    {
        $url = Url::fromRequest();
        $activeLimit = (int) $url->getParam('limit', $this->getDefaultLimit());
        $navigation = new Navigation();
        $navigation->setLayout(Navigation::LAYOUT_TABS);
        foreach (static::$limits as $limit => $label) {
            $navigation->addItem(
                'limit_' . $limit,
                array(
                    'priority'  => $limit,
                    'label'     => $label,
                    'active'    => $activeLimit === $limit,
                    'url'       => $url->with(array('limit' => $limit)),
                    'title'     => sprintf(t('Show %u rows on this page'), $limit)
                )
            );
        }

        if ($activeLimit === 0) {
            $navigation->addItem(
                'limit_0',
                array(
                    'active'    => true,
                    'label'     => t('all'),
                    'title'     => t('Show all items on this page'),
                    'priority'  => max(array_keys(static::$limits)) + 1
                )
            );
        }

        return $navigation
            ->getRenderer()
            ->setCssClass(static::CSS_CLASS_LIMITER)
            ->setHeading(t('Limiter'))
            ->render();
    }
}
