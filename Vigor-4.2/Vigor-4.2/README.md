## Fitness Setup Instructions

Requirements

1. [Composer](https://getcomposer.org/)
1. [NodeJS](http://nodejs.org/)
1. [Bower](http://bower.io/)

Once you have the requirements installed follow the steps below to install the project dependencies.

Installing (CLI)

```
composer install
```

```
bower install
```

Add your computer name to the local array under

```
bootstrap/start.php
```

```
$env = $app->detectEnvironment([
	'local' => ['EX54391R99NGEC']
]);
```

Once your dependencies are installed edit the

```
.env.php-example
```

File to

```
.env.local.php
```

And change the appropriate variables to your environment configuration.


Notes:

Change

```
variables_order="GPCS"
```

to

```
variables_order="EGPCS"
```

in your php.ini