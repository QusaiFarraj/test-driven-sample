<?php

if (!function_exists('generateEmployeeId')) {
    function generateEmployeeId(): string
    {
        return sprintf("%s-%s",
            Str::upper(substr(str_shuffle(implode(range('a', 'z'))), 0, 2)),
            rand(1, 9000)
        );
    }
}
