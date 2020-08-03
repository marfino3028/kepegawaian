<?php $__env->startSection('content'); ?>
<div class="card shadow mb-4">
    <?php $__currentLoopData = $ar_pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $peg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"><?php echo e($peg->nama); ?></h6>
    </div>
    <div class="card-body">
      <div class="text-center">
        <?php if(!empty($peg->foto)): ?>
          <img id="poto" class="img-fluid img-thumbnail" src="<?php echo e(asset('img/'.$peg->foto)); ?>">
        <?php else: ?>
          <img id="poto" class="img-fluid img-thumbnail" src="<?php echo e(asset('img/no-photo.png')); ?>" >
        <?php endif; ?>
      </div>
      <div class="alert alert-dismissable alert-primary">
          NIP : <?php echo e($peg->nip); ?> <br/>
          Nama : <?php echo e($peg->nama); ?> <br/>
          Jenis Kelamin : <?php echo e($peg->gender); ?> <br/>
          Tempat Lahir : <?php echo e($peg->tempat_lahir); ?> <br/>
          Tanggal Lahir : <?php echo e($peg->tanggal_lahir); ?> <br/>
          Kategori Pegawai : <?php echo e($peg->jenis); ?> <br/>
          Jabatan : <?php echo e($peg->posisi); ?> <br/>
          Divisi : <?php echo e($peg->bagian); ?> <br/>
          Alamat : <?php echo e($peg->alamat); ?> <br/>
          HP : <?php echo e($peg->hp); ?> <br/>
          Email : <?php echo e($peg->email); ?>

      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <a rel="nofollow" href="<?php echo e(url('/pegawai')); ?>" 
       class="btn btn-primary btn-md">
        Kembali</a>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\Baru\lavsp4\resources\views/pegawai/show.blade.php ENDPATH**/ ?>