<?php $__env->startSection('content'); ?>
<div class="card shadow mb-4">
    <?php $__currentLoopData = $ar_jabatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card-header py-3 text-center">
      <h6 class="m-0 font-weight-bold text-primary"><?php echo e($jab->nama); ?></h6>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\Baru\lavsp4\resources\views/jabatan/show.blade.php ENDPATH**/ ?>