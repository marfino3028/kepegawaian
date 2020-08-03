<?php $__env->startSection('content'); ?>
<?php
$ar_pegawai = App\Pegawai::all();
$ar_materi = App\Materi::all();
?>
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $edit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<form method="POST" action="<?php echo e(route('pelatihan.update',$edit->id)); ?>" enctype="multipart/form-data">
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
    <label class="col-4 col-form-label">Materi</label> 
    <div class="col-8">
      <select name="tema" class="custom-select">
        <option value="">-- Pilih Materi --</option>
        <?php $__currentLoopData = $ar_materi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tema): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
        <?php echo e($cell = ($tema['id'] == $edit->materi_id) ? 'selected' : ''); ?>  
        <option value="<?php echo e($tema['id']); ?>" <?php echo e($cell); ?>> <?php echo e($tema['nama']); ?> </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="tempat" class="col-4 col-form-label">Tempat Pelaksanaan</label> 
    <div class="col-8">
      <input name="tempat" type="text" class="form-control" value="<?php echo e(($edit->tempat)); ?>" />
      <?php $__errorArgs = ['tempat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <div class="alert alert-danger"><?php echo e($message); ?></div>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

  </div>
  <div class="form-group row">
    <label for="tgl_mulai" class="col-4 col-form-label">Tanggal Mulai</label> 
    <div class="col-8">
      <input name="tgl_mulai" type="date" class="form-control" value="<?php echo e(($edit->tgl_mulai)); ?>" />
      <?php $__errorArgs = ['tgl_mulai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <div class="alert alert-danger"><?php echo e($message); ?></div>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
  </div>

   <div class="form-group row">
    <label for="tgl_akhir" class="col-4 col-form-label">Tanggal Akhir</label> 
    <div class="col-8">
      <input name="tgl_akhir" type="date" class="form-control" value="<?php echo e(($edit->tgl_akhir)); ?>" />
      <?php $__errorArgs = ['tgl_akhir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <div class="alert alert-danger"><?php echo e($message); ?></div>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
  </div>
  
   <div class="form-group row">
     <label for="keterangan" class="col-4 col-form-label">Keterangan</label> 
    <div class="col-8">
      <textarea id="keterangan" name="keterangan" cols="40" rows="5" class="form-control"><?php echo e($edit->keterangan); ?></textarea>
    </div>
  </div>

  <div class="form-group row">
    <div class="offset-4 col-8">  
       <button name="proses" type="submit" class="btn btn-secondary" 
      value="ubah"><i class="fas fa-pen"></i>&nbsp;Ubah</button>&nbsp;&nbsp;&nbsp;
    <a rel="nofollow" href="<?php echo e(url('/pelatihan')); ?>" 
       class="btn btn-primary btn-md">
        Kembali</a>
    </div>
    </div>
</form>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\Baru\lavsp4\resources\views/pelatihan/form_edit.blade.php ENDPATH**/ ?>