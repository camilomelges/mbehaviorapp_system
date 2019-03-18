<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Error');
        $this->loadComponent('PatchTimeStamp');
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();

            if ($user) {
                $this->Auth->setUser($user);
                if(!empty($this->request->getQuery('redirect'))) {
                    return $this->redirect($this->request->getQuery('redirect'));
                }
                return $this->redirect('/');
            }
            $this->Flash->error(__('Usuário ou senha ínvalido, tente novamente'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['UserTypes']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['UserTypes', 'UserApps', 'UserStatistics']
        ]);

        $this->set('user');
        $this->set('_serialize', ['user']);
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {

            $user = $this->PatchTimeStamp->PatchTimeEntity($this->Users, $this->request->data, $user, false);
            
            if ($this->Users->save($user)) {
                $this->Flash->success(__('O user foi salvo com sucesso!'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O user não foi salvo. Por favor, tente novamente.'));
            }
        }

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $user = $this->PatchTimeStamp->PatchTimeEntity($this->Users, $this->request->data, $user, false);
                        
            if ($this->Users->save($user)) {
                $this->Flash->success(__('O user foi salvo com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O user não foi salvo. Por favor, tente novamente.'));
            }
        }

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function delete($id = null)
    {
        $user = $this->Users->get($id);
                
        $user = $this->PatchTimeStamp->PatchTimeEntity($this->Users, $this->request->data, $user, true);

        if ($this->Users->save($user)) {
            $this->Flash->success(__('O user foi deletado com sucesso.'));
        } else {
            $this->Flash->error(__('Desculpe! O user não foi deletado! Tente novamente mais tarde.'));
        }
                
        return $this->redirect(['action' => 'index']);
    }}
