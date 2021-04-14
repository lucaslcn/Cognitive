<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3>Registro de Vendas</h3>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-sm btn-success" href="<?php echo e(route('venda.create')); ?>">Registrar Nova Venda</a>    
            </div>
        </div>
    
    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>

    <table class="table table-hover table-sm">
        <tr>
            <th><b>ID</b></th>
            <th><b>Data Venda</b></th>
            <th><b>ID Cliente</b></th>
            <th><b>Vl. Total</b></th>
            <th><b>Vl. Pago</b></th>
            <th><b>Situacao</b></th>
            <th><b>Ação</b></th>
        </tr>

        <?php $__currentLoopData = $vendas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $venda): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><b><?php echo e($venda->id); ?></b></td>
            <td><b><?php echo e($venda->created_at); ?></b></td>
            <td><b><?php echo e($venda->idpessoa); ?></b></td>
            <td><b><?php echo e($venda->vltotal); ?></b></td>
            <td><b><?php echo e($venda->vlpago); ?></b></td>
            <td><b><?php echo e($venda->situacao); ?></b></td>
            <td>
                <form action="<?php echo e(route('venda.destroy', $venda->id)); ?>" method="post">
                    <a class="btn btn-sm btn-success" href="<?php echo e(route('venda.show', $venda->id)); ?>">Exibir</a>
                    <a class="btn btn-sm btn-warning" href="<?php echo e(route('venda.edit', $venda->id)); ?>">Editar</a>
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

<?php echo $vendas->links(); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Users\TI\Documents\Uniagro\Projetos-Laravel\mecanica\resources\views/venda/index.blade.php ENDPATH**/ ?>