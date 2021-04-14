<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3>Lista de Cidades</h3>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-sm btn-success" href="<?php echo e(route('cidade.create')); ?>">Cadastrar Nova Cidade</a>    
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
            <th><b>ID Estado</b></th>
            <th><b>Nome Estado</b></th>
            <th><b>Cidade</b></th>
            <th><b>CEP</b></th>
            <th><b>Ação</b></th>
        </tr>

        <?php $__currentLoopData = $cidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cidade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><b><?php echo e($cidade->id); ?></b></td>
            <td><b><?php echo e($cidade->idestado); ?></b></td>
            <td><b></b></td>
            <td><b><?php echo e($cidade->cidade); ?></b></td>
            <td><b><?php echo e($cidade->cep); ?></b></td>
            <td>
                <form action="<?php echo e(route('cidade.destroy', $cidade->id)); ?>" method="post">
                    <a class="btn btn-sm btn-success" href="<?php echo e(route('cidade.show', $cidade->id)); ?>">Exibir</a>
                    <a class="btn btn-sm btn-warning" href="<?php echo e(route('cidade.edit', $cidade->id)); ?>">Editar</a>
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

<?php echo $cidades->links(); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Users\Felipe\Documents\Cognitive\cognitive\resources\views/cidade/index.blade.php ENDPATH**/ ?>