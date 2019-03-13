<?php

namespace Hackoro\Bundle\WorkflowLoader\EventListener;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Oro\Bundle\WorkflowBundle\Entity\Repository\WorkflowItemRepository;
use Oro\Bundle\WorkflowBundle\Entity\WorkflowItem;
use Oro\Bundle\WorkflowBundle\Entity\WorkflowStep;
use Oro\Bundle\WorkflowBundle\Event\WorkflowChangesEvent;
use Oro\Bundle\OrderBundle\Entity\Order;

class UpdateWorkflowDefinitionListener
{
    /**
     * @var Registry $registry
     */
protected $registry;

    public function __construct(Registry $registry)
    {
        $this->registry = $registry;
    }
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

        if (!empty($deletedStepNames)) {
            throw new \InvalidArgumentException(sprintf('There are still some deleted steps that have not been dealt with: %s', implode(',', $deletedStepNames)));
        }

        $wfiRepository = $this->registry->getRepository(WorkflowItem::class);
        $wfiRepository->getEntityIdsByEntityClassAndWorkflowStepIds($event->getDefinition()->getRelatedEntity(), [2]);

        // TODO remove the steps, that have no entities

        // TODO deal with the deleted steps

        // there are still some deleted steps that have not been dealt with

    }
}
