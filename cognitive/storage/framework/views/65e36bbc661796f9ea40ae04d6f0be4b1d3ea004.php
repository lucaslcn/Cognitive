<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3>Lista de Produtos</h3>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-sm btn-success" href="<?php echo e(route('produto.create')); ?>">Cadastrar Novo Produto</a>    
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
            <th><b>Descrição</b></th>
            <th><b>Unidade</b></th>
            <th><b>Vl. Custo</b></th>
            <th><b>Vl. Venda</b></th>
            <th><b>Ação</b></th>
        </tr>

        <?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><b><?php echo e($produto->id); ?></b></td>
            <td><b><?php echo e($produto->descricao); ?></b></td>
            <td><b><?php echo e($produto->unidade); ?></b></td>
            <td><b><?php echo e($produto->vlcusto); ?></b></td>
            <td><b><?php echo e($produto->vlvenda); ?></b></td>
            <td>
                <form action="<?php echo e(route('produto.destroy', $produto->id)); ?>" method="post">
                    <a class="btn btn-sm btn-success" href="<?php echo e(route('produto.show', $produto->id)); ?>">Exibir</a>
                    <a class="btn btn-sm btn-warning" href="<?php echo e(route('produto.edit', $produto->id)); ?>">Editar</a>
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

<?php echo $produtos->links(); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Users\TI\Documents\Uniagro\Projetos-Laravel\mecanica\resources\views/produto/index.blade.php ENDPATH**/ ?>