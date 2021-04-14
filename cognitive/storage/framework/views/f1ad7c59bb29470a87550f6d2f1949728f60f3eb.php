<!-- create.blade.php -->



<?php $__env->startSection('content'); ?>
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Adicionar Pessoa
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
      <form method="post" action="<?php echo e(route('pessoa.store')); ?>">
          <?php echo csrf_field(); ?>
          <div class="form-group">
              <label for="nome">Nome:</label>
              <input type="text" class="form-control" name="nome"/>
          </div>
          <div class="form-group">
              <label for="email">E-mail:</label>
              <input type="text" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="endereco">Endereço:</label>
              <input type="text" class="form-control" name="endereco"/>
          </div>
          <div class="form-group">
              <label for="telefone">Telefone:</label>
              <input type="text" class="form-control" name="telefone" id="telefone"/>
          </div>
          <div class="form-group">
              <label for="cpfcnpj">CPF/CNPJ:</label>
              <input type="text" class="form-control" name="cpfcnpj" id="cpfcnpj"/>
          </div>
          <a href="<?php echo e(route('pessoa.index')); ?>" class="btn btn-sm btn-success">Voltar</a>
          <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
  </div>
</div>
<script type="text/javascript">



$(document).ready(function ($){
  $("#telefone").mask("(00) 00000-0000");    

  var options = {
    onKeyPress: function (cpf, ev, el, op) {
        var masks = ['000.000.000-000', '00.000.000/0000-00'];
        $('#cpfcnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
    }
}

$('#cpfcnpj').length > 11 ? $('#cpfcnpj').mask('00.000.000/0000-00', options) : $('#cpfcnpj').mask('000.000.000-00#', options);
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Users\TI\Documents\Uniagro\Projetos-Laravel\mecanica\resources\views/pessoa/create.blade.php ENDPATH**/ ?>