<?php

declare(strict_types=1);

/*
 * This file is part of the "Extension Template for Symphony CMS" repository.
 *
 * Copyright 2020 Alannah Kearney <hi@alannahkearney.com>
 *
 * For the full copyright and license information, please view the LICENCE
 * file that was distributed with this source code.
 */

if (!file_exists(__DIR__.'/vendor/autoload.php')) {
    throw new Exception(sprintf('Could not find composer autoload file %s. Did you run `composer update` in %s?', __DIR__.'/vendor/autoload.php', __DIR__));
}

require_once __DIR__.'/vendor/autoload.php';

use pointybeard\Symphony\Extended;
use pointybeard\Symphony\SectionBuilder;
use pointybeard\Symphony\ExtensionAssetManagement;

// Check if the class already exists before declaring it again.
if (false == class_exists('\\extension_template_extension')) {
    final class extension_template_extension extends Extended\AbstractExtension
    {
        public function enable(): bool
        {
            // Tasks to do in this method:
            // 1. Run install() to ensure critical tasks have been carried out
            $this->install();

            (new ExtensionAssetManagement\DatasourceIterator(dirname(__FILE__) . '/src/Includes/Datasources'))
                ->each(function(ExtensionAssetManagement\AbstractInstallableAsset $asset) {
                    $asset->enable();
                })
            ;

            return true;
        }

        public function install(): bool
        {
            // Check dependencies
            parent::install();

            // Build the sections
            try{
                SectionBuilder\Import::fromJsonFile(__DIR__.'/src/Install/sections.json', SectionBuilder\Import::FLAG_SKIP_ORDERING);
            } catch(\TypeError | \ErrorException | \Exception $e) {
                // Hmm, not good. We'll need to throw this up
                throw new TemplateExtension\Exceptions\TemplateExtensionException(
                    "Unable to import sections. Files appears to be invalid. Returned: {$e->getMessage()}",
                    0,
                    $e
                );
            }

            return true;
        }

        public function uninstall(): bool
        {
            // Tasks to do in this method:
            // 1. Run disable()
            $this->disable();

            // 2. Delete any sections created during install.
            // 3. Remove any database tables manually created
            return true;
        }

        public function disable(): bool
        {
            // Tasks to do in this method:
            // 1. Disable fields, events, data sources, and commands
            return true;
        }

        public function fetchNavigation()
        {
            return [
                // Example:
                // [
                //     'location' => 'System',
                //     'name' => 'Cron',
                //     'link' => '/',
                // ],
            ];
        }

        public function getSubscribedDelegates(): array
        {
            return [
                // Example:
                // [
                //     'page' => '/system/preferences/',
                //     'delegate' => 'AddCustomPreferenceFieldsets',
                //     'callback' => 'appendPreferences',
                // ],
                // [
                //     'page' => '/system/preferences/',
                //     'delegate' => 'Save',
                //     'callback' => 'savePreferences',
                // ],
            ];
        }
    }
}
