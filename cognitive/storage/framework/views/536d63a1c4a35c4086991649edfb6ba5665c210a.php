<!-- edit.blade.php -->



<?php $__env->startSection('content'); ?>
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Atualizar Venda
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
      <form method="post" action="<?php echo e(route('venda.update', $venda->id)); ?>">
          <?php echo csrf_field(); ?>
          <?php echo method_field('PATCH'); ?>
          <div class="row">
            <div class="form-group col-md-4">
                <label for="idpessoa">Proprietário:</label>
                <input type="hidden" class="form-control" name="idpessoa" id="idpessoa" readonly value="<?php echo e($venda->idpessoa); ?>">
                <input type="text" class="form-control" name="pessoa" id="pessoa" readonly value="<?php echo e($pessoa->nome); ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="idveiculo">Veículo:</label>
                <input type="hidden" class="form-control" name="idveiculo" id="idveiculo" readonly value="<?php echo e($venda->idveiculo); ?>">
                <input type="text" class="form-control" name="veiculo" id="veiculo" readonly value="<?php echo e($veiculo->modelo); ?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="idservico">Serviço:</label>
                <input type="hidden" class="form-control" name="idservico" id="idservico"  readonly value="<?php echo e($venda->idservico); ?>">
                <input type="text" class="form-control" name="servico" id="servico"  readonly value="<?php echo e($servico->descricao); ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="vlservico">Valor Serviço:</label>
                <input type="number" class="form-control" name="vlservico" id="vlservico" value="<?php echo e($venda->vlservico); ?>"/>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="idproduto">Produto:</label>
                <input type="hidden" class="form-control" name="idproduto" id="idproduto" readonly value="<?php echo e($venda->idproduto); ?>">
                <input type="text" class="form-control" name="produto" id="produto" readonly value="<?php echo e($produto->descricao); ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="vlproduto">Valor Produto:</label>
                <input type="number" class="form-control" name="vlproduto" id="vlproduto" value="<?php echo e($venda->vlproduto); ?>"/>
            </div>

            <div class="form-group col-md-3">
                <label for="qtdeproduto">Quantidade Produto:</label>
                <input type="number" class="form-control" name="qtdeproduto" id="qtdeproduto" onchange="valorTotal()" value="<?php echo e($venda->qtdeproduto); ?>"/>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-3">
            <label for="vltotal">Valor Total:</label>
            <input type="number" class="form-control" name="vltotal" id="vltotal" readonly value="<?php echo e($venda->vltotal); ?>"/>
            </div>
            <div class="form-group col-md-3">
            <label for="vlpago">Valor Pago:</label>
            <input type="number" class="form-control" name="vlpago" id="vlpago" onchange="atualizarSituacao()" value="<?php echo e($venda->vlpago); ?>"/>
            </div>
            <div class="form-group col-md-2">
            <label for="situacao">Situação:</label>
            <input type="text" class="form-control" name="situacao" id="situacao" readonly value="<?php echo e($venda->situacao); ?>"/>
            </div>
        </div>
          <a href="<?php echo e(route('venda.index')); ?>" class="btn btn-sm btn-success">Voltar</a>
          <button type="submit" class="btn btn-primary">Atualizar Cadastro</button>
      </form>
  </div>
</div>
<script type="text/javascript">

function valorTotal()
  {
    var vlservico = $("#vlservico").val();
    var vlproduto = $("#vlproduto").val();
    var qtdeproduto = $("#qtdeproduto").val();
    var total = parseFloat(vlproduto) * parseFloat(qtdeproduto) + parseFloat(vlservico);

    $("#vltotal").val(total);
  };

  function atualizarSituacao()
  {
    console.log("entrou");
    console.log($("#vltotal").val());
    var vltotal = $("#vltotal").val();
    var vlpago = $("#vlpago").val();
      
    console.log("pago " + vlpago);
    console.log("total " + vltotal);
    if(parseFloat(vlpago) == parseFloat(vltotal))
    {
      $("#situacao").val("P");
    }
    else
    {
      $("#situacao").val("A");
    }
  };
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Users\TI\Documents\Uniagro\Projetos-Laravel\mecanica\resources\views/venda/edit.blade.php ENDPATH**/ ?>