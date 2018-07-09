<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Boards Controller
 *
 * @property \App\Model\Table\BoardsTable $Boards
 *
 * @method \App\Model\Entity\Board[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BoardsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $data = $this->Boards->find('all');

        $this->set('data',$data);

        $this->set('entity',$this->Boards->newEntity());




    }

    public function index2()
    {

        $this->set('entity',$this->Boards->newEntity());
        if ($this->request->is('post')) {
            $data = $this->Boards->find('all',[
                'conditions'=>['id' => $this->request->getData('id')]
            ]);
            //var_dump($data->toArray());
            //exit;
            }else {
            $data = $this->Boards->find('all');
        }

        $this->set('data',$data);

    }


    public function index3()
    {

        $this->set('entity',$this->Boards->newEntity());
        if ($this->request->is('post')) {
            $data = $this->Boards->find('all',[
                'conditions'=>['name like' =>"%{$this->request->getData()['name']}%"]
            ]);
            //var_dump($data->toArray());
            //exit;
        }else {
            $data = $this->Boards->find('all');
        }

        $this->set('data',$data);

    }

    /**
     * View method
     *
     * @param string|null $id Board id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function addRecord()
    {
        if ($this->request->is('post')) {
            $board = $this->Boards->newEntity($this->request->getData());
            $this->Boards->save($board);
        }
        return $this->redirect(['action' => 'index']);
    }
}

