<?php $__env->startSection('content'); ?>
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $edit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<form method="POST" action="<?php echo e(route('materi.update',$edit->id)); ?>">
  <?php echo csrf_field(); ?>
  <?php echo method_field('PUT'); ?>
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Materi</label> 
    <div class="col-8">
      <input id="nama" name="nama" type="text" class="form-control" required="required" value="<?php echo e($edit->nama); ?>" />
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-4 col-8">  
      <button name="proses" type="submit" class="btn btn-secondary" 
      value="ubah"><i class="fas fa-pen"> Ubah</i></button>&nbsp;&nbsp;&nbsp;
      <a rel="nofollow" href="<?php echo e(url('/materi')); ?>" 
       class="btn btn-primary btn-md">
        Kembali</a>  
      <input type="hidden" name="id" value="<?php echo e($edit->id); ?>">
    </div>
  </div>
</form>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\Baru\lavsp4\resources\views/materi/form_edit.blade.php ENDPATH**/ ?>