<?php $__env->startSection('content'); ?>
<?php
$ar_judul = ['No','Nama','Materi','Tempat Pelakasanan','Tanggal Mulai','Tanggal Akhir','Keterangan','Action'];
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
        <h5 class="modal-title" id="exampleModalLabel">Form Pelatihan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo $__env->make('pelatihan.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
&nbsp;
<!-------Akhir modal data-------->

<a href="<?php echo e(url('pelatihan-pdf')); ?>" 
  class="btn btn-danger btn-md">
 <i class="fas fa-file-pdf"></i>&nbsp;Data Pelatihan
</a>&nbsp;&nbsp;

<br/><br/>

<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Pelatihan</h6>
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
                  	<?php $__currentLoopData = $ar_pelatihan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  	<tr>
                  		<td><?php echo e($no++); ?></td> 
                  		<td><?php echo e($pel->nama); ?></td>
                      <td><?php echo e($pel->tema); ?></td>
                      <td><?php echo e($pel->tempat); ?></td>
                      <td><?php echo e($pel->tgl_mulai); ?></td>
                      <td><?php echo e($pel->tgl_akhir); ?></td>
                      <td><?php echo e($pel->keterangan); ?></td>
                  		<td>
                      <form action="<?php echo e(route('pelatihan.destroy', $pel->id)); ?>" method="POST">
                  			<a href="<?php echo e(route('pelatihan.show', $pel->id)); ?>" class="btn btn-info"><i class="fas fa-eye"></i></a>
                  			<a href="<?php echo e(route('pelatihan.edit', $pel->id)); ?>" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                         <?php if(Auth::user()->role == 'administrator' || Auth::user()->role == 'kepsek'): ?> 
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                  			<button class="btn btn-danger" onclick="return confirm('Apa anda yakin ingin menghapus data?')"><i class="fas fa-trash"></i></button>
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
<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\Baru\lavsp4\resources\views/pelatihan/index.blade.php ENDPATH**/ ?>