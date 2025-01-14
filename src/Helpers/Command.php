<?php

namespace DALTCORE\LaravelDeployHelper\Helpers;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\ProcessBuilder;

class Command
{
    /**
     * Execute command on CLI.
     *
     * @param string $prefix utility to execute
     * @param array  $args   the arguments to give to the prefix
     *
     * @return string
     */
    protected static function command($prefix, $args)
    {
        $arguments = array_merge([$prefix], $args);

        $process = new Process($arguments);
        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        return $process->getOutput();
    }
}
