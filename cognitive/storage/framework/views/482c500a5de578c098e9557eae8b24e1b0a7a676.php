<!-- show.blade.php -->



<?php $__env->startSection('content'); ?>
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Visualizar Venda
    </div>
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-4">
                <label for="idpessoa">Proprietário:</label>
                <input type="text" class="form-control" name="idpessoa" id="idpessoa" readonly value="<?php echo e($pessoa->nome); ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="idveiculo">Veículo:</label>
                <input class="form-control" name="idveiculo" id="idveiculo" readonly value="<?php echo e($veiculo->modelo); ?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="idservico">Serviço:</label>
                <input class="form-control" name="idservico" id="idservico"  readonly value="<?php echo e($servico->descricao); ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="vlservico">Valor Serviço:</label>
                <input type="number" class="form-control" name="vlservico" id="vlservico" readonly value="<?php echo e($venda->vlservico); ?>"/>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label for="idproduto">Produto:</label>
                <input class="form-control" name="idproduto" id="idproduto" readonly value="<?php echo e($produto->descricao); ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="vlproduto">Valor Produto:</label>
                <input type="number" class="form-control" name="vlproduto" id="vlproduto" readonly value="<?php echo e($venda->vlproduto); ?>"/>
            </div>

            <div class="form-group col-md-3">
                <label for="qtdeproduto">Quantidade Produto:</label>
                <input type="number" class="form-control" name="qtdeproduto" id="qtdeproduto" readonly value="<?php echo e($venda->qtdeproduto); ?>"/>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-3">
            <label for="vltotal">Valor Total:</label>
            <input type="number" class="form-control" name="vltotal" id="vltotal" readonly value="<?php echo e($venda->vltotal); ?>"/>
            </div>
            <div class="form-group col-md-3">
            <label for="vlpago">Valor Pago:</label>
            <input type="number" class="form-control" name="vlpago" id="vlpago"  readonly value="<?php echo e($venda->vlpago); ?>"/>
            </div>
            <div class="form-group col-md-2">
            <label for="situacao">Situação:</label>
            <input type="text" class="form-control" name="situacao" id="situacao" readonly value="<?php echo e($venda->situacao); ?>"/>
            </div>
        </div>
        <div class="row">
            <a href="<?php echo e(route('veiculo.index')); ?>" class="btn btn-sm btn-success">Voltar</a>
        </div>
    </div>
    
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Users\TI\Documents\Uniagro\Projetos-Laravel\mecanica\resources\views/venda/show.blade.php ENDPATH**/ ?>