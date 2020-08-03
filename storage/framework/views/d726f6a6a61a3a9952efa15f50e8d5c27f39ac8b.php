<?php $__env->startSection('content'); ?>
<?php
//array scalar
$ar_gender = ['L'=>'Laki-Laki', 'P'=>'Perempuan'];
//ambil master data
$ar_kategori = App\Kategori::all();
$ar_jabatan = App\Jabatan::all();
$ar_divisi = App\Divisi::all();
?>
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $edit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<form method="POST" action="<?php echo e(route('pegawai.update',$edit->id)); ?>" enctype="multipart/form-data">
  <?php echo csrf_field(); ?>
  <?php echo method_field('PUT'); ?>

  <div class="form-group row">
        <label for="nip" class="col-4 col-form-label">NIP</label> 
        <div class="col-8">
          <input id="nip" name="nip" type="text"class="form-control" value="<?php echo e($edit->nip); ?>" />
        </div>
  </div> 

  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Nama Pegawai</label> 
    <div class="col-8">
      <input id="nama" name="nama" type="text" class="form-control" value="<?php echo e($edit->nama); ?>" />
    </div>
  </div>

<div class="form-group row">
    <label for="gridRadios" class="col-4">Gender</label>
    <div class="col-8">
      <div class="custom-control-inline">
         <?php
         $no = 0;
         ?>
         <?php $__currentLoopData = $ar_gender; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <?php
         $cek = ($edit->gender == $k) ? 'checked' : '';
         ?>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="jk" value="<?php echo e($k); ?>" <?php echo e($cek); ?> />
          <label class="form-check-label">
            <?php echo e($v); ?>

          </label> 
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
</div>

  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Tempat Lahir</label> 
    <div class="col-8">
      <input id="nama" name="tempat" type="text" class="form-control" value="<?php echo e($edit->tempat_lahir); ?>" />
    </div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Tanggal Lahir</label> 
    <div class="col-8">
      <input id="nama" name="tanggal" type="date" class="form-control" value="<?php echo e($edit->tanggal_lahir); ?>" />
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4 col-form-label">Kategori</label> 
    <div class="col-8">
      <select name="kategori" class="custom-select">
        <option value="">-- Pilih Kategori Pegawai --</option>
        <?php $__currentLoopData = $ar_kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($cell = ($kat['id'] == $edit->kategori_id) ? 'selected' : ''); ?>   
        <option value="<?php echo e($kat['id']); ?>" <?php echo e($cell); ?>> <?php echo e($kat['nama']); ?> </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4 col-form-label">Jabatan</label> 
    <div class="col-8">
      <select name="jabatan" class="custom-select">
        <option value="">-- Pilih Jabatan --</option>
        <?php $__currentLoopData = $ar_jabatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
        <?php echo e($cell = ($jab['id'] == $edit->jabatan_id) ? 'selected' : ''); ?>  
        <option value="<?php echo e($jab['id']); ?>" <?php echo e($cell); ?>> <?php echo e($jab['nama']); ?> </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4 col-form-label">Divisi</label> 
    <div class="col-8">
      <select name="divisi" class="custom-select">
        <option value="">-- Pilih Divisi --</option>
        <?php $__currentLoopData = $ar_divisi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $div): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
        <?php echo e($cell = ($div['id'] == $edit->divisi_id) ? 'selected' : ''); ?>  
        <option value="<?php echo e($div['id']); ?>" <?php echo e($cell); ?>> <?php echo e($div['nama']); ?> </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="alamat" class="col-4 col-form-label">Alamat</label> 
    <div class="col-8">
      <textarea id="alamat" name="alamat" cols="40" rows="5" class="form-control"><?php echo e($edit->alamat); ?></textarea>
    </div>
  </div>

  <div class="form-group row">
    <label for="hp" class="col-4 col-form-label">HP</label> 
    <div class="col-8">
      <input id="hp" name="hp" value="<?php echo e($edit->hp); ?>" type="text" class="form-control">
    </div>
  </div>

  <div class="form-group row">
    <label for="email" class="col-4 col-form-label">Email</label> 
    <div class="col-8">
      <input id="email" name="email" value="<?php echo e($edit->email); ?>" type="email" class="form-control">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="foto" class="col-4 col-form-label">Foto</label> 
    <div class="col-8">
      <input value="<?php echo e($edit->foto); ?>" name="foto" type="file" class="form-control-file">
    </div>
  </div> 
  <div class="form-group row">

    <div class="offset-4 col-8">
     <div>
 
       <button name="proses" type="submit" class="btn btn-secondary" 
      value="ubah"><i class="fas fa-pen"></i>&nbsp;Ubah</button>&nbsp;&nbsp;&nbsp;
    <a rel="nofollow" href="<?php echo e(url('/pegawai')); ?>" 
       class="btn btn-primary btn-md">
        Kembali</a>
    </div>
  </div>
</form>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\Baru\lavsp4\resources\views/pegawai/form_edit.blade.php ENDPATH**/ ?>