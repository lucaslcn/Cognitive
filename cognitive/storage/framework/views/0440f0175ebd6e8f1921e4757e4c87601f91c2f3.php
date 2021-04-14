<!-- edit.blade.php -->



<?php $__env->startSection('content'); ?>
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Editar estado
  </div>
  <div class="card-body">
    <?php if($errors->any()): ?>
      <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div><br />
    <?php endif; ?>
      <form method="post" action="<?php echo e(route('estado.update', $estado->id)); ?>">
          <?php echo csrf_field(); ?>
          <?php echo method_field('PATCH'); ?>
          <div class="form-group">
              <label for="estado">Estado:</label>
              <input type="text" class="form-control" name="estado" value="<?php echo e($estado->estado); ?>"/>
              <label for="estado">UF:</label>
              <input type="text" class="form-control" name="UF" value="<?php echo e($estado->UF); ?>"/>
          </div>
          <a href="<?php echo e(route('estado.index')); ?>" class="btn btn-sm btn-success">Voltar</a>
          <button type="submit" class="btn btn-primary">Atualizar Cadastro</button>
      </form>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Users\Felipe\Documents\Cognitive\cognitive\resources\views/estado/edit.blade.php ENDPATH**/ ?>