<?php $__env->startSection('content'); ?>
<?php
$ar_pegawai = App\Pegawai::all();
?>

<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $edit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<form method="POST" action="<?php echo e(route('gaji.update',$edit->id)); ?>" enctype="multipart/form-data">
  <?php echo csrf_field(); ?>
  <?php echo method_field('PUT'); ?>

 <div class="form-group row">
    <label class="col-4 col-form-label">Pegawai</label> 
    <div class="col-8">
      <select name="nama" class="custom-select">
        <option value="">-- Pilih Pegawai --</option>
        <?php $__currentLoopData = $ar_pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $peg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
        <?php echo e($cell = ($peg['id'] == $edit->pegawai_id) ? 'selected' : ''); ?>  
        <option value="<?php echo e($peg['id']); ?>" <?php echo e($cell); ?>> <?php echo e($peg['nama']); ?> </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="gapok" class="col-4 col-form-label">Gapok</label> 
    <div class="col-8">
      <input id="gapok" name="gapok" type="text" class="form-control"  value="<?php echo e(($edit->gapok)); ?>" />
    </div>
  </div>

  <div class="form-group row">
    <label for="tunjab" class="col-4 col-form-label">Tunjab</label> 
    <div class="col-8">
      <input id="tunjab" name="tunjab" type="text" class="form-control"  value="<?php echo e($edit->tunjab); ?>" />
    </div>

  </div>
  <div class="form-group row">
    <label for="tunjab" class="col-4 col-form-label">Bpjs</label> 
    <div class="col-8">
      <input id="bpjs" name="bpjs" type="text" class="form-control"  value="<?php echo e($edit->bpjs); ?>" />
    </div>
  </div>

  <div class="form-group row">
    <label for="tunjab" class="col-4 col-form-label">Bonus</label> 
    <div class="col-8">
      <input id="bonus" name="bonus" type="text" class="form-control"  value="<?php echo e($edit->bonus); ?>" />
    </div>
  </div>

  <div class="form-group row">
    <div class="offset-4 col-8">  
      
       <button name="proses" type="submit" class="btn btn-secondary" 
      value="ubah"><i class="fas fa-pen"></i>&nbsp;Ubah</button>
   
      <input type="hidden" name="id" value="<?php echo e($edit->id); ?>">
       <a rel="nofollow" href="<?php echo e(url('/gaji')); ?>" 
       class="btn btn-primary btn-md">
        Kembali</a>
    </div>
  </div>
</form>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\Baru\lavsp4\resources\views/gaji/form_edit.blade.php ENDPATH**/ ?>