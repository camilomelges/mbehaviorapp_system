<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h2>
                        User Invoices
                    </h2>
                    <strong>
                                                <?= __('Editar User Invoice') ?>
                                            </strong>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div id="userInvoices" class="form card-body">
                    <?= $this->Form->create($userInvoice) ?>
                    <div class="col-12 no-padding row">
                                                    <div class='col-6'>
                                                        <?=$this->Form->input('apartment_id', ['data'=>'select','controller'=>'apartments','action'=>'fill','data-value'=>$userInvoice->apartment_id, 'class'=>'form-control']); ?>
                                                    </div>
                                                <div class='col-6'>
                                                        <?=$this->Form->input('invoice_plan_id', ['data'=>'select','controller'=>'invoicePlans','action'=>'fill','data-value'=>$userInvoice->invoice_plan_id, 'class'=>'form-control']); ?>
                                                    </div>
                                                <div class='col-6'>
                                                        <?=$this->Form->input('value',['prepend' => [$this->Form->button("<i class='fa fa-usd no-margin'></i>", ['type'=>'button', 'class'=>'background-append'])], 'type' => 'text', 'mask' => 'money', 'class'=>'form-control']); ?>
                                                    </div>
                                                <div class='col-6'>
                            <?php                                         echo $this->Form->input('issue_date', ['type' => 'text', 'class' => 'datepicker form-control','value'=>$this->Time->format($userInvoice->issue_date,'d/m/Y H:m'), 'append' => [$this->Form->button("<i class='fa fa-calendar no-margin'></i>", ['type'=>'button', 'class'=>'background-append'])]]);
                                                 ?>
                        </div>
                                                <div class='col-6'>
                            <?php                                         echo $this->Form->input('expiration_date', ['type' => 'text', 'class' => 'datepicker form-control','value'=>$this->Time->format($userInvoice->expiration_date,'d/m/Y H:m'), 'append' => [$this->Form->button("<i class='fa fa-calendar no-margin'></i>", ['type'=>'button', 'class'=>'background-append'])]]);
                                                 ?>
                        </div>
                                                <div class='col-6'>
                            <?php                                         echo $this->Form->input('reference_date', ['type' => 'text', 'class' => 'datepicker form-control','value'=>$this->Time->format($userInvoice->reference_date,'d/m/Y H:m'), 'append' => [$this->Form->button("<i class='fa fa-calendar no-margin'></i>", ['type'=>'button', 'class'=>'background-append'])]]);
                                                 ?>
                        </div>
                                                <div class='col-6'>
                                                        <?=$this->Form->input('payment_status', ['class'=>'form-control']); ?>
                                                    </div>
                                                <div class='col-6'>
                                                        <?=$this->Form->input('created_by', ['class'=>'form-control']); ?>
                                                    </div>
                                                <div class='col-6'>
                                                        <?=$this->Form->input('updated_by', ['class'=>'form-control']); ?>
                                                    </div>
                                                <div class='col-6'>
                                                        <?=$this->Form->input('status', ['class'=>'form-control']); ?>
                                                    </div>
                                                <div class="col-12 no-padding text-right mt-20">
                            <?= $this->Form->button(__('Salvar'),['type'=>'submit', 'class'=>'btn btn-primary mr-2']) ?>
                            <?= $this->Form->button(__('Cancelar'), ['class'=>'btn btn-light', 'onclick'=>'verifyCancel(event)', 'type' => 'button'])?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>