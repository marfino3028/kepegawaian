<?php $__env->startSection('content'); ?>
<div class="card shadow mb-4">
    <?php $__currentLoopData = $ar_pelatihan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <div class="card-header py-3" style="background-color: #A9A9A9">
      <h6 class="m-0 font-weight-bold text-primary" style="font-size: 1cm; font-family: timesnewroman; text-align: center;"><?php echo e($pel->tema); ?></h6>
    </div>
    <div class="card-header py-3 text-left">
      <label>Nama&nbsp;&nbsp;:&nbsp; <?php echo e($pel->nama); ?></label>
    </div>
     <div class="card-header py-3 text-left">
      <label>Materi&nbsp;&nbsp;:&nbsp; <?php echo e($pel->tema); ?></label>
    </div>
    <div class="card-header py-3 text-left">
      <label>Tempat Pelaksanaan&nbsp;&nbsp;:&nbsp; <?php echo e($pel->tempat); ?></label>
    </div>
    <div class="card-header py-3 text-left">
      <label>Tanggal Mulai&nbsp;&nbsp;:&nbsp; <?php echo e($pel->tgl_mulai); ?></label>
    </div>
    <div class="card-header py-3 text-left">
      <label>Tanggal Akhir&nbsp;&nbsp;:&nbsp; <?php echo e($pel->tgl_akhir); ?></label>
    </div>
    <div class="card-header py-3 text-left">
      <label>Keterangan&nbsp;&nbsp;:&nbsp; <?php echo e($pel->keterangan); ?></label>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  <div>
    <a rel="nofollow" href="<?php echo e(url('/pelatihan')); ?>" 
       class="btn btn-primary btn-md">
        Kembali</a>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\Baru\lavsp4\resources\views/pelatihan/show.blade.php ENDPATH**/ ?>