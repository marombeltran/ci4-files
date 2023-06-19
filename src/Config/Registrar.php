<?php

namespace Marom\Ci4Files\Config;

class Registrar
{
    /**
     * Adds the Files option to available Pager templates.
     *
     * @return array<string, mixed>
     */
    public static function Pager(): array
    {
        return [
            'templates' => [
                'files_bootstrap' => 'Marom\Ci4Files\Views\pager',
            ]
        ];
    }

     /**
     * Adds necessary configuration values for Permits
     * to identify the owner(s) of files.
     *
     * @return array<string,mixed>
     */
    public static function Permits(): array
    {
        return [
            'files' => [
                'userKey'    => 'user_id',
                'pivotKey'   => 'file_id',
                'pivotTable' => 'files_users',
            ],
        ];
    }
}

