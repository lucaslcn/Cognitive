<!-- show.blade.php -->



<?php $__env->startSection('content'); ?>
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Visualizar Disciplina
    </div>
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-1">
                <label for="idarea">ID Área:</label>
                <input type="text" class="form-control" name="idarea" readonly value="<?php echo e($disciplina->idarea); ?>"/>
            </div>
            <div class="form-group col-md-3">
                <label for="area">Área:</label>
                <input type="text" class="form-control" name="area" readonly value="<?php echo e($area->area); ?>"/>
            </div>
            <div class="form-group col-md-1">
                <label for="iddisciplina">ID Disciplina:</label>
                <input type="text" class="form-control" name="iddisciplina" readonly value="<?php echo e($disciplina->id); ?>"/>
            </div>
            <div class="form-group col-md-3">
                <label for="disciplina">Disciplina:</label>
                <input type="text" class="form-control" name="disciplina" readonly value="<?php echo e($disciplina->disciplina); ?>"/>
            </div>
        </div>
        <div class="row">
            <a href="<?php echo e(route('disciplina.index')); ?>" class="btn btn-sm btn-success">Voltar</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Users\Felipe\Desktop\cognitive\resources\views/disciplina/show.blade.php ENDPATH**/ ?>