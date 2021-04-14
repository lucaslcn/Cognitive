<!-- show.blade.php -->



<?php $__env->startSection('content'); ?>
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Visualizar Produto
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input type="text" class="form-control" name="descricao" readonly value="<?php echo e($produto->descricao); ?>"/>
        </div>
        <div class="form-group">
            <label for="unidade">Unidade:</label>
            <input type="text" class="form-control" name="unidade" readonly value="<?php echo e($produto->unidade); ?>"/>
        </div>
        <div class="form-group">
            <label for="vlcusto">Valor Custo:</label>  
            <input type="number" class="form-control" name="vlcusto" id="vlcusto" readonly value="<?php echo e($produto->vlcusto); ?>">
        </div>
        <div class="form-group ">
            <label for="vlvenda">Valor Venda:</label>  
            <input type="number" class="form-control" name="vlvenda" id="vlvenda" readonly value="<?php echo e($produto->vlvenda); ?>">
        </div>
        <div class="row">
            <a href="<?php echo e(route('produto.index')); ?>" class="btn btn-sm btn-success">Voltar</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Users\TI\Documents\Uniagro\Projetos-Laravel\mecanica\resources\views/produto/show.blade.php ENDPATH**/ ?>