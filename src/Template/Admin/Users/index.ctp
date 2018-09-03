<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h2>
                        Users
                    </h2>
                    <strong>
                        <?= __('Listar User') ?>
                    </strong>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div id="users" class="form card-body">
                    <?= $this->Form->create($users) ?>
                    <div class="col-12 no-padding row">
                                                <div class='col-6'>
                                                        <?=$this->Form->input('name', ['class'=>'form-control']); ?>
                                                    </div>
                                                <div class='col-6'>
                                                        <?=$this->Form->input('user_type_id', ['data'=>'select','controller'=>'userTypes','action'=>'fill','data-value'=>$users->user_type_id, 'class'=>'form-control']); ?>
                                                    </div>
                                                <div class='col-6'>
                            <?php                                                 echo $this->Form->input('birthdate', ['type' => 'text', 'class' => 'datetimepicker form-control','value'=>$this->Time->format($users->birthdate,'dd/MM/Y H:m'), 'append' => [$this->Form->button("<i class='fa fa-calendar no-margin'></i>", ['type'=>'button', 'class'=>'background-append'])]]);
                                                         ?>
                        </div>
                                                <div class='col-6'>
                                                        <?=$this->Form->input('cpf', ['class'=>'form-control']); ?>
                                                    </div>
                                                <div class='col-6'>
                                                        <?=$this->Form->input('rg', ['class'=>'form-control']); ?>
                                                    </div>
                                                <div class='col-6'>
                                                        <?=$this->Form->input('email', ['class'=>'form-control']); ?>
                                                    </div>
                                                <div class='col-6'>
                                                        <?=$this->Form->input('answerable', ['class'=>'form-control']); ?>
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
                                                <div class="col-12 no-padding text-center mt-20">
                            <?= $this->Form->button("<i class='fa fa-search'></i>", ['type'=>'submit', 'class'=>'btn btn-light btn-icons mr-2', 'escape' => false]) ?>
                            <?= $this->Html->link("<i class='fa fa-refresh'></i>", [], ['title'=>'Limpar formulário', 'class'=>'btn btn-light btn-icons', 'escape' => false]) ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div id="users" class="form card-body">
                    <div class="row no-padding">
                            <div class="col-6 no-padding">
                                    <h4 class="card-title">
                                        Users
                                    </h4>
                                </div>
                                <div class="col-6 no-padding text-right">
                                    <p class="no-margin">
                                        <?= $this->Html->link($this->Html->icon('plus').' Cadastrar User', ['action' => 'add'],['title'=>'Cadastrar User','class'=>'btn btn-primary','escape' => false]) ?>
                                    </p>
                                </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                                                        <th>
                                        <?= $this->Paginator->sort('id') ?>
                                    </th>
                                                                        <th>
                                        <?= $this->Paginator->sort('name') ?>
                                    </th>
                                                                        <th>
                                        <?= $this->Paginator->sort('user_type_id') ?>
                                    </th>
                                                                        <th>
                                        <?= $this->Paginator->sort('birthdate') ?>
                                    </th>
                                                                        <th>
                                        <?= $this->Paginator->sort('cpf') ?>
                                    </th>
                                                                        <th>
                                        <?= $this->Paginator->sort('rg') ?>
                                    </th>
                                                                        <th>
                                        <?= $this->Paginator->sort('email') ?>
                                    </th>
                                                                        <th>
                                        <?= $this->Paginator->sort('answerable') ?>
                                    </th>
                                                                        <th>
                                        <?= $this->Paginator->sort('created',['label'=>'Dt. Criação']) ?>
                                    </th>
                                                                        <th>
                                        <?= $this->Paginator->sort('updated') ?>
                                    </th>
                                                                        <th>
                                        <?= $this->Paginator->sort('created_by') ?>
                                    </th>
                                                                        <th>
                                        <?= $this->Paginator->sort('updated_by') ?>
                                    </th>
                                                                        <th>
                                        <?= $this->Paginator->sort('status') ?>
                                    </th>
                                                                        <th class="actions">
                                        <?= __('Ações') ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user): ?>
                                <tr>
                                                                        <td>
                                        <?= $this->Number->format($user->id) ?>
                                    </td>
                                                                        <td>
                                        <?= h($user->name) ?>
                                    </td>
                                                                        <td>
                                        <?= $user->has('user_type') ? $this->Html->link($user->user_type->name, ['controller' => 'UserTypes', 'action' => 'view', $user->user_type->id]) : '' ?>
                                    </td>
                                                                        <td>
                                        <?= h($user->birthdate) ?>
                                    </td>
                                                                        <td>
                                        <?= $this->Number->format($user->cpf) ?>
                                    </td>
                                                                        <td>
                                        <?= $this->Number->format($user->rg) ?>
                                    </td>
                                                                        <td>
                                        <?= h($user->email) ?>
                                    </td>
                                                                        <td>
                                        <?= $this->Number->format($user->answerable) ?>
                                    </td>
                                                                        <td>
                                        <?= h($user->created) ?>
                                    </td>
                                                                        <td>
                                        <?= h($user->updated) ?>
                                    </td>
                                                                        <td>
                                        <?= $this->Number->format($user->created_by) ?>
                                    </td>
                                                                        <td>
                                        <?= $this->Number->format($user->updated_by) ?>
                                    </td>
                                                                        <td>
                                        <?= h($user->status) ?>
                                    </td>
                                                                        <td class="actions">
                                        <?= $this->Html->link($this->Html->icon('list-alt'), ['controller'=>'users','action' => 'view', $user->id],['toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Detalhes','escape' => false,'class'=>'btn btn-xs btn-info']) ?>
                                        <?= $this->Html->link($this->Html->icon('pencil'), ['controller'=>'users','action' => 'edit', $user->id],['toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Editar','escape' => false,'class'=>'btn btn-xs btn-primary']) ?>
                                        <?= $this->Html->link($this->Html->icon('remove'),  ['controller'=>'users','action'=>'delete', $user->id],['onclick'=>'excluir(event, this)','toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Deletar','escape' => false,'class'=>'btn btn-xs btn-danger','listen' => 'f']) ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="text-center">
                            <div class="paginator">
                                <ul class="pagination">
                                    <?= $this->Paginator->prev($this->Html->icon('chevron-left'),['escape' => false]) ?>
                                    <?= $this->Paginator->numbers() ?>
                                    <?= $this->Paginator->next($this->Html->icon('chevron-right'),['escape' => false]) ?>
                                </ul>
                                <p>
                                    <?= $this->Paginator->counter('Página {{page}} de {{pages}}') ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
