<?php

namespace Hackoro\Bundle\WorkflowLoader\Command;

use Oro\Bundle\WorkflowBundle\Command\LoadWorkflowDefinitionsCommand as OroLoadWorkflowDefinitionsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;


/**
 * Decorates the original oro:workflow:definitions:load command
 */
class LoadWorkflowDefinitionsCommand extends OroLoadWorkflowDefinitionsCommand
{

    protected function configure()
    {
        parent::configure();
        $this->addOption(
            'dry-run',
            '-d',
            InputOption::VALUE_OPTIONAL);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // TODO
        parent::execute($input, $output);
    }
}
