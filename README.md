RuncomEanValidationBundle [![Build Status](https://api.travis-ci.org/runcom/RuncomEanValidationBundle.png)](https://travis-ci.org/runcom/RuncomEanValidationBundle) [![Latest Stable Version](https://poser.pugx.org/runcom/ean-validation-bundle/v/stable.svg)](https://packagist.org/packages/runcom/ean-validation-bundle) [![Total Downloads](https://poser.pugx.org/runcom/ean-validation-bundle/downloads.svg)](https://packagist.org/packages/runcom/ean-validation-bundle) [![Latest Unstable Version](https://poser.pugx.org/runcom/ean-validation-bundle/v/unstable.svg)](https://packagist.org/packages/runcom/ean-validation-bundle) [![License](https://poser.pugx.org/runcom/ean-validation-bundle/license.svg)](https://packagist.org/packages/runcom/ean-validation-bundle)
=====================
This bundle provides validation constraints for EAN8 and EAN13 with annotations.

### Installation

```json
{
    "require": {
        "runcom/ean-validation-bundle": "~0.1"
    }
}
```

register the bundle in your AppKernel.php

```php
$bundles[] = new Runcom\EanValidationBundle\RuncomEanValidationBundle();
```

### Usage

```php
    use Runcom\EanValidationBundle\Validator\Constraints\Ean;

    // ...

    /**
     * @Ean
     */
```

Or just initialize `new Ean()` in your forms.