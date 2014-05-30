<?php
/**
 * Copyright (C) 2014 Antonio Murdaca <me@runcom.ninja>
 *
 * This file is part of RuncomEanValidationBundle.
 *
 * $3 is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * $3 is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with $3. If not, see <http://www.gnu.org/licenses/>.
 */

$composerAutoload = __DIR__.'/../vendor/autoload.php';

if (is_file($composerAutoload)) {
    include $composerAutoload;
} else {
    die('Unable to find autoload.php file, please use composer to load dependencies:

curl -s http://getcomposer.org/installer | php
php composer.phar install

Visit http://getcomposer.org/doc/01-basic-usage.md for more information.

');
}

spl_autoload_register(function($class)
    {
        if (0 === strpos($class, 'Runcom\\EanValidationBundle\\')) {
            $path = implode('/', array_slice(explode('\\', $class), 2)).'.php';
            require_once __DIR__.'/../'.$path;
            return true;
        }
    });
 