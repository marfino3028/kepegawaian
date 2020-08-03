 <h1 align="center">Data Pegawai Pesantren YBM PLN</h1>
 <table align="center" width="100%" cellpadding="2" cellspacing="0" border="1">
                  <thead>
                    <tr>
                    	<?php
                    $ar_judul = ['No','NIP','Nama','Gender','Kategori','Jabatan','Divisi'];
                    $no = 1;
                    ?>
                  	<?php $__currentLoopData = $ar_judul; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jdl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <th><?php echo e($jdl); ?></th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php $__currentLoopData = $ar_pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $peg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  	<tr>
                  		<td><?php echo e($no++); ?></td>
                      <td><?php echo e($peg->nip); ?></td>
                  		<td><?php echo e($peg->nama); ?></td>
                      <td><?php echo e($peg->gender); ?></td>
                      <td><?php echo e($peg->jenis); ?></td>
                      <td><?php echo e($peg->posisi); ?></td>
                      <td><?php echo e($peg->bagian); ?></td>
                   
                      <!--td >

                      	<center>
                      <?php if(!empty($peg->foto)): ?>
                        <img src="img/<?php echo e(($peg->foto)); ?>" width="20%" />
                        <?php else: ?>
                       <img src="img/no-photo.jpg">
                        <?php endif; ?>
                      </center>
                      </td-->
                  		
                  	</tr>
                  	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table><?php /**PATH C:\xampp2\htdocs\Baru\lavsp4\resources\views/pegawai/pegawaiPDF.blade.php ENDPATH**/ ?>