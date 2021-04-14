<!-- edit.blade.php -->



<?php $__env->startSection('content'); ?>
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Editar Produto
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
      <form method="post" action="<?php echo e(route('produto.update', $produto->id)); ?>">
          <?php echo csrf_field(); ?>
          <?php echo method_field('PATCH'); ?>
          <div class="row">
            <div class="form-group col-md-6">
                <label for="descricao">Descrição:</label>
                <input type="text" class="form-control" name="descricao" value="<?php echo e($produto->descricao); ?>"/>
            </div>
            <div class="form-group col-md-6">
                <label for="unidade">Unidade:</label>
                <select class="form-control" name="unidade">
                  <option value="<?php echo e($produto->unidade); ?>"><?php echo e($produto->unidade); ?></option>
                  <option value="UN">UN - Unidade</option>
                  <option value="KG">KG - Quilograma</option>
                  <option value="LT">LT - Litro</option>
                  <option value="PT">PT - Pacote</option>
                  <option value="PÇ">PÇ - Peça</option>
                  <option value="RL">RL - Rolo</option>
                </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-4">
              <label for="vlcusto">Valor Custo:</label>  
              <input type="number" name="vlcusto" id="vlcusto" value="<?php echo e($produto->vlcusto); ?>">
            </div>
            <div class="form-group col-md-4">
            <label for="vlvenda">Valor Venda:</label>  
              <input type="number" name="vlvenda" id="vlvenda" value="<?php echo e($produto->vlvenda); ?>">
            </div>
          </div>
          <a href="<?php echo e(route('produto.index')); ?>" class="btn btn-sm btn-success">Voltar</a>
          <button type="submit" class="btn btn-primary">Atualizar Cadastro</button>
      </form>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Users\TI\Documents\Uniagro\Projetos-Laravel\mecanica\resources\views/produto/edit.blade.php ENDPATH**/ ?>