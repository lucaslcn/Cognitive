<!-- create.blade.php -->



<?php $__env->startSection('content'); ?>
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Registrar Venda
  </div>
  <div class="card-body">
    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
      <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </div>
    <br>
    <?php endif; ?>
    <form method="post" action="<?php echo e(route('venda.store')); ?>">
      <?php echo csrf_field(); ?>
      <div class="row">
        <div class="form-group col-md-4">
          <label for="idpessoa">Proprietário:</label>
          <select class="form-control" name="idpessoa" id="idpessoa">
            <option>Selecione o Proprietário</option>
            <?php $__currentLoopData = $pessoas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pessoa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($pessoa->id); ?>"><?php echo e($pessoa->nome); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>
        <div class="form-group col-md-4">
          <label for="idveiculo">Veículo:</label>
          <select class="form-control" name="idveiculo" id="idveiculo">
            <option>Selecione o Proprietário</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-4">
          <label for="idservico">Serviço:</label>
          <select class="form-control" name="idservico" id="idservico"  onchange="valorServico(this)">
            <option>Selecione o Serviço</option>
            <?php $__currentLoopData = $servicos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servico): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($servico->id); ?>" data-valorbase="<?php echo e($servico->valorbase); ?>"><?php echo e($servico->descricao); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>
        <div class="form-group col-md-3">
          <label for="vlservico">Valor Serviço:</label>
          <input type="number" class="form-control" name="vlservico" id="vlservico"/>
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-4">
          <label for="idproduto">Produto:</label>
          <select class="form-control" name="idproduto" id="idproduto"  onchange="valorProduto(this)">
            <option>Selecione o Produto</option>
            <?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($produto->id); ?>" data-valorbase="<?php echo e($produto->vlvenda); ?>"><?php echo e($produto->descricao); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>
        <div class="form-group col-md-3">
          <label for="vlproduto">Valor Produto:</label>
          <input type="number" class="form-control" name="vlproduto" id="vlproduto"/>
        </div>

        <div class="form-group col-md-3">
          <label for="qtdeproduto">Quantidade Produto:</label>
          <input type="number" class="form-control" name="qtdeproduto" id="qtdeproduto" onchange="valorTotal()"/>
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-3">
          <label for="vltotal">Valor Total:</label>
          <input type="number" class="form-control" name="vltotal" id="vltotal" readonly/>
        </div>
        <div class="form-group col-md-3">
          <label for="vlpago">Valor Pago:</label>
          <input type="number" class="form-control" name="vlpago" id="vlpago" onchange="atualizarSituacao()"/>
        </div>
        <div class="form-group col-md-2">
          <label for="situacao">Situação:</label>
          <input type="text" class="form-control" name="situacao" id="situacao" readonly/>
        </div>
      </div>
      <a href="<?php echo e(route('venda.index')); ?>" class="btn btn-sm btn-success">Voltar</a>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </div>
</div>

<script type="text/javascript">
  var path = "<?php echo e(route('veiculosPessoa')); ?>";
  
  function valorTotal()
  {
    var vlservico = $("#vlservico").val();
    var vlproduto = $("#vlproduto").val();
    var qtdeproduto = $("#qtdeproduto").val();
    var total = parseFloat(vlproduto) * parseFloat(qtdeproduto) + parseFloat(vlservico);

    $("#vltotal").val(total);
  };

  function valorServico(e)
  {
    var valorbase = $(e).children(':selected').data("valorbase");

    $("#vlservico").val(valorbase);
  };

  function valorProduto(e)
  {
    var valorbase = $(e).children(':selected').data("valorbase");

    $("#vlproduto").val(valorbase);
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

  $(document).ready(function (){
  //console.log("teste");

  

    $("#idpessoa").change(function(e){
      //console.log(e);
      var idpessoa = e.target.value;
      //console.log(idpessoa);
      
      $.get(path, { idpessoa: idpessoa }, function (data) {
        //console.log("objeto retornado:");
        //console.log(data);
        
        $('#idveiculo').empty();
        $('#idveiculo').append('<option>Selecione um Veículo</option>');
        $.each(data, function(index, veiculos){
          $('#idveiculo').append('<option value="'+ veiculos.id +'">'+ veiculos.modelo +' - '+ veiculos.placa +'</option>');
        });''
      });
    });
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Users\TI\Documents\Uniagro\Projetos-Laravel\mecanica\resources\views/venda/create.blade.php ENDPATH**/ ?>