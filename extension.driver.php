<?php

declare(strict_types=1);

/*
 * This file is part of the "Template Extension for Symphony CMS" repository.
 *
 * Copyright 2020-2021 Alannah Kearney <hi@alannahkearney.com>
 *
 * For the full copyright and license information, please view the LICENCE
 * file that was distributed with this source code.
 */

if (!file_exists(__DIR__.'/vendor/autoload.php')) {
    throw new Exception(sprintf('Could not find composer autoload file %s. Did you run `composer update` in %s?', __DIR__.'/vendor/autoload.php', __DIR__));
}

require_once __DIR__.'/vendor/autoload.php';

use pointybeard\Symphony\Extended;

// Check if the class already exists before declaring it again.
if (false == class_exists('\\extension_template_extension')) {
    final class extension_template_extension extends Extended\AbstractExtension
    {

        /**
         * The following methods (fetchNavigation, and getSubscribedDelegates) can be
         * removed if not needed
         */
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

        /**
         * The following methods (enable, disable, uninstall, and install) can be removed
         * if not needed for performing additional tasks
         */

        public function enable()
        {
            parent::enable();
            // Perform additional tasks here
        }

        public function disable()
        {
            parent::disable();
            // Perform additional tasks here
        }

        public function uninstall()
        {
            parent::uninstall();
            // Perform additional tasks here
        }

        public function install()
        {
            parent::install();
            // Perform additional tasks here
        }
    }
}
