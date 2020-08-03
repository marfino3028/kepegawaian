<?php $__env->startSection('content'); ?>
<div class="card shadow mb-4">

    <?php $__currentLoopData = $ar_materi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card-header py-3" style="background-color: #A9A9A9">
      <h6 class="m-0 font-weight-bold text-primary" style="font-size: 1cm; font-family: timesnewroman; text-align: center;"><?php echo e($mat->nama); ?></h6>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  <div>
  <a rel="nofollow" href="<?php echo e(url('/materi')); ?>" 
       class="btn btn-primary btn-md">
        Kembali</a>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\Baru\lavsp4\resources\views/materi/show.blade.php ENDPATH**/ ?>