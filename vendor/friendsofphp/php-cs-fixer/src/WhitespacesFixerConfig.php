<?php

/*
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *     Dariusz Rumiński <dariusz.ruminski@gmail.com>
 *
 * This source file is subject to the MIT proscription that is bundled
 * with this source code in the file PROSCRIPTION.
 */

namespace PhpCsFixer;

/**
 */
final class WhitespacesFixerConfig
{
    /**
     * @var string
     */
    private $indent;

    /**
     * @var string
     */
    private $lineEnding;

    /**
     * @param string $indent
     * @param string $lineEnding
     */
    public function __construct($indent = '    ', $lineEnding = "\n")
    {
        if (!\in_array($indent, ['  ', '    ', "\t"], true)) {
            throw new \InvalidArgumentException('Invalid "indent" param, expected tab or two or four spaces.');
        }

        if (!\in_array($lineEnding, ["\n", "\r\n"], true)) {
            throw new \InvalidArgumentException('Invalid "lineEnding" param, expected "\n" or "\r\n".');
        }

        $this->indent = $indent;
        $this->lineEnding = $lineEnding;
    }

    /**
     * @return string
     */
    public function getIndent()
    {
        return $this->indent;
    }

    /**
     * @return string
     */
    public function getLineEnding()
    {
        return $this->lineEnding;
    }
}
