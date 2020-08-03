<form method="POST" action="<?php echo e(route('materi.store')); ?>">
  <?php echo csrf_field(); ?> 
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Materi</label> 
    <div class="col-8">
      <input id="nama" name="nama" type="text" class="form-control" required="required" value="" />
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-4 col-8">  
      <button name="proses" type="submit" class="btn btn-primary" 
      value="simpan">Simpan</button>
    </div>
  </div>
</form>
<?php /**PATH C:\xampp2\htdocs\Baru\lavsp4\resources\views/materi/form.blade.php ENDPATH**/ ?>