<?php
namespace NeosMeetupHH\Presentation\Aspects;

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Aop\JoinPointInterface;
use TYPO3\Flow\Log\SystemLoggerInterface;

/**
 * @Flow\Aspect
 * @Flow\Scope("singleton")
 */
class CountViewHelperCallsAspect
{

    /**
     * @var integer
     */
    protected $numberOfViewHelperCalls = 0;

    /**
     * @Flow\Inject
     * @var SystemLoggerInterface
     */
    protected $logger;

    /**
     * @Flow\After("method(.*ViewHelper->render())")
     * @return void
     */
    public function countViewHelperCall(JoinPointInterface $joinPoint) {
        $this->numberOfViewHelperCalls++;
    }

    /**
     * @Flow\After("method(TYPO3\Neos\View\TypoScriptView->render())")
     * @return void
     */
    public function logNumberOfViewHelperCalls() {
        $this->logger->log(sprintf('%d view helper calls in total', $this->numberOfViewHelperCalls));
    }
}
