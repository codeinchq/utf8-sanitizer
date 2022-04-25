# UTF-8 sanitizer

A simple UTF-8 sanitizer written in PHP 8. 

## Usage
```php
<?php

$sanitizer = new \CodeInc\Utf8Sanitizer\Utf8Sanitizer();
$sanitizer->isValidUtf8("A valid UTF-8 string."); // true

$validString = $sanitizer->sanitize("An invalid UTF-8 string.");

```


## Installation
This library is available through [Packagist](https://packagist.org/packages/codeinc/utf8-sanitizer) and can be installed using [Composer](https://getcomposer.org/):

```bash
composer require codeinc/utf8-sanitizer
```


## License
This library is published under the MIT license (see the [LICENSE](LICENSE) file). 
