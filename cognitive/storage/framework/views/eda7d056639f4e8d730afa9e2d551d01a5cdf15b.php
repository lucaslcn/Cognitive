<!-- edit.blade.php -->



<?php $__env->startSection('content'); ?>
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Editar Serviço
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
      <form method="post" action="<?php echo e(route('servico.update', $servico->id)); ?>">
          <?php echo csrf_field(); ?>
          <?php echo method_field('PATCH'); ?>
          <div class="form-group">
              <label for="descricao">Descrição:</label>
              <input type="text" class="form-control" name="descricao" value="<?php echo e($servico->descricao); ?>"/>
          </div>
          <div class="form-group">
              <label for="valorbase">Valor Base:</label>
              <input type="text" class="form-control" name="valorbase" value="<?php echo e($servico->valorbase); ?>"/>
          </div>
          <a href="<?php echo e(route('servico.index')); ?>" class="btn btn-sm btn-success">Voltar</a>
          <button type="submit" class="btn btn-primary">Atualizar Cadastro</button>
      </form>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Users\TI\Documents\Uniagro\Projetos-Laravel\mecanica\resources\views/servico/edit.blade.php ENDPATH**/ ?>