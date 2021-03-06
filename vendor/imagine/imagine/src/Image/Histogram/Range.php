<?php

/*
 *
 * (c) Bulat Shakirzyanov <mallluhuct@gmail.com>
 *
 */

namespace Imagine\Image\Histogram;

use Imagine\Exception\OutOfBoundsException;

/**
 * Range histogram.
 */
final class Range
{
    /**
     * @var int
     */
    private $start;

    /**
     * @var int
     */
    private $end;

    /**
     * @param int $start
     * @param int $end
     *
     * @throws \Imagine\Exception\OutOfBoundsException
     */
    public function __construct($start, $end)
    {
        if ($end <= $start) {
            throw new OutOfBoundsException(sprintf('Range end cannot be bigger than start, %d %d given accordingly', $this->start, $this->end));
        }

        $this->start = $start;
        $this->end = $end;
    }

    /**
     * @param int $value
     *
     * @return bool
     */
    public function contains($value)
    {
        return $value >= $this->start && $value < $this->end;
    }
}
