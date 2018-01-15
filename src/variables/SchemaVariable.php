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

namespace rias\schema\variables;

use Spatie\SchemaOrg\Schema;

/**
 * @author    Rias
 *
 * @since     1.0.0
 */
class SchemaVariable
{
    // Public Methods
    // =========================================================================
    public function __call($name, $arguments)
    {
        return Schema::$name();
    }
}
