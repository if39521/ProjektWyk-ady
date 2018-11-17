<?php

    interface DatabaseAdapterInterface {

        public function query($query);

        public function bind($param, $value, $type);

        public function execute();

        public function resultSet();

        public function single();

        public function rowCount();

        public function lastInsertId();

        public function beginTransaction();

        public function endTransaction();
    }
?>