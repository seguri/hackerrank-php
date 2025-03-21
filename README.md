# hackerrank-php

I'm using this project to learn about PHP.

## Composer

It's a dependency manager that can be installed locally:

- as a single file `composer.phar` in the project directory
- reads a `composer.json` file
- installs required packages in a `vendor/` directory

### Installation

The instructions are [here](https://getcomposer.org/download/).

The first command throws:

```
> php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
Warning: copy(): Unable to find the wrapper "https" - did you forget to enable it when you configured PHP? in Command line code on line 1
Warning: copy(): Unable to find the wrapper "https" - did you forget to enable it when you configured PHP? in Command line code on line 1
Warning: copy(): Unable to find the wrapper "https" - did you forget to enable it when you configured PHP? in Command line code on line 1
Warning: copy(https://getcomposer.org/installer): Failed to open stream: No such file or directory in Command line code on line 1
```

Check where your `php.ini` is:

```
> php --ini
Configuration File (php.ini) Path:
Loaded Configuration File:         (none)
Scan for additional .ini files in: (none)
Additional .ini files parsed:      (none)
```

I've installed PHP with `winget`, so I create a new `php.ini` with:

```
> cd "$env:LOCALAPPDATA\Microsoft\WinGet\Packages\PHP.PHP.8.2_Microsoft.Winget.Source_8wekyb3d8bbwe"
> cp php.ini-production php.ini
```

And uncomment the line `;extension=openssl`.

After a new error:

```
> php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
PHP Warning:  PHP Startup: Unable to load dynamic library 'openssl' (tried: C:\php\ext\openssl (The specified module could not be found), C:\php\ext\php_openssl.dll (The specified module could not be found)) in Unknown on line 0
PHP Warning:  copy(): Unable to find the wrapper "https" - did you forget to enable it when you configured PHP? in Command line code on line 1
PHP Warning:  copy(): Unable to find the wrapper "https" - did you forget to enable it when you configured PHP? in Command line code on line 1
PHP Warning:  copy(): Unable to find the wrapper "https" - did you forget to enable it when you configured PHP? in Command line code on line 1
PHP Warning:  copy(https://getcomposer.org/installer): Failed to open stream: No such file or directory in Command line code on line 1
```

I decided to use the Windows installer from [getcomposer.org](https://getcomposer.org/download/).


## Structure

I initially started with something very simple:

```
.
└── leetcode
    └── _1
        └── Solution.php
```

But this doesn't respect something called "PSR-4 project structure".
I've reorganized the project like:

```
.
├── README.md
├── composer.json
├── composer.lock
├── src
│   └── Leetcode
│       └── _1
│           └── Solution.php
└── tests
    └── Leetcode
        └── _1
            └── SolutionTest.php
```

and each solution is now declared in a namespace like `namespace Solutions\Leetcode\_1;`.
Namespaces are mapped to the matching folders in `composer.json`.

## Unit tests

After installing `phpunit`, I created a unit test just like I do in [hackerrank-kotlin](https://github.com/seguri/hackerrank-kotlin).

Test methods need to start with `test` to be recognized as tests.

## Basic syntax

### Containers

Variables:

```
$myString = "Hello, PHP!";
$myNumber = 42;
```

Functions:

```
function greet($name) {
    return "Hello, " . $name . "!";
}

echo greet("World");
```

Classes:

```
class MyClass {
    public $property = "Example";

    public function method() {
        return $this->property;
    }
}

$obj = new MyClass();
echo $obj->method();
```

### Comparisons

Strict equality:

```
var_dump(0 == "hello"); // bool(true)
var_dump(0 === "hello"); // bool(false)
var_dump(1 == true); // bool(true)
var_dump(1 === true); // bool(false)
var_dump(null == ""); // bool(true)
var_dump(null === ""); // bool(false)
```

Compare:

```
var_dump(null <=> 0); // int(-1)
var_dump(0 <=> null); // int(1)
var_dump(null <=> null); // int(0)
```

Null management:

```
is_null(null); // true

// Null Coalescing Operator
$username = $_GET['user'] ?? 'guest';

// Null Coalescing Assignment Operator
$userAge = $_GET['age'] ?? null;
$userAge ??= 18;
```

### Flow control

Ifs:

```
$x = 10;

if ($x > 5) {
    echo "x is greater than 5";
} elseif ($x === 5) {
    echo "x is equal to 5";
} else {
    echo "x is less than 5";
}
```

### Loops

For:

```
for ($i = 0; $i < 5; $i++) {
    echo $i . " ";
}
```

For-each:

```
$arr = [1, 2, 3];
foreach ($arr as $value) {
    echo $value . " ";
}
```

While:

```
$i = 0;
while ($i < 3) {
    echo $i++ . " ";
}
```

### Data structures

Arrays:

```
$myArray = [1, 2, "three"];
```

Dictionaries:

```
$myDict = ["name" => "John", "age" => 30];
```
