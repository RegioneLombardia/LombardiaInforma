<?php
/**
 * SCSSPHP
 *
 *
 *
 */

namespace Leafo\ScssPhp\Formatter;

use Leafo\ScssPhp\Formatter;
use Leafo\ScssPhp\Formatter\OutputBlock;

/**
 * Debug formatter
 *
 */
class Debug extends Formatter
{
    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        $this->indentLevel = 0;
        $this->indentChar = '';
        $this->break = "\n";
        $this->open = ' {';
        $this->close = ' }';
        $this->tagSeparator = ', ';
        $this->assignSeparator = ': ';
        $this->keepSemicolons = true;
    }

    /**
     * {@inheritdoc}
     */
    protected function indentStr()
    {
        return str_repeat('  ', $this->indentLevel);
    }

    /**
     * {@inheritdoc}
     */
    protected function blockLines(OutputBlock $block)
    {
        $indent = $this->indentStr();

        if (empty($block->lines)) {
            $this->write("{$indent}block->lines: []\n");

            return;
        }

        foreach ($block->lines as $index => $line) {
            $this->write("{$indent}block->lines[{$index}]: $line\n");
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function blockSelectors(OutputBlock $block)
    {
        $indent = $this->indentStr();

        if (empty($block->selectors)) {
            $this->write("{$indent}block->selectors: []\n");

            return;
        }

        foreach ($block->selectors as $index => $selector) {
            $this->write("{$indent}block->selectors[{$index}]: $selector\n");
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function blockChildren(OutputBlock $block)
    {
        $indent = $this->indentStr();

        if (empty($block->children)) {
            $this->write("{$indent}block->children: []\n");

            return;
        }

        $this->indentLevel++;

        foreach ($block->children as $i => $child) {
            $this->block($child);
        }

        $this->indentLevel--;
    }

    /**
     * {@inheritdoc}
     */
    protected function block(OutputBlock $block)
    {
        $indent = $this->indentStr();

        $this->write("{$indent}block->type: {$block->type}\n" .
             "{$indent}block->depth: {$block->depth}\n");

        $this->currentBlock = $block;

        $this->blockSelectors($block);
        $this->blockLines($block);
        $this->blockChildren($block);
    }
}
