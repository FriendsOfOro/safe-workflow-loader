<?php

namespace Hackoro\Bundle\WorkflowLoader\Command;

use Oro\Bundle\WorkflowBundle\Command\LoadWorkflowDefinitionsCommand as OroLoadWorkflowDefinitionsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Decorates the original oro:workflow:definitions:load command
 */
class LoadWorkflowDefinitionsCommand extends OroLoadWorkflowDefinitionsCommand
{
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // TODO
        parent::execute($input, $output);
    }
}
