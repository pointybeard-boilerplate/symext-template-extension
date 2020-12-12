<?php

declare(strict_types=1);

/*
 * This file is part of the "Template Extension for Symphony CMS" repository.
 *
 * Copyright 2020 Alannah Kearney <hi@alannahkearney.com>
 *
 * For the full copyright and license information, please view the LICENCE
 * file that was distributed with this source code.
 */

namespace TemplateExtension\Tests;

use PHPUnit\Framework\TestCase;
use pointybeard\Symphony\Extensions\TemplateExtension\Exceptions;

final class TemplateExtensionExceptionTest extends TestCase
{
    /**
     * Create TemplateExtensionException object and check that constructor
     * args were set correctly.
     */
    public function testValidPassArgsToConstructor(): \Exception
    {
        $ex = new Exceptions\TemplateExtensionException('This is a test exception', 45);

        $this->assertTrue($ex instanceof Exceptions\TemplateExtensionException);
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
        $this->expectException(Exceptions\TemplateExtensionException::class);

        throw $ex;
    }
}
