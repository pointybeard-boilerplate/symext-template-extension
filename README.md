# Template Extension for Symphony CMS

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/pointybeard-boilerplate/symext-template-extension/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/pointybeard-boilerplate/symext-template-extension/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/pointybeard-boilerplate/symext-template-extension/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/pointybeard-boilerplate/symext-template-extension/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/pointybeard-boilerplate/symext-template-extension/badges/build.png?b=master)](https://scrutinizer-ci.com/g/pointybeard-boilerplate/symext-template-extension/build-status/master)

A template extension for [Symphony CMS][ext-Symphony CMS] that provides a folder structure, tools, and examples for developers. The goal is to standardise the creation of new Extensions by pre-preparing as much as possible. Use everything in this repository as a guide when building your own extensions.

-   [Installation](#installation)
    -   [With Git and Composer](#with-git-and-composer)
    -   [With Orchestra](#with-orchestra)
-   [Basic Usage](#basic-usage)
-   [About](#about)
    -   [Requirements](#dependencies)
    -   [Dependencies](#dependencies)
-   [Documentation](#documentation)
-   [Support](#support)
-   [Contributing](#contributing)
-   [License](#license)

## Installation

This is an extension for [Symphony CMS][ext-Symphony CMS]. Add it to the `/extensions` folder of your Symphony CMS installation, then enable it though the interface.

### With Git and Composer

```bash
$ git clone --depth 1 https://github.com/pointybeard-boilerplate/symext-template-extension.git extensions/template_extension
$ composer update -vv --profile -d ./extensions/template_extension
```
After finishing the steps above, enable "Extension Template" though the administration interface or, if using [Orchestra][ext-Orchestra], with `bin/extension enable template_extension`.

### With Orchestra

1. Add the following extension defintion to your `.orchestra/build.json` file in the `"extensions"` block:

```json
{
    "name": "template_extension",
    "repository": {
        "url": "https://github.com/pointybeard/symext-template-extension.git",
        "branch": "main",
        "target": "template_extension"
    }
}
```

2. Run the following command to rebuild your Extensions

```bash
$ bin/orchestra build \
    --skip-import-sections \
    --database-skip-import-data \
    --database-skip-import-structure \
    --skip-create-author \
    --skip-seeders \
    --skip-git-reset \
    --skip-composer \
    --skip-postbuild
```

## Basic Usage

This repository is intended to be a template for your own extension projects. Everything in this `README.md` file serves as both documentation on how to use this template but also as an example to modify for your own project. Follow the steps below to start customising this template to suit your project.

1.   Start by deleting the `.git` directory, making way for your own project.

```bash
$ rm -R .git/
$ git init
```

Alternatively, use the "Use this template" feature on the GitHub repository page (<https://github.com/pointybeard-boilerplate/symext-template-extension>).

2.   Next, replace all instances of `Template Extension for Symphony CMS`, `pointybeard/symext-template-extension`, `symext-template-extension`, `TemplateExtension`, and `template_extension` with your own project's title and expected GitHub repository details (this can be achieved with a project wide search+replace in your favourite editor). **Note that `template_extension` must be replaced with a Symphony CMS compatible extension name.**

3.   Rename `src/TemplateExtension` to match the name of your extension.

```bash
$ mv src/TemplateExtension src/MyCoolExtension
```

4.   Update project name, author information, and project description details in `composer.json`, `extension.json`, `extension.meta.xml`, `LICENCE`, `CHANGELOG.md`, `README.md`, and `.php_cs.dist`.

5. During development, use the following commands to perform various functions like code linting and running the test suite.

```bash
## Run PHP CS Fixer over the extension codebase
$ composer run-script tidy

## Same as above, however, no file will actually be modified
$ composer run-script tidyDry

## Execute the php-parallel-lint syntax checking and phpunit test suite
$ composer run-script test

## Removes folders created during composer installation.
## Specifically commands, data-sources, events, fields, and vendor
$ composer run-script clean

## php-commitizen ensures your git commit messages adhere to
## Conventional Commits (https://www.conventionalcommits.org)
$ vendor/bin/php-commitizen -a
```

6. Modify the contents of `.docs/` to suit your project.
7. Further modify the `README.md`, `CHANGELOG.md`, and `LICENCE` files as required, using their existing structure as a guide

## About

### Requirements

- This extension works with PHP 7.4 or above.
- The [Console Extension for Symphony CMS][req-console] must also be installed.

### Dependencies

This extension depends on the following Composer libraries:

-   [PHP Helpers][dep-helpers]
-   [Symphony Section Class Mapper][dep-classmapper]
-   [Symphony CMS: Extended Base Class Library][dep-symphony-extended]
-   [Symphony CMS: Section Builder][dep-section-builder]

## Documentation

Read the [full documentation here][ext-docs].

## Support

If you believe you have found a bug, please report it using the [GitHub issue tracker][ext-issues],
or better yet, fork the library and submit a pull request.

## Contributing

We encourage you to contribute to this project. Please check out the [Contributing to this project][doc-CONTRIBUTING] documentation for guidelines about how to get involved.

## Author
-   Alannah Kearney - <https://github.com/pointybeard>
-   See also the list of [contributors][ext-contributor] who participated in this project

## License
"Template Extension for Symphony CMS" is released under the MIT License. See [LICENCE][doc-LICENCE] for details.

[doc-CONTRIBUTING]: https://github.com/pointybeard-boilerplate/symext-template-extension/blob/master/CONTRIBUTING.md
[doc-LICENCE]: http://www.opensource.org/licenses/MIT
[req-console]: https://github.com/pointybeard/console
[dep-helpers]: https://github.com/pointybeard/helpers
[dep-classmapper]: https://github.com/pointybeard/symphony-classmapper
[dep-symphony-extended]: https://github.com/pointybeard/symphony-extended
[dep-section-builder]: https://github.com/pointybeard/symphony-section-builder
[ext-issues]: https://github.com/pointybeard-boilerplate/symext-template-extension/issues
[ext-Symphony CMS]: http://getsymphony.com
[ext-Orchestra]: https://github.com/pointybeard/orchestra
[ext-contributor]: https://github.com/pointybeard-boilerplate/symext-template-extension/contributors
[ext-docs]: https://github.com/pointybeard-boilerplate/symext-template-extension/blob/master/.docs/toc.md
