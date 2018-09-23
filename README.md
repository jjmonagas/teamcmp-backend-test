# teamcmp-backend-test

## Requirements

* PHP 7.1.3 or higher;

## Installation

```
git clone 
cd teamcmp-backend-test/
composer install
```

## Usage

##### Import Glorf videos 
```
cd teamcmp-backend-test/
php bin/console teamcmp:import-videos glorf
```

##### Import Flub videos 
```
cd teamcmp-backend-test/
php bin/console teamcmp:import-videos flub
```

##### Import Glorf videos dynamic PATH and FILENAME 
```
cd teamcmp-backend-test/
php bin/console teamcmp:import-videos glorf --path=/feed-exports --filename=glorf.json
```

##### Import Flub videos dynamic PATH and FILENAME (shortcuts -p -f)
```
cd teamcmp-backend-test/
php bin/console teamcmp:import-videos flub -p /feed-exports -f flub.yaml
```

## Tests with Symfony PHPUnit Testing Framework

##### Run all tests
```
cd teamcmp-backend-test/
php bin/phpunit 
```

##### Run Functional Command test
```
cd teamcmp-backend-test/
php bin/phpunit tests/Command/ImportVideosCommandTest.php
```

##### Run Unit test (Check /feed-exports directory and files)
```
cd teamcmp-backend-test/
php bin/phpunit tests/Utils/FileDataSourceTest.php
```

##### Run Unit test (Check Glorf Json File Schema)
```
cd teamcmp-backend-test/
php bin/phpunit tests/GlorfFileJsonSchemaTest.php
```







