<!-- create.blade.php -->



<?php $__env->startSection('content'); ?>
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Adicionar Veículo
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
      <form method="post" action="<?php echo e(route('veiculo.store')); ?>">
          <?php echo csrf_field(); ?>
          <div class="row">
            <div class="form-group col-md-4">
              <label for="idpessoa">Proprietário:</label>
              <select class="form-control" name="idpessoa">
                <option>Selecione o proprietário</option>
                <?php $__currentLoopData = $pessoas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pessoa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($pessoa->id); ?>"><?php echo e($pessoa->nome); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label for="idmarca">Marca:</label>
              <select class="form-control" name="idmarca">
                <option>Selecione uma Marca</option>
                <?php $__currentLoopData = $marcas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $marca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($marca->id); ?>"><?php echo e($marca->nome); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-3">
                <label for="modelo">Modelo:</label>
                <input type="text" class="form-control" name="modelo"/>
            </div>
            <div class="form-group col-md-2">
                <label for="placa">Placa:</label>
                <input type="text" class="form-control" name="placa"/>
            </div>
            <div class="form-group col-md-2">
                <label for="ano">Ano:</label>
                <input type="text" class="form-control" name="ano"/>
            </div>
          </div>
          <a href="<?php echo e(route('veiculo.index')); ?>" class="btn btn-sm btn-success">Voltar</a>
          <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Users\TI\Documents\Uniagro\Projetos-Laravel\mecanica\resources\views/veiculo/create.blade.php ENDPATH**/ ?>