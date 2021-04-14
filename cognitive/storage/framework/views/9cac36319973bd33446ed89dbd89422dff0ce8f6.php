<!-- show.blade.php -->



<?php $__env->startSection('content'); ?>
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Visualizar Estoque
    </div>
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-1">
                <label for="idproduto">ID Produto:</label>
                <input type="text" class="form-control" name="idproduto" readonly value="<?php echo e($estoque->idproduto); ?>"/>
            </div>
            <div class="form-group col-md-5">
                <label for="descricao">Descrição:</label>
                <input type="text" class="form-control" name="descricao" readonly value="<?php echo e($produto->descricao); ?>"/>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-3">
                <label for="qttotal">Quantidade Total:</label>
                <input type="number" class="form-control" name="qttotal" readonly value="<?php echo e($estoque->qttotal); ?>"/>
            </div>
            <div class="form-group col-md-3">
                <label for="qtbloqueada">Quantidade Bloqueada:</label>
                <input type="number" class="form-control" name="qtbloqueada" readonly value="<?php echo e($estoque->qtbloqueada); ?>"/>
            </div>
            <div class="form-group col-md-2">
                <label for="vlcusto">Valor Custo:</label>
                <input type="number" class="form-control" name="vlcusto" readonly value="<?php echo e($estoque->vlcusto); ?>"/>
            </div>
            <div class="form-group col-md-2">
                <label for="vlvenda">Valor Venda:</label>
                <input type="number" class="form-control" name="vlvenda" readonly value="<?php echo e($estoque->vlvenda); ?>"/>
            </div>
        </div>
        <div class="row">
            <a href="<?php echo e(route('estoque.index')); ?>" class="btn btn-sm btn-success">Voltar</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Users\TI\Documents\Uniagro\Projetos-Laravel\mecanica\resources\views/estoque/show.blade.php ENDPATH**/ ?>