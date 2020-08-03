<?php $__env->startSection('content'); ?>
<?php
$ar_judul = ['No','Materi','Action'];
$no = 1;
?>
<!-------awal modal tambah data---------->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  <i class="fas fa-user-plus">&nbsp;</i>Tambah Data
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo $__env->make('materi.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
&nbsp;
<!-------Akhir modal data-------->
<br/><br/>
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Materi</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                  	<?php $__currentLoopData = $ar_judul; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jdl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <th><?php echo e($jdl); ?></th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php $__currentLoopData = $ar_materi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  	<tr>
                  		<td><?php echo e($no++); ?></td>
                  		<td><?php echo e($mat->nama); ?></td>
                  		<td>
                  			<form action="<?php echo e(route('materi.destroy', $mat->id)); ?>" method="POST">
                        <a href="<?php echo e(route('materi.show', $mat->id)); ?>" class="btn btn-info"><i class="fas fa-eye"></i></a>
                        <a href="<?php echo e(route('materi.edit', $mat->id)); ?>" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                        <?php if(Auth::user()->role == 'administrator' || Auth::user()->role == 'kepsek'): ?> 
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apa anda yakin ingin menghapus data?')"><i class="fas fa-trash"></i></button>
                        <?php endif; ?>
                      </form>
                  		</td>
                  	</tr>
                  	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\Baru\lavsp4\resources\views/materi/index.blade.php ENDPATH**/ ?>