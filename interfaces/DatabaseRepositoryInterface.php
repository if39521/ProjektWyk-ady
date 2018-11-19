<?php
    interface DatabaseRepositoryInterface {

        public function addNewRecord($table, $columns, $values, $column_names);

        public function findRecordByValue($table, $where); 

        public function getAllRecords($table);

        public function updateRecord($table, $columns, $values, $where);

        public function deteleRecordByValue($table, $where);
    }
?>