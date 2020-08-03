<?php $__env->startSection('content'); ?>
<?php
$ar_user = App\User::all();
$ar_data = ['administrator','kepsek','guru','staff'];
?>
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $edit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<form method="POST" action="<?php echo e(route('user.update',$edit->id)); ?>">
  <?php echo csrf_field(); ?>
  <?php echo method_field('PUT'); ?>
   <div class="form-group row">
    <label for="name" class="col-4 col-form-label">Username</label> 
    <div class="col-8">
      <input  name="name" type="text" class="form-control" value="<?php echo e($edit->name); ?>" />
      <?php $__errorArgs = ['name'];
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
    <label for="email" class="col-4 col-form-label">Email</label> 
    <div class="col-8">
      <input name="email" value="<?php echo e($edit->email); ?>" type="email" class="form-control">
     <?php $__errorArgs = ['email'];
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
    <label class="col-4 col-form-label">Role</label> 
    <div class="col-8">
      <select name="role" class="custom-select">
        <option value="">-- Role --</option>
        <?php $__currentLoopData = $ar_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
        <option value="<?php echo e($dat); ?>" <?php if(old('role') == $dat): ?> <?php endif; ?>> <?php echo e($dat); ?> </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
     <?php $__errorArgs = ['role'];
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
 
 <!--div class="form-group row">
    <label for="foto" class="col-4 col-form-label">Fotonya</label> 
    <div class="col-8">
      <input id="foto" value="<?php echo e($edit->foto); ?>" name="foto" type="file" class="form-control-file">
    </div>
  </div--> 
  <div class="form-group row">
   <div class="offset-4 col-8">
     <div>
 <button name="proses" type="submit" class="btn btn-secondary" 
      value="ubah"><i class="fas fa-pen"></i>&nbsp;Ubah</button>
 </div>
</div>
</div>

</form>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\Baru\lavsp4\resources\views/user/form_edit.blade.php ENDPATH**/ ?>