<?php

declare(strict_types=1);

use pointybeard\Symphony\Extensions\TemplateExtension;

class datasourceTemplateExample extends \Datasource
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
