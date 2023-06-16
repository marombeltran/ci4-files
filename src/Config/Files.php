<?php

namespace Marom\Ci4Files\Config;

use CodeIgniter\Config\BaseConfig;
use Marom\Ci4Files\Exceptions\FilesException;

class Files extends BaseConfig
{
    /**
     * Whether to include routes to the Files Controller.
     */
    public bool $routeFiles = true;

    /**
     * View file aliases
     *
     * @var string[]
     */
    public array $view = [
        'dropzone' => 'Marom\Ci4Files\Views\Dropzone\config',
    ];

    /**
     * Path to the defaul thumbail file
     */
    public string $defaultThumbnail = 'Marom\Ci4Files\Assets\Unavailable.jpg';

    /**
     * Display Preferences 
     */

    /**
     * Display format for listing files.
     * Included options are 'cards', 'list', 'select'
     */
    public string $format = 'cards';

    /**
     * Default sort column.
     * See FileModel::$allowedFields for options.
     */
    public string $sort = 'filename';

    /**
     * Default sort ordering. "asc" or "desc".
     */
    public string $order = 'asc';

    /**
     * Storage Options
     */

    /**
     * Directory to store files (with trailing slash).
     * Usually best to use getPath()
     */
    protected string $path = WRITEPATH . 'files' . DIRECTORY_SEPARATOR;


    /**
     * Normalizes and creates (if necessary) the storage and thumbnail paths,
     * returning the normalized storage path.
     *
     * @throws FilesException
     */
    public function getPaht(): string
    {
        $storage = $this->path;

        if (! is_dir($storage) && ! @mkdir($storage, 0755, true)) {
            throw FilesException::forDirFail($storage);
        }

        $storage = realpath($storage) ?: $storage;
        $this->path = rtrim($storage, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;

        $thumnails = $this->path . 'thumbnails';
        if (! is_dir($thumnails) && ! @mkdir($thumnails, 0755, true)) {
            throw FilesException::forDirFail($thumnails);
        }

        return $this->path;
    }

    public function setPath(string $path): void
    {
        $this->path = $path; 
    }

}

