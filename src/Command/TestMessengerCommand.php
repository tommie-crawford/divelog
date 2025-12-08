<?php

namespace App\Command;

use App\Message\TestMessage;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsCommand(name: 'app:test-messenger')]
final class TestMessengerCommand extends Command
{
    public function __construct(
        private MessageBusInterface $bus
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Dispatching message...');

        $this->bus->dispatch(
            new TestMessage('Hello from Messenger + RabbitMQ!')
        );

        $output->writeln('Message dispatched.');

        return Command::SUCCESS;
    }
}
