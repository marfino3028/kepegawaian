<?php $__env->startSection('content'); ?>

                 <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
              <a href="<?php echo e(url('pegawai')); ?>">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-2" style="font-size: 7mm; font-family: timesnewroman;">Jumlah Pegawai</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 5mm"><?php echo e($pegawai); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
            
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
            <a href="#">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-2" style="font-size: 7mm; font-family: timesnewroman;">Guru SMP</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 5mm"><?php echo e($smp); ?></div>
                    </div>
                   <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div></a>
            </div>


            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <a href="#">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-2" style="font-size: 7mm; font-family: timesnewroman;">Guru SMK</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" style="font-size: 5mm"><?php echo e($smk); ?></div>
                        </div>
                        <div class="col">
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div></a>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <a href="#">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-2" style="font-size: 7mm; font-family: timesnewroman;">Staff</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 5mm"><?php echo e($staff); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div></a>
            </div>
          </div>


                  


            
          <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\Baru\lavsp4\resources\views/layouts/dashboard.blade.php ENDPATH**/ ?>