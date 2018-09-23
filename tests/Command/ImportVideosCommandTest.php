<?php
/**
 * Created by PhpStorm.
 * User: jjmonagas
 * Date: 23/9/18
 * Time: 20:26
 */

namespace App\Tests\Command;


use App\Command\ImportVideosCommand;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

class ImportVideosCommandTest extends KernelTestCase
{
    public function testExecute()
    {
        $kernel = self::bootKernel();
        $application = new Application($kernel);

        // returns the real and unchanged service container
        $container = self::$kernel->getContainer();

        // gets the special container that allows fetching private services
        $container = self::$container;
        $application->add(new ImportVideosCommand($container->get('App\Utils\ParserFactory'), $container->get('App\Services\VideoManager'), $container->getParameter('kernel.project_dir')));

        $command = $application->find('teamcmp:import-videos');
        $commandTester = new CommandTester($command);
        $commandTester->execute(array(
            'command'  => $command->getName(),

            // pass arguments to the helper
            'source' => 'glorf',

            // prefix the key with two dashes when passing options,
            // e.g: '--some-option' => 'option_value',
        ));

        // the output of the command in the console
        $output = $commandTester->getDisplay();
        $this->assertContains('Success', $output);

        // ...
    }
}