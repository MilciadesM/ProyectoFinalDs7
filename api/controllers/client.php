<?php

class ClientControllerAdmin {

    public function __construct(private $clientModel) {}

    public function getAll($dataToken) {
        
        $restQuery = $this->clientModel::getAll();
        
        return $restQuery;
    }
    
    public function getById($dataToken, $cliente_id) {

        $restQuery = $this->clientModel::getById($cliente_id);

        return $restQuery;
    }

}

class ClientControllerClient { }

?>