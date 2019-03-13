<?php

namespace Hackoro\Bundle\WorkflowLoader\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Process\Process;

class CheckWorkflowCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('hackoro:safeworkflow');
        parent::configure();
    }

        /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return string
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
    }
}