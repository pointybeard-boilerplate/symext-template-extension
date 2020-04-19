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

namespace ExtensionTemplate\Tests;

use PHPUnit\Framework\TestCase;
use pointybeard\Symphony\Extensions\ExtensionTemplate\Exceptions;

final class ExtensionTemplateExceptionTest extends TestCase
{
    /**
     * Create ExtensionTemplateException object and check that constructor
     * args were set correctly.
     */
    public function testValidPassArgsToConstructor(): \Exception
    {
        $ex = new Exceptions\ExtensionTemplateException('This is a test exception', 45);

        $this->assertTrue($ex instanceof Exceptions\ExtensionTemplateException);
        $this->assertEquals((string) $ex->getMessage(), 'This is a test exception');
        $this->assertEquals($ex->getCode(), 45);
        $this->assertTrue(false == empty($ex->getTrace()));

        return $ex;
    }

    /**
     * Check that exception is correctly thrown.
     *
     * @depends testValidPassArgsToConstructor
     */
    public function testValidThrowException(\Exception $ex): void
    {
        $this->expectException(Exceptions\ExtensionTemplateException::class);

        throw $ex;
    }
}
