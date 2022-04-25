# UTF-8 sanitizer

A simple UTF-8 sanitizer written in PHP 8 using [iconv](https://www.php.net/manual/fr/book.iconv.php). This code is based after this [StackOverflow response](https://stackoverflow.com/a/1523574/1839947) and the W3C UTF-8 verification [recommended regular expression](https://www.w3.org/International/questions/qa-forms-utf-8.en).  

## Usage
```php
<?php

$sanitizer = new \CodeInc\Utf8Sanitizer\Utf8Sanitizer();

// validates a UTF-8 string
$sanitizer->isValidUtf8("A valid UTF-8 string."); // true

// sanitizes a string 
$validString = $sanitizer->sanitize("An invalid UTF-8 string.");
```


## Installation
This library is available through [Packagist](https://packagist.org/packages/codeinc/utf8-sanitizer) and can be installed using [Composer](https://getcomposer.org/):

```bash
composer require codeinc/utf8-sanitizer
```


## License
This library is published under the MIT license (see the [LICENSE](LICENSE) file). 
