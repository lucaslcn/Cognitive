<!-- show.blade.php -->



<?php $__env->startSection('content'); ?>
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Visualizar Serviço
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input type="text" class="form-control" name="descricao" readonly value="<?php echo e($servico->descricao); ?>"/>
        </div>
        <div class="form-group">
            <label for="valorbase">Valor Base:</label>
            <input type="text" class="form-control" name="valorbase" readonly value="<?php echo e($servico->valorbase); ?>"/>
        </div>
        <div class="row">
            <a href="<?php echo e(route('servico.index')); ?>" class="btn btn-sm btn-success">Voltar</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Users\TI\Documents\Uniagro\Projetos-Laravel\mecanica\resources\views/servico/show.blade.php ENDPATH**/ ?>