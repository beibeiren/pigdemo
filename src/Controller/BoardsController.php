<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

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
                'conditions'=>['name like' =>"%{$this->request->getData('name')}%"]
            ]);
            //var_dump($data->toArray());
            //exit;
        }else {
            $data = $this->Boards->find('all');
        }

        $this->set('data',$data);

    }

    public function index4()
    {

        $this->set('entity',$this->Boards->newEntity());
        if ($this->request->is('post')) {
            $data = $this->Boards->find('all',[
                'conditions'=>['name like' =>"%{$this->request->getData('name')}%"]
            ]);
            //var_dump($data->toArray());
            //exit;
        }else {
            $data = $this->Boards->find('all');
        }

        $this->set('data',$data->toArray());
        $this->set('count',$data->count());
        $this->set('min',$data->min('id'));
        $this->set('max',$data->max('id'));
        $this->set('first',$data->first()->toArray());
    }

    public function index5()
{

    $this->set('entity',$this->Boards->newEntity());
    if ($this->request->is('post')) {
        $data = $this->Boards->find('all',[
            'conditions'=>['name like' =>"%{$this->request->getData('name')}%"]
        ]);
        //var_dump($data->toArray());
        //exit;
    }else {
        $data = $this->Boards->find('all');
    }
    $data->order(['name'=>'ASC','id'=>'DESC']);
    $this->set('data',$data->toArray());
    $this->set('count',$data->count());

}

    public function index6()
    {

        $this->set('entity',$this->Boards->newEntity());
        if ($this->request->is('post')) {
            $data = $this->Boards->findById($this->request->getData('id'));

            //var_dump($data->toArray());
            //exit;
        }else {
            $data = $this->Boards->find('all');
        }

        $this->set('data',$data->toArray());
        $this->set('count',$data->count());

    }
    public function index7()
    {

        $this->set('entity',$this->Boards->newEntity());
        if ($this->request->is('post')) {
            $id = $this->request->getData('id');
            $data = $this->Boards->findByIdOrName($id,$id);

            //var_dump($data->toArray());
            //exit;
        }else {
            $data = $this->Boards->find('all');
        }

        $this->set('data',$data->toArray());
        $this->set('count',$data->count());

    }

    public function index8()
    {
        $this->set('entity',$this->Boards->newEntity());
    }

    public function index9($id = null)
    {

        $this->set('entity',$this->Boards->newEntity());
        if ($id != null) {
            try {
                $entity = $this->Boards->get($id);
                $this->set('entity', $entity);
            } catch (Exception $e) {
                Logg:
                write('debug', $e->getMessage());
            }
        }



            //var_dump($data->toArray());
            //exit;
        $data = $this->Boards->find('all')->order(['id'=>'DESC']);
        $this->set('data',$data->toArray());
        $this->set('count',$data->count());

    }

    public function index10($id = null)
    {
        $data = null;
        if($this->request->is('post')){
            $name = $this->request->getData('name');
            $data = $this->Boards->get($name);
        }
        $this->set('data',$data);
    }

    public function index11($id = null)
    {
        $data = $this->Boards->find('list');
        // var_dump($data);
        // exit;
        $this->set('data',$data->toArray());
    }

    public function index12($id = null){
        $data = $this->Boards->find('all');
        $this->set('data',$data);
    }

    public function index13($id = null)
    {
        $data = $this->Boards->find();
        if($this->request->is('post')){
            $input = $this->request->getData('input');
            $data = $this->Boards
                ->find()
                ->where(['id <='=>$input])
                ->select(['name','title'])
                ->order(['id'=>'DESC']);
        }
        // var_dump($data);
        // exit;
        $this->set('data',$data);
        $this->set('entity',$this->Boards->newEntity());
    }

    public function index14($id = null){
        if (!$this->request->is('post')) {
            $connection = ConnectionManager::get('default');
            $data = $connection
                ->execute('SELECT * FROM boards' )
                ->fetchAll('assoc');
        }else {
            $input = $this->request->getData('input');
            $connection = ConnectionManager::get('default');
            $data = $connection
                ->execute('SELECT * FROM boards where id = :id',
                    ['id'=>$input])
                ->fetchAll('assoc');
        }
        $this->set('data',$data);
        $this->set('entity',$this->Boards->newEntity());
    }

    public function editRecord()
    {
       if ($this->request->is('put')){
           try {
               $entity = $this->Boards->get($this->request->getData('id'));
               $this->Boards->patchEntity($entity,$this->request->getData());
               $this->Boards->save($entity);
           }catch(Exception $e){
               Logg:write('debug',$e->getMessage());
           }
       }
       return $this->redirect(['action' => 'index']);
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
            if($this->Boards->save($board)){
                $this->redirect(['action' => 'index']);
            }
            $this->set('entity',$board);
        }

    }

    public function delRecord(){
        if ($this->request->is('post')){
            try{
                $entity = $this->Boards->get($this->request->getData('id'));
                $this->Boards->delete($entity);

            }catch(Exception $e){
                Log::write('debug', $e->getMessage());
            }
        }
        $this->redirect(['action' => 'index']);
    }

}



