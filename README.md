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

## Where to find my code

This is a Symfony4 project with its new directory structure:

* /src -->  Source code
* /src/Command/ImportVideosCommand.php --> Command line code
* /src/Model/ --> Interfaces and Data Models
* /src/Services/ --> Symfony services
* /src/Utils/ --> Helpers and Factories
* /tests --> Unit and Functional tests code
*/feed-exports --> Test files directory

## My first time writing a unit/functional tests, using PHPUnit Testing Framework for Symfony

Thnaks to this framework it was easy to create and run tests. 


## What would I have done differently if I had had more time

* I would create a factory or something better to read data form different sources, now it is inside de Command line class (/src/Command/ImportVideosCommand.php)
* I would add versioning to data source files
* I would create a new Entity to save Command logs
* I would add more validation in whole code
* More tests
* Create a RabbitMQ server and create a worker that runs this command when detect new files in /feed-exports
