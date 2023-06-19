<?php

namespace Marom\Ci4Files\Bundles;

class DropzoneBundle extends \Tatter\Frontend\FrontendBundle
{
    /**
     * Applies any inicial inputs after the constructor.
     */
    protected function define(): void
    {
        $this->addPath('dropzone/dropzone.css')
             ->addPath('dropzone/dropzone-min.js');
    }
}
