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

require_once EXTENSIONS.'/kickstash/extension.driver.php';

use Kickstash\Kickstash;

class datasourceBacker_Address extends Kickstash\AbstractAuthenticatedSectionDatasource
{
    public $dsParamROOTELEMENT = 'address';

    public function about()
    {
        return [
            'name' => 'Backers: Address',
            'author' => [
                'name' => 'Administration User',
                'website' => 'http://cp.kickstash',
                'email' => 'team@kickstash.com',
            ],
            'version' => 'Symphony 2.7.0',
            'release-date' => '2017-10-02T05:11:48+00:00',
        ];
    }

    public function execute(array &$param_pool = null)
    {
        $backer = Kickstash\Models\Backer::loadFromEmailAddress($this->authPayload()->backer);
        $survey = $backer->survey();

        if (!($survey instanceof Kickstash\Models\Survey)) {
            throw new Kickstash\Exceptions\GenericResourceNotFoundException('Backer has not completed their survey.');
        }

        $address = $survey->address();
        if (!($address instanceof Kickstash\Models\Address)) {
            throw new Kickstash\Exceptions\GenericResourceNotFoundException('Backer has not provided an address.');
        }

        $xml = new XMLElement('Address');

        $fields = [
            'surveyId',
            'firstName',
            'lastName',
            'line1',
            'line2',
            'city',
            'region',
            'state',
            'postcode',
            'telephone',
            'deliveryNotes',
            'dateCreatedAt',
            'dateModifiedAt',
        ];

        foreach ($fields as $f) {
            $xml->appendChild(new XMLElement(
                $f,
                null !== $address->$f ? replaceAmpersands($address->$f) : ''
            ));
        }

        $country = $address->country();
        if ($country instanceof Kickstash\Models\Country) {
            $xml->appendChild(new XMLElement('country', $country->name));
        }

        return $xml;
    }
}
