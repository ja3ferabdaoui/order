<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

class ImportOrdersCommandTest extends KernelTestCase
{
    /**
     * Test import orders command (order:import-orders)
     */
    public function testImportOrders()
    {
        $kernel = static::createKernel();
        $application = new Application($kernel);
        $command = $application->find('app:get-orders-list');
        $commandTester = new CommandTester($command);
        $commandTester->execute(array('command' => $command->getName()));
        $this->assertContains('Successfully load xml orders', $commandTester->getDisplay());
    }
}