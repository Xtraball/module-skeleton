<?php

/**
 * Class ModuleSkeleton_Model_Skeleton
 */
class ModuleSkeleton_Model_Skeleton extends Core_Model_Default
{
    /**
     * ModuleSkeleton_Model_Db_Table_Skeleton constructor.
     * @param array $params
     */
    public function __construct($params = [])
    {
        parent::__construct($params);
        $this->_db_table = 'ModuleSkeleton_Model_Db_Table_Skeleton';
        return $this;
    }
}