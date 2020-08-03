<?php $__env->startSection('content'); ?>

<div class="card shadow mb-4">
    <?php $__currentLoopData = $ar_gaji; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gaj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
     <div class="card-header py-3 text-left">
      <label>Gapok&nbsp;&nbsp;:&nbsp; <?php echo e(number_format ($gaj->gapok)); ?></label>
    </div>
    <div class="card-header py-3 text-left">
      <label>Tunjangan&nbsp;&nbsp;:&nbsp; <?php echo e(number_format ($gaj->tunjab)); ?></label>
    </div>
    <div class="card-header py-3 text-left">
      <label>BPJS&nbsp;&nbsp;:&nbsp; <?php echo e(number_format ($gaj->bpjs)); ?></label>
    </div>
    <div class="card-header py-3 text-left">
      <label>Bonus&nbsp;&nbsp;:&nbsp; <?php echo e(number_format ($gaj->bonus)); ?></label>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      
  </div>
   <div>
    <a rel="nofollow" href="<?php echo e(url('/gaji')); ?>" 
       class="btn btn-primary btn-md">
        Kembali</a>
   </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\Baru\lavsp4\resources\views/gaji/show.blade.php ENDPATH**/ ?>