<?php

namespace queasy\db;

trait TableTrait
{

    private static function table()
    {
        // If TABLE_NAME is not declared, use unqualified class name as a table name
        $name = defined(__CLASS__ . '::TABLE_NAME')
            ? self::TABLE_NAME
            : str_replace(__NAMESPACE__ . "\\", '', __CLASS__);

        return Db::getInstance()->$name;
    }

}

