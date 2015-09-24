<?php

namespace Models;

class Master_Model
{
    protected $table;
    protected $where;
    protected $columns;
    protected $limit;
    protected $dbconn;

    public function __construct($args = array())
    {
        $args = array_merge(array(
            'where' => '',
            'columns' => '*',
            'limit' => 0
        ), $args);

        if (!isset($args['table'])) {
            die('Table not defined. Please define a model table.');
        }

        extract($args);

        $this->table = $table;
        $this->where = $where;
        $this->columns = $columns;
        $this->limit = $limit;

        $db_object = \Lib\Database::get_instance();
        $this->dbconn = $db_object::get_db();
    }
}