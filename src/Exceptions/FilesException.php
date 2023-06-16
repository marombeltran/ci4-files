<?php

namespace Marom\Ci4Files\Exceptions;

use Marom\Ci4Files\Exceptions\FilesException;

class FilesException extends \RuntimeException implements \CodeIgniter\Exceptions\ExceptionInterface
{
    public function forDirFail(string $dir): FilesException
    {
        return new static (lang('Files.dirFail', [$dir]));
    }

    public function forChunkDirFail(string $dir): FilesException
    {
        return new static (lang('Files.chunkDirFail'));
    }

    public function forNoChunks(string $dir): FilesException
    {
        return new static (lang('Files.noChunks'));
    }

    public function forNewFileFail(string $file): FilesException
    {
        return new static (lang('Files.newFailFail', [$file]));
    }

    public function forWriteFileFail(string $file): FilesException
    {
        return new static (lang('Files.writeFileFail', [$file])); 
    }

}

