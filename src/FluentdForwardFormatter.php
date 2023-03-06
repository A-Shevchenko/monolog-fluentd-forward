<?php

namespace Ashevchenko\Monolog\Fluentd\Forward;

use MessagePack\Packer;
use Monolog\Formatter\FluentdFormatter;

class FluentdForwardFormatter extends FluentdFormatter
{
    /**
     * @var PackerInterface
     */
    private $packer;

    public function __construct(?PackerInterface $packer = null, bool $levelTag = false)
    {
        if (is_null($packer)) {
            $packer = new Packer();
        }
        $this->packer = $packer;
        parent::__construct($levelTag);
    }

    public function format(array $record): string
    {
        return $this->packer->pack(json_decode(parent::format($record), true));
    }
}
