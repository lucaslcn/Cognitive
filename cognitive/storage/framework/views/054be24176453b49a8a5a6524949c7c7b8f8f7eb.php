<!-- show.blade.php -->



<?php $__env->startSection('content'); ?>
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Visualizar Área
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="area">Área:</label>
            <input type="text" class="form-control" name="area" readonly value="<?php echo e($area->area); ?>"/>
        </div>
        <div class="row">
            <a href="<?php echo e(route('area.index')); ?>" class="btn btn-sm btn-success">Voltar</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Users\Felipe\Desktop\cognitive\resources\views/area/show.blade.php ENDPATH**/ ?>