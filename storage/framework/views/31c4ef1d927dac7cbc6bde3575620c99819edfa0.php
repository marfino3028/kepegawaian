 <h1 align="center">Data Pelatihan Pesantren YBM PLN</h1>
 <table align="center" width="100%" cellpadding="10" cellspacing="0" border="1">
                  <thead>
                    <tr>
                    	<?php
                   $ar_judul = ['No','Nama','Materi','Tempat Pelakasanan','Tanggal Mulai','Tanggal Akhir','Keterangan'];
                    $no = 1;
                    ?>
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
                      <td><?php echo e($pel->tgl_mulai); ?></td>
                      <td><?php echo e($pel->tgl_akhir); ?></td>
                      <td><?php echo e($pel->tempat); ?></td>
                      <td><?php echo e($pel->keterangan); ?></td>
                  		
                  	</tr>
                  	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table><?php /**PATH C:\xampp2\htdocs\Baru\lavsp4\resources\views/pelatihan/pelatihanPDF.blade.php ENDPATH**/ ?>