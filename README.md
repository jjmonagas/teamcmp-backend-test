# teamcmp-backend-test

## Requirements

* PHP 7.1.3 or higher;

## Installation

```
git clone https://github.com/jjmonagas/teamcmp-backend-test.git
cd teamcmp-backend-test/
composer install
```

## Usage

```
cd teamcmp-backend-test/
```

##### Import Glorf videos 
```
php bin/console teamcmp:import-videos glorf
```

##### Import Flub videos 
```
php bin/console teamcmp:import-videos flub
```

##### Import Glorf videos dynamic PATH and FILENAME 
```
php bin/console teamcmp:import-videos glorf --path=/feed-exports --filename=glorf.json
```

##### Import Flub videos dynamic PATH and FILENAME (shortcuts -p -f)
```
php bin/console teamcmp:import-videos flub -p /feed-exports -f flub.yaml
```

## Tests with Symfony PHPUnit Testing Framework

```
cd teamcmp-backend-test/
```

##### Run all tests
```
php bin/phpunit 
```

##### Run Functional Command test
```
php bin/phpunit tests/Command/ImportVideosCommandTest.php
```

##### Run Unit test (Check /feed-exports directory and files)
```
php bin/phpunit tests/Utils/FileDataSourceTest.php
```

##### Run Unit test (Check Glorf Json File Schema)
```
php bin/phpunit tests/GlorfFileJsonSchemaTest.php
```
