<?php
namespace App\Controller\Config;

use App\Controller\AppController;

/**
 * DataManagement Controller
 *
 *
 * @method \App\Model\Entity\DataManagement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DataManagementController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
    }

    public function typesCategories()
    {
        $this->UserAction->logAction(__FILE__);
    }

}
