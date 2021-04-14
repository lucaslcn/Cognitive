<!-- show.blade.php -->



<?php $__env->startSection('content'); ?>
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Visualizar Estado
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="estado">Estado:</label>
            <input type="text" class="form-control" name="estado" readonly value="<?php echo e($estado->estado); ?>"/>
            <label for="uf">UF:</label>
            <input type="text" class="form-control" name="uf" readonly value="<?php echo e($estado->UF); ?>"/>
        </div>
        <div class="row">
            <a href="<?php echo e(route('estado.index')); ?>" class="btn btn-sm btn-success">Voltar</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Users\Felipe\Documents\Cognitive\cognitive\resources\views/estado/show.blade.php ENDPATH**/ ?>