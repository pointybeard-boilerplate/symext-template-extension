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

use pointybeard\Symphony\Extended;

class datasourceTemplateExample extends Extended\AbstractSectionDatasource
{
    public $dsParamROOTELEMENT = 'template-example';

    public function about()
    {
        return [
            'name' => 'Template: Example Datasource',
            'author' => [
                'name' => 'Alannah Kearney',
                'website' => 'http://github.com/pointybeard',
                'email' => 'hi@alannahkearney.com',
            ],
            'version' => 'Symphony 2.7.10',
            'release-date' => '2020-11-09T20:48:00+10:00',
        ];
    }

    public function execute(array &$param_pool = null)
    {
        return new \XMLElement($this->dsParamROOTELEMENT);
    }
}
