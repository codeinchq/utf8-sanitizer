<?php
/*
 * Copyright (c) 2022 Code Inc. - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Visit <https://www.codeinc.co> for more information
 */

declare(strict_types=1);

namespace CodeInc\Utf8Sanitizer;

use function iconv;

class Utf8Sanitizer
{
    public function sanitize(string $string): string
    {
        if (!$this->isValidUtf8($string)) {
            $string = (string)@iconv('CP1252', 'UTF-8', $string);
        }
        return $string;
    }

    public function isValidUtf8(string $string): bool
    {
        return (bool)preg_match(
            '%^(?:
              [\x09\x0A\x0D\x20-\x7E]            # ASCII
            | [\xC2-\xDF][\x80-\xBF]             # non-overlong 2-byte
            | \xE0[\xA0-\xBF][\x80-\xBF]         # excluding overlongs
            | [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}  # straight 3-byte
            | \xED[\x80-\x9F][\x80-\xBF]         # excluding surrogates
            | \xF0[\x90-\xBF][\x80-\xBF]{2}      # planes 1-3
            | [\xF1-\xF3][\x80-\xBF]{3}          # planes 4-15
            | \xF4[\x80-\x8F][\x80-\xBF]{2}      # plane 16
            )*$%x',
            $string
        );
    }
}