<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
 * Ajax component
 */
class AjaxComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function sendToView($entity)
    {
    	if ($this->request->is('ajax')) {
    	    $this->response->body(json_encode($entity));
    	    $this->response->send();
    	    die;
    	}
    }

    public function sendErrors($entity)
    {
        $this->response->body(json_encode([
            'errors' => $entity->getErrors(),
        ]));
        $this->response->send();
        die;
    }

    public function sendSuccess()
    {
        if ($this->request->is('ajax')) {
            $this->response->body(json_encode([
                'success' => 1,
            ]));
            $this->response->send();
            die;

        } else {
            return $this->redirect(['action' => 'index']);
        }
    }
}
