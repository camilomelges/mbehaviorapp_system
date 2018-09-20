<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * BlockInvoices Controller
 *
 * @property \App\Model\Table\BlockInvoicesTable $BlockInvoices
 */
class BlockInvoicesController extends AppController
{
    
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Time');
        $this->loadComponent('Error');
        $this->loadComponent('PatchTimeStamp');
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Blocks', 'InvoicePlans']
        ];
        $blockInvoices = $this->paginate($this->BlockInvoices);

        $this->set(compact('blockInvoices'));
        $this->set('_serialize', ['blockInvoices']);
    }

    public function view($id = null)
    {
        $blockInvoice = $this->BlockInvoices->get($id, [
            'contain' => ['Blocks', 'InvoicePlans']
        ]);

        $this->set(compact('blockInvoice'));
        $this->set('_serialize', ['blockInvoice']);
    }

    public function add()
    {
        $blockInvoice = $this->BlockInvoices->newEntity();
        if ($this->request->is('post')) {
            $this->request->data = $this->datesForBlockInvoices($this->request->data);

            $blockInvoice = $this->PatchTimeStamp->PatchTimeEntity($this->BlockInvoices, $this->request->data, $blockInvoice, false);
            
            if ($this->BlockInvoices->save($blockInvoice)) {
                $this->Flash->success(__('O block invoice foi salvo com sucesso!'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O block invoice não foi salvo. Por favor, tente novamente.'));
            }
        }

        $blocks = $this->BlockInvoices->Blocks->find('list');
        $invoicePlans = $this->BlockInvoices->InvoicePlans->find('list');

        $this->set(compact('blockInvoice', 'blocks', 'invoicePlans'));
        $this->set('_serialize', ['blockInvoice', 'blocks', 'invoicePlans']);
    }

    public function edit($id = null)
    {
        $blockInvoice = $this->BlockInvoices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $blockInvoice = $this->PatchTimeStamp->PatchTimeEntity($this->BlockInvoices, $this->request->data, $blockInvoice, false);
                        
            if ($this->BlockInvoices->save($blockInvoice)) {
                $this->Flash->success(__('O block invoice foi salvo com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O block invoice não foi salvo. Por favor, tente novamente.'));
            }
        }

        $blocks = $this->BlockInvoices->Blocks->find('list');
        $invoicePlans = $this->BlockInvoices->InvoicePlans->find('list');

        $this->set(compact('blockInvoice', 'blocks', 'invoicePlans'));
        $this->set('_serialize', ['blockInvoice', 'blocks', 'invoicePlans']);
    }

    public function delete($id = null)
    {
        $blockInvoice = $this->BlockInvoices->get($id);
                
        $blockInvoice = $this->PatchTimeStamp->PatchTimeEntity($this->BlockInvoices, $this->request->data, $blockInvoice, true);

        if ($this->BlockInvoices->save($blockInvoice)) {
            $this->Flash->success(__('O block invoice foi deletado com sucesso.'));
        } else {
            $this->Flash->error(__('Desculpe! O block invoice não foi deletado! Tente novamente mais tarde.'));
        }
                
        return $this->redirect(['action' => 'index']);
    }

    private function datesForBlockInvoices($data)
    {
        $data['issue_date'] = $this->Time->now()->createFromFormat('d/m/Y', $data['issue_date']);
        $data['expiration_date'] = $this->Time->now()->createFromFormat('d/m/Y', $data['expiration_date']);
        $data['reference_date'] = $this->Time->now()->createFromFormat('d/m/Y', $data['reference_date']);
    
        return $data;
    }
}