<?php

namespace Marom\Ci4Files\Controllers;

use CodeIgniter\Events\Events;
use CodeIgniter\HTTP\Exceptions\HTTPException;
use CodeIgniter\HTTP\{RedirectResponse,ResponseInterface};

use RuntimeException;

class Files extends \CodeIgniter\Controller
{
    protected FilesConfig $config;
}
