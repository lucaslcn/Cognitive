<!-- show.blade.php -->



<?php $__env->startSection('content'); ?>
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Visualizar Veículo
    </div>
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-1">
                <label for="idpessoa">ID Proprietário:</label>
                <input type="text" class="form-control" name="idpessoa" readonly value="<?php echo e($veiculo->idpessoa); ?>"/>
            </div>
            <div class="form-group col-md-3">
                <label for="pessoa">Proprietário:</label>
                <input type="text" class="form-control" name="pessoa" readonly value="<?php echo e($pessoa->nome); ?>"/>
            </div>
            <div class="form-group col-md-1">
                <label for="idmarca">ID Marca:</label>
                <input type="text" class="form-control" name="idmarca" readonly value="<?php echo e($veiculo->idmarca); ?>"/>
            </div>
            <div class="form-group col-md-2">
                <label for="marca">Marca:</label>
                <input type="text" class="form-control" name="marca" readonly value="<?php echo e($marca->nome); ?>"/>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3">
                <label for="modelo">Modelo:</label>
                <input type="text" class="form-control" name="modelo" readonly value="<?php echo e($veiculo->modelo); ?>"/>
            </div>
            <div class="form-group col-md-1">
                <label for="placa">Placa:</label>
                <input type="text" class="form-control" name="placa" readonly value="<?php echo e($veiculo->placa); ?>"/>
            </div>
            <div class="form-group col-md-1">
                <label for="ano">Ano:</label>
                <input type="text" class="form-control" name="ano" readonly value="<?php echo e($veiculo->ano); ?>"/>
            </div>
        </div>
        <div class="row">
            <a href="<?php echo e(route('veiculo.index')); ?>" class="btn btn-sm btn-success">Voltar</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Users\TI\Documents\Uniagro\Projetos-Laravel\mecanica\resources\views/veiculo/show.blade.php ENDPATH**/ ?>