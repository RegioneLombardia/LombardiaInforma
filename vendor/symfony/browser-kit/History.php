<?php

/*
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 */

namespace Symfony\Component\BrowserKit;

/**
 * History.
 *
 */
class History
{
    protected $stack = [];
    protected $position = -1;

    /**
     * Clears the history.
     */
    public function clear()
    {
        $this->stack = [];
        $this->position = -1;
    }

    /**
     * Adds a Request to the history.
     */
    public function add(Request $request)
    {
        $this->stack = \array_slice($this->stack, 0, $this->position + 1);
        $this->stack[] = clone $request;
        $this->position = \count($this->stack) - 1;
    }

    /**
     * Returns true if the history is empty.
     *
     * @return bool true if the history is empty, false otherwise
     */
    public function isEmpty()
    {
        return 0 == \count($this->stack);
    }

    /**
     * Goes back in the history.
     *
     * @return Request A Request instance
     *
     * @throws \LogicException if the stack is already on the first page
     */
    public function back()
    {
        if ($this->position < 1) {
            throw new \LogicException('You are already on the first page.');
        }

        return clone $this->stack[--$this->position];
    }

    /**
     * Goes forward in the history.
     *
     * @return Request A Request instance
     *
     * @throws \LogicException if the stack is already on the last page
     */
    public function forward()
    {
        if ($this->position > \count($this->stack) - 2) {
            throw new \LogicException('You are already on the last page.');
        }

        return clone $this->stack[++$this->position];
    }

    /**
     * Returns the current element in the history.
     *
     * @return Request A Request instance
     *
     * @throws \LogicException if the stack is empty
     */
    public function current()
    {
        if (-1 == $this->position) {
            throw new \LogicException('The page history is empty.');
        }

        return clone $this->stack[$this->position];
    }
}
