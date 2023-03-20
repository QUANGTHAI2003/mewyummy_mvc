<?php

namespace App\Core;

use PDO;

class Query extends Database {

    public string $tableName = '';
    public string $where = '';
    public string $operator = '';
    public string $selectField = '*';
    public string $limit = '';
    public string $orderBy = '';
    public string $innerJoin = '';

    /**
     * Select table => table('users')
     *
     * @param string $table
     */
    public static function table(string $table)
    : Query {
        $instance            = new self();
        $instance->tableName = $table;

        return $instance;
    }

    /**
     * Select * => select()
     * Select field => select('id', 'name')
     */
    public function select(string $field = '*')
    : static {
        if(!empty($field)) {
            $this->selectField = $field;
        }

        return $this;
    }

    /**
     * Limit => limit(3 , 0)
     *
     * @param integer $number => page
     * @param integer $offset => number of pages
     */
    public function limit(int $number, int $offset = 0) {
        $this->limit = " LIMIT $offset, $number";

        return $this;
    }

    /**
     * Order by 1 field => orderBy('id', 'DESC')
     * Order by multi field => orderBy('name DESC, price ASC')
     *
     * @param [type] $field
     * @param string $type
     */
    public function orderBy(string $field = '', string $type = 'ASC') {
        // $fieldArr = array_filter(explode(',', $field));
        // if (!empty($fieldArr) && count($fieldArr) >= 2) {
        //     //SQL order by multi
        //     $this->orderBy = "ORDER BY " . implode(', ', $fieldArr);
        // } else {
        //     $this->orderBy = "ORDER BY " . $field . " " . $type;
        // }
        // multiple orderBy
        if(empty($field)) {
            return $this;
        }

        if(empty($this->orderBy)) {
            $this->orderBy = "ORDER BY " . $field . " " . $type;
        } else {
            $this->orderBy .= ", " . $field . " " . $type;
        }

        return $this;
    }

    /**
     * Where => where('id', '=', 1)
     * Where like => where('name', 'LIKE', '%name%')
     * Where multi => where('id', '=', 1)->where('name', 'LIKE', '%name%')
     *
     * @param string $field
     * @param string $compare
     * @param integer|string $value
     */
    public function where(string $field, string $compare, int|string $value) {
        if(empty($value)) {
            return $this;
        }

        if(empty($this->where)) {
            $this->operator = ' WHERE';
        } else {
            $this->operator = ' AND';
        }

        $this->where .= "$this->operator $field $compare $value";

        return $this;
    }

    public function orWhere(string $field, string $compare, int|string $value) {
        if(empty($value)) {
            return $this;
        }

        if(empty($this->where)) {
            $this->operator = ' WHERE';
        } else {
            $this->operator = ' OR';
        }

        $this->where .= "$this->operator $field $compare $value";

        return $this;
    }

    public function likeWhere(string $field, int|string $value) {
        if(empty($value)) {
            $this->where = '';

            return $this;
        } else {
            $operator    = empty($this->where) ? ' WHERE' : ' AND';
            $this->where .= "$operator $field LIKE '%$value%'";

            return $this;
        }
    }

    /**
     * Join => join('users', 'users.id = posts.user_id')
     *
     * @param string $tableName
     * @param string $relationship
     */
    public function join(string $tableName, string $relationship) {
        $this->innerJoin .= " INNER JOIN $tableName ON $relationship";

        return $this;
    }

    /**
     * Get last id
     */
    public function lastId()
    : bool|string {
        return $this->lastInsertId();
    }

    /**
     * Insert data => insert(['name' => 'name', 'email' => 'email'])
     *
     * @param string|array $data
     */
    public function insert(string|array $data)
    : bool|string {
        $tableName    = $this->tableName;
        $insertStatus = $this->insertData($tableName, $data);
        $this->resetFields();
        if($insertStatus) {
            return $this->lastInsertId();
        } else {
            return false;
        }
    }

    private function resetFields() {
        $this->tableName   = '';
        $this->where       = '';
        $this->operator    = '';
        $this->selectField = '*';
        $this->limit       = '';
        $this->orderBy     = '';
        $this->innerJoin   = '';
    }

    /**
     * Update data => update(['name' => 'name', 'email' => 'email'])
     *
     * @param string|array $data
     */
    public function update(string|array $data)
    : bool {
        $whereUpdate  = str_replace('WHERE', '', $this->where);
        $whereUpdate  = trim($whereUpdate);
        $tableName    = $this->tableName;
        $updateStatus = $this->updateData($tableName, $data, $whereUpdate);
        $this->resetFields();

        return $updateStatus;
    }

    /**
     * Delete data => delete()
     */
    public function delete()
    : bool {
        $whereDelete  = str_replace('WHERE', '', $this->where);
        $whereDelete  = trim($whereDelete);
        $tableName    = $this->tableName;
        $deleteStatus = $this->deleteData($tableName, $whereDelete);
        $this->resetFields();

        return $deleteStatus;
    }

    /**
     * Count data => count()
     */
    public function count() {
        $sqlQuery = "SELECT COUNT(*) FROM $this->tableName $this->where";
        $query    = $this->query($sqlQuery);
        $this->resetFields();

        return $query ? $query->fetchColumn() : false;
    }

    /**
     * Get data => get()
     */
    public function get()
    : bool|array {
        $sqlQuery = "SELECT $this->selectField FROM $this->tableName $this->innerJoin $this->where $this->orderBy $this->limit";
        $query    = $this->query($sqlQuery);
        $this->resetFields();

        return $query ? $query->fetchAll(PDO::FETCH_ASSOC) : false;
    }

    /**
     * Get one data => getOne()
     */
    public function getOne() {
        $sqlQuery = "SELECT $this->selectField FROM $this->tableName $this->where";
        $query    = $this->query($sqlQuery);

        $this->resetFields();

        return $query ? $query->fetch(PDO::FETCH_ASSOC) : false;
    }
}