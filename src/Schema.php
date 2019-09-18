<?php
/**
 * schema plugin for Craft CMS 3.x.
 *
 * A fluent builder Schema.org types and ld+json generator based on Spatie's schema-org package
 *
 * @link      https://rias.be
 *
 * @copyright Copyright (c) 2017 Rias
 */

namespace rias\schema;

use craft\base\Plugin;
use craft\web\twig\variables\CraftVariable;
use rias\schema\variables\SchemaVariable;
use yii\base\Event;

/**
 * Class Schema.
 *
 * @author    Rias
 *
 * @since     1.0.0
 */
class Schema extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var Schema
     */
    public static $plugin;

    // Public Methods
    // =========================================================================

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $event) {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                $variable->set('schema', SchemaVariable::class);
            }
        );
    }

    // Protected Methods
    // =========================================================================
}
