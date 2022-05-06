<?php
/*
 * Copyright (c) 2022 Code Inc. - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Visit <https://www.codeinc.co> for more information
 */

declare(strict_types=1);

namespace CodeInc\Tests\Utf8Sanitizer;

use CodeInc\Utf8Sanitizer\Utf8Sanitizer;
use PHPUnit\Framework\TestCase;

class Utf8SanitizerTest extends TestCase
{
    public const CLEAN_UTF8 = "This ïs a cléàn string \\ with sp&ci@l | character\$.";
    public const BOGUS_UTF8 = "This ïs a bôgù$ \xF0\x9D\x91\x9B\xF0\x9D ЂЃ UTF—8 string.";

    public function testIsValidUtf8(): void
    {
        $utf8Sanitizer = new Utf8Sanitizer();
        self::assertTrue($utf8Sanitizer->isValidUtf8(self::CLEAN_UTF8));
        self::assertFalse($utf8Sanitizer->isValidUtf8(self::BOGUS_UTF8));
    }

    public function testSanitize(): void
    {
        $utf8Sanitizer = new Utf8Sanitizer();
        self::assertEquals(self::CLEAN_UTF8, $utf8Sanitizer->sanitize(self::CLEAN_UTF8));
        self::assertTrue(strcmp(self::BOGUS_UTF8, $utf8Sanitizer->sanitize(self::BOGUS_UTF8)) !== 0);
    }
}