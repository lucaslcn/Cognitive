<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3>Lista de Disciplinas</h3>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-sm btn-success" href="<?php echo e(route('disciplina.create')); ?>">Cadastrar Nova Disciplina</a>    
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
            <th><b>ID Área</b></th>
            <th><b>Disciplina</b></th>
            <th><b>Ação</b></th>
        </tr>

        <?php $__currentLoopData = $disciplinas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $disciplina): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><b><?php echo e($disciplina->id); ?></b></td>
            <td><b><?php echo e($disciplina->idarea); ?></b></td>
            <td><b><?php echo e($disciplina->disciplina); ?></b></td>
            <td>
                <form action="<?php echo e(route('disciplina.destroy', $disciplina->id)); ?>" method="post">
                    <a class="btn btn-sm btn-success" href="<?php echo e(route('disciplina.show', $disciplina->id)); ?>">Exibir</a>
                    <a class="btn btn-sm btn-warning" href="<?php echo e(route('disciplina.edit', $disciplina->id)); ?>">Editar</a>
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

<?php echo $disciplinas->links(); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Users\Felipe\Documents\Cognitive\cognitive\resources\views/disciplina/index.blade.php ENDPATH**/ ?>