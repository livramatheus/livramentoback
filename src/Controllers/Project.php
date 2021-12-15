<?php

namespace Livramatheus\Livramentoback\Controllers;

use Exception;
use Livramatheus\Livramentoback\Controllers\ActionManager;

class Project implements ActionManager {

    private $data;

    public function getData() {
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

        try {
            switch ($action) {
                case 'get':
                    return $this->get();
                    
                default:
                    return $this->getAll();
            }   
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Return basic data from all projects
     */
    private function getAll() {
        return [1, 2, 3, 4, 5];
    }

    /**
     * Returns a specific project
     */
    private function get() {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

        if (empty($id)) {
            throw new Exception('Invalid key parameter.');
        }

        return 'This is project data from id ' . $id;
    }

}