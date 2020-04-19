# Extension Template for Symphony CMS

[[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/pointybeard/symext_extension-template/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/pointybeard/symext_extension-template/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/pointybeard/symext_extension-template/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/pointybeard/symext_extension-template/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/pointybeard/symext_extension-template/badges/build.png?b=master)](https://scrutinizer-ci.com/g/pointybeard/symext_extension-template/build-status/master)

A template extension for [Symphony CMS][ext-Symphony CMS] that provides a folder structure, tools, and examples for developers. The goal is to standardise the creation of new Extensions by pre-preparing as much as possible.

-   [Installation](#installation)
-   [Basic Usage](#basic-usage)
-   [About](#about)
    -   [Requirements](#dependencies)
    -   [Dependencies](#dependencies)
-   [Documentation](#documentation)
-   [Support](#support)
-   [Contributing](#contributing)
-   [License](#license)

## Installation

Clone the latest version to your `/extensions` folder and run composer to install required packaged with

### Manually (git + composer)
```bash
$ git clone --depth 1 https://github.com/pointybeard/symext_extension-template.git extensiontemplate
$ composer update -vv --profile -d ./extensiontemplate
```
After finishing the steps above, enable "Extension Template" though the administration interface or, if using [Orchestra][ext-Orchestra], with `bin/extension enable extensiontemplate`.

### With Orchestra

1. Add the following extension defintion to your `.orchestra/build.json` file in the `"extensions"` block:

```json
{
    "name": "extensiontemplate",
    "repository": {
        "url": "https://github.com/pointybeard/symext_extension-template.git"
    }
}
```

2. Run the following command to rebuild your Extensions

```bash
$ bin/orchestra \
    --skip-create-author \
    --skip-skip-seeders \
    --skip-git-reset \
    --skip-postbuild
```

## Basic Usage

1.   Start by deleting the `.git` directory, making way for your own project.

```bash
$ rm -R .git/
```

2.   Next, replace all instances of `Extension Template for Symphony CMS` and `pointybeard/symext_extension-template` with your own project's title and expected GitHub repository details, and `ExtensionTemplate` to reflect the Symphony CMS compatible extension name (this can be achieved with a project with search+replace in your favourite IDE).
3.   Rename `src/ExtensionTemplate` to match the name of your extension.

```bash
$ mv src/ExtensionTemplate src/MyCoolExtension
```

4.   Update project name, author information, and project description details in `composer.json`, `extension.json`, `extension.meta.xml`.

5. During development, use the following commands to perform various functions like code linting and running the test suite.

```bash
## Run PHP CS Fixer over the extension codebase
$ composer run-script tidy

## Same as above, however, no file will be actually altered
$ composer run-script tidyDry

## Execute the parallel-link syntax checking and phpunit test
## suite
$ composer run-script test

## Removes folders created during composer installation.
## Specifically commands, data-sources, events, fields, and vendor
$ composer run-script clean

## php-commitizen ensures your git commit messages adhere to
## Conventional Commits (https://www.conventionalcommits.org)
$ vendor/bin/php-commitizen -a
```

6. Modify the contents of `.docs/` to suit your project.
7. Modify the `README.md`, `CHANGELOG.md`, and `LICENCE` files as required.

## About

### Requirements

- This extension works with PHP 7.3 or above.
- The [Console Extension for Symphony CMS][req-console] must also be installed.

### Dependencies

This extension depends on the following Composer libraries:

-   [PHP Helpers][dep-helpers]
-   [Symphony Section Class Mapper][dep-classmapper]
-   [Symphony CMS: Extended Base Class Library][dep-symphony-extended]
-   [Symphony CMS: Section Builder][dep-section-builder]
-   [Monolog - Logging for PHP][dep-monolog]

## Documentation

Read the [full documentation here][ext-docs].

## Support

If you believe you have found a bug, please report it using the [GitHub issue tracker][ext-issues],
or better yet, fork the library and submit a pull request.

## Contributing

We encourage you to contribute to this project. Please check out the [Contributing to this project][doc-CONTRIBUTING] documentation for guidelines about how to get involved.

## Author
-   Alannah Kearney - hi@alannahkearney.com - http://twitter.com/pointybeard
-   See also the list of [contributors][ext-contributor] who participated in this project

## License
"Extension Template for Symphony CMS" is released under the MIT License. See [LICENCE][doc-LICENCE] for details.

[doc-CONTRIBUTING]: https://github.com/pointybeard/symext_extension-template/blob/master/CONTRIBUTING.md
[doc-LICENCE]: http://www.opensource.org/licenses/MIT
[req-console]: https://github.com/pointybeard/console
[dep-helpers]: https://github.com/pointybeard/helpers
[dep-classmapper]: https://github.com/pointybeard/symphony-classmapper
[dep-symphony-extended]: https://github.com/pointybeard/symphony-extended
[dep-section-builder]: https://github.com/pointybeard/symphony-section-builder
[dep-monolog]: https://github.com/Seldaek/monolog
[ext-issues]: https://github.com/pointybeard/symext_extension-template/issues
[ext-Symphony CMS]: http://getsymphony.com
[ext-Orchestra]: https://github.com/pointybeard/orchestra
[ext-contributor]: https://github.com/pointybeard/symext_extension-template/contributors
[ext-docs]: https://github.com/pointybeard/symext_extension-template/blob/master/.docs/toc.md
