<?php

namespace Livramatheus\Livramentoback\Controllers;

use Livramatheus\Livramentoback\Controllers\Project;
use Livramatheus\Livramentoback\Controllers\Article;
use Livramatheus\Livramentoback\Models\Response;

class ApiCore {

    /** @var Response */
    private $Response;

    private $page;

    public function __construct() {
        $this->page     = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);
        $this->Response = new Response();
        $this->initApi();
    }

    private function initApi() {
        switch ($this->page) {
            case 'project':
                $project = new Project();
                $this->Response->setData($project->getData());
                break;

            case 'article':
                $article = new Article();
                $this->Response->setData($article->getData());
                break;

            default:
                $this->Response->setData('Not Found');
                $this->Response->setResponseCode(404);
                break;
        }

        $this->send();
    }

    private function send() {
        header('Content-Type: application/json');
        http_response_code($this->Response->getResponseCode());
        echo $this->Response->getDataJson();
    }
}
