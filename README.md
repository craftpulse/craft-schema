# Schema plugin for Craft CMS 3.x

A fluent builder of Schema.org types and ld+json generator based on Spatie's schema-org package which makes for a fast and easy way to add structured data to your templates.

## Requirements

This plugin requires Craft CMS 3.0.0-RC1 or later and PHP 7.

## Installation

To install the plugin, install it from the plugin store or follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require rias/schema

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for schema.

## Schema Overview

Schema provides a fluent builder for all Schema.org types and their properties. For more information and the available methods, check out [spatie/schema-org](https://github.com/spatie/schema-org).  

## Using Schema

Once Schema is installed, it's accessible through the `craft` variable in your templates. 

For the best experience, set the schema to a variable and typehint it to Spatie's model. In combination with the [Symfony plugin](https://plugins.jetbrains.com/plugin/7219-symfony-plugin) for PHPStorm, you get autocompletion for all the Schema's and their properties.

For example:
```
{# @var schema \Spatie\SchemaOrg\Schema #}
{% set schema = craft.schema %}
{{ schema
    .person
      .name("Rias Van der Veken")
      .email("hello@rias.be")
      .company(
        schema.localBusiness
          .name("Marbles")
          .address(schema.postalAddress
            .addressCountry("Belgium")
            .addressLocality("Antwerp")
            .addressRegion("Antwerp")
            .postalCode(2000)
            .streetAddress("IJzerenpoortkaai 3")
          )
      )
}}
```

Generates the following output:

```
<script type="application/ld+json">
{  
   "@context":"http:\/\/schema.org",
   "@type":"Person",
   "name":"Rias Van der Veken",
   "email":"hello@rias.be",
   "company":{  
      "@type":"LocalBusiness",
      "name":"Marbles",
      "address":{  
         "@type":"PostalAddress",
         "addressCountry":"Belgium",
         "addressLocality":"Antwerp",
         "addressRegion":"Antwerp",
         "postalCode":2000,
         "streetAddress":"IJzerenpoortkaai 3"
      }
   }
}
</script>
```

Brought to you by [Rias](https://rias.be)
