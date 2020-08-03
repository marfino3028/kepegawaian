<?php

$ar_pegawai = App\Pegawai::all();
?>
<form method="POST" action="<?php echo e(route('gaji.store')); ?>"
      enctype="multipart/form-data"> 
   <?php echo csrf_field(); ?> 
  <div class="form-group row">
    <label class="col-4 col-form-label">Pegawai</label> 
    <div class="col-8">
      <select name="nama" class="custom-select <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
        <option value="">-- Pilih Pegawai --</option>
        <?php $__currentLoopData = $ar_pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $peg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
        <option value="<?php echo e($peg['id']); ?>" <?php if(old('nama') == $peg['id']): ?> selected <?php endif; ?>> <?php echo e($peg['nama']); ?> </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
      <?php $__errorArgs = ['nama'];
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
    <label for="gapok" class="col-4 col-form-label">Gaji Pokok</label> 
    <div class="col-8">
      <input id="gapok" name="gapok" type="text" class="form-control" required="required" value="" />
    </div>
  </div>

  <div class="form-group row">
    <label for="tunjab" class="col-4 col-form-label">Tunjangan Jabatan</label> 
    <div class="col-8">
      <input id="tunjab" name="tunjab" type="text" class="form-control" required="required" value="" />
    </div>
  </div>

  <div class="form-group row">
    <label for="bpjs" class="col-4 col-form-label">BPJS</label> 
    <div class="col-8">
      <input id="bpjs" name="bpjs" type="text" class="form-control" required="required" value="" />
    </div>
  </div>

  <div class="form-group row">
    <label for="bonus" class="col-4 col-form-label">Bonus</label> 
    <div class="col-8">
      <input id="bonus" name="bonus" type="text" class="form-control" required="required" value="" />
    </div>
  </div>

  <div class="form-group row">
    <div class="offset-4 col-8">  
      <button name="proses" type="submit" class="btn btn-primary" 
      value="simpan">Simpan</button>
    </div>
  </div>
</form><?php /**PATH C:\xampp2\htdocs\Baru\lavsp4\resources\views/gaji/form.blade.php ENDPATH**/ ?>