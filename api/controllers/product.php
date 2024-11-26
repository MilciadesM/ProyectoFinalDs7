<?php

class ProductControllerAdmin {

    public function __construct(private $productoModel) {}

    public function getAll($dataToken) {
        $restQuery = $this->productoModel::getAll();
        return $restQuery;
    }

    public function getById($id) {
        $restQuery = $this->productoModel::getAll();
        return $restQuery;
    }

    public function create($dataToken) {
        $restQuery = $this->productoModel::getAll();
        return $restQuery;
    }

    public function update($id) {
        $restQuery = $this->productoModel::getAll();
        return $restQuery;
    }

    public function delete($dataToken) {
        $restQuery = $this->productoModel::getAll();
        return $restQuery;
    }

}

class ProductControllerClient {

    public function __construct(private $productoModel) {}

    public function getAll($dataToken) {
        $restQuery = $this->productoModel::getAll();
        return $restQuery;
    }

    public function getById($id) {
        $restQuery = $this->productoModel::getAll();
        return $restQuery;
    }

    
}


?>