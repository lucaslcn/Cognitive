<!-- create.blade.php -->



<?php $__env->startSection('content'); ?>
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Adicionar Cidade
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
      <form method="post" action="<?php echo e(route('cidade.store')); ?>">
          <?php echo csrf_field(); ?>
          <div class="row">
            <div class="form-group col-md-4">
              <label for="idestado">Estado:</label>
              <select class="form-control" name="idestado">
                <option>Selecione o estado</option>
                <?php $__currentLoopData = $estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($estado->id); ?>"><?php echo e($estado->estado); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-3">
                <label for="cidade">Cidade:</label>
                <input type="text" class="form-control" name="cidade"/>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-3">
                <label for="cidade">CEP</label>
                <input type="text" class="form-control" name="cep"/>
            </div>
          </div>
          <a href="<?php echo e(route('cidade.index')); ?>" class="btn btn-sm btn-success">Voltar</a>
          <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Users\Felipe\Documents\Cognitive\cognitive\resources\views/cidade/create.blade.php ENDPATH**/ ?>