<?php
namespace NeosMeetupHH\Presentation\ViewHelpers;

use TYPO3\Fluid\Core\ViewHelper\AbstractViewHelper;
use Michelf\Markdown;

class MarkdownViewHelper extends AbstractViewHelper
{
    /**
     * @var boolean
     */
    protected $escapeOutput = false;

    public function render() {
        $content = $this->renderChildren();
        return Markdown::defaultTransform($content);
    }
}
