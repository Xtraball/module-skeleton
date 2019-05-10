<?php
// This file is replayed pon every update of the module
// this is a table definition, you can have multiple tables, one table per file
// filename must be table name!
// Every time the module updates, the new fields are added, fields are NEVER removed,
// If you want to remove a field, do it in "db/data/xxx.php" via a `$this->query`
// this is to prevent data loss *
//
// It's also important to prefix all tables within a module to prevent duplicates

/**
 *
 * Schema definition for "module_skeleton"
 *
 */
$schemas = (!isset($schemas)) ? [] : $schemas;
$schemas["module_skeleton"] = [
    "skeleton_id" => [
        "type" => "int(11) unsigned",
        "auto_increment" => true,
        "primary" => true,
    ],
    "value_id" => [
        "type" => "int(11) unsigned",
        "index" => [
            "key_name" => "KEY_VALUE_ID",
            "index_type" => "BTREE",
            "is_null" => false,
            "is_unique" => false,
        ],
    ],
    "title" => [
        "type" => "varchar(255)",
        "charset" => "utf8",
        "collation" => "utf8_unicode_ci",
    ],
    "subtitle" => [
        "type" => "varchar(255)",
        "charset" => "utf8",
        "collation" => "utf8_unicode_ci",
    ],
    "created_at" => [
        "type" => "datetime",
    ],
    "updated_at" => [
        "type" => "datetime",
    ],
];
