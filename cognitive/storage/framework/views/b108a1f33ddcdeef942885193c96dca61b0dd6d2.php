<!-- create.blade.php -->



<?php $__env->startSection('content'); ?>
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Adicionar Estoque
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
      <form method="post" action="<?php echo e(route('estoque.store')); ?>">
          <?php echo csrf_field(); ?>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="idproduto">Produto:</label>
              <select class="form-control" name="idproduto">
                <option>Selecione o produto</option>
                <?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($produto->id); ?>"><?php echo e($produto->descricao); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-3">
                <label for="qttotal">Quantidade Total:</label>
                <input type="number" class="form-control" name="qttotal"/>
            </div>
            <div class="form-group col-md-3">
                <label for="qtbloqueada">Quantidade Bloqueada:</label>
                <input type="number" class="form-control" name="qtbloqueada"/>
            </div>
            <div class="form-group col-md-2">
                <label for="vlcusto">Valor Custo:</label>
                <input type="number" class="form-control" name="vlcusto"/>
            </div>
            <div class="form-group col-md-2">
                <label for="vlvenda">Valor Venda:</label>
                <input type="number" class="form-control" name="vlvenda"/>
            </div>
          </div>
          <a href="<?php echo e(route('estoque.index')); ?>" class="btn btn-sm btn-success">Voltar</a>
          <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Users\TI\Documents\Uniagro\Projetos-Laravel\mecanica\resources\views/estoque/create.blade.php ENDPATH**/ ?>