<?php
// This file is replayed pon every update of the module
// make sure it's safe to run it over and over again ;)

try {
    // Empty query, just to test!
    $this->query("SELECT * FROM module_skeleton");

    // Or do anything Else ...
} catch (\Exception $e) {
    // Silently fails, or not!
}