# Introduction

This repository contains KoolReport examples for data source types

# Installation

Clone or download the repository source code into your machine:

```
git clone https://github.com/koolreport/examples-datasources.git
```
If you have not installed KoolReport, go to the source code directory and run composer to install KoolReport:

```
cd path/to/examples-datasources
composer install
```

Open and edit the file `common.php` to require the `autload.php` file 
which includes KoolReport installation:

```
require_once "path/to/koolreport/core/autoload.php";
//or
require_once "path/to/vendor/autoload.php";
```

Finally, put the repository source code into your web server and serve it

# Source code structure

The source code includes an `assets` subdirectory of css/js files, a `data` subdirectory of csv/excel/sql data files 
and most importantly a `reports` subdirectory of report source code files which you could copy and use for your project.