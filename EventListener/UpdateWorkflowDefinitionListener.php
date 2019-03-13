<?php

namespace Hackoro\Bundle\WorkflowLoader\EventListener;

use Oro\Bundle\WorkflowBundle\Entity\WorkflowStep;
use Oro\Bundle\WorkflowBundle\Event\WorkflowChangesEvent;

class UpdateWorkflowDefinitionListener
{

    /**
     * @param WorkflowChangesEvent $event
     */
    public function onUpdateWorkflowDefinition(WorkflowChangesEvent $event)
    {
        $newSteps = $event->getDefinition()->getSteps()->toArray();
        $oldSteps = $event->getOriginalDefinition()->getSteps()->toArray();

        $getStepName = function(WorkflowStep $step){
            return $step->getName();
        };

        $newStepNames = array_map($getStepName, $newSteps);
        $oldStepNames = array_map($getStepName, $oldSteps);

        $deletedStepNames = array_diff($oldStepNames, $newStepNames);

        // TODO find if there are any entities on the deleted steps

        // TODO remove the steps, that have no entities

        // TODO deal with the deleted steps

        // there are still some deleted steps that have not been dealt with
        if (!empty($deletedStepNames)) {
            throw new \InvalidArgumentException(sprintf('There are still some deleted steps that have not been dealt with: %s', implode(',', $deletedStepNames)));
        }
    }
}
