<?php $__env->startSection('title'); ?>
    Kategori Uang Masuk - DOMPETKU
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>KATEGORI UANG MASUK</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-dice-d6"></i> KATEGORI UANG MASUK</h4>
                    </div>

                    <div class="card-body">
                        <form action="<?php echo e(route('account.categories_debit.search')); ?>" method="GET">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <a href="<?php echo e(route('account.categories_debit.create')); ?>" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                                    </div>
                                    <input type="text" class="form-control" name="q"
                                           placeholder="cari berdasarkan nama kategori">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> CARI
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                    <th scope="col">NAMA KATEGORI</th>
                                    <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $no = 1;
                                ?>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hasil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row" style="text-align: center"><?php echo e($no); ?></th>
                                        <td><?php echo e($hasil->name); ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo e(route('account.categories_debit.edit', $hasil->id)); ?>" class="btn btn-sm btn-primary">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="<?php echo e($hasil->id); ?>">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php
                                        $no++;
                                    ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div style="text-align: center">
                                <?php echo e($categories->links("vendor.pagination.bootstrap-4")); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        /**
         * Sweet alert
         */
        <?php if($message = Session::get('success')): ?>
        swal({
            type: "success",
            icon: "success",
            title: "BERHASIL!",
            text: "<?php echo e($message); ?>",
            timer: 1500,
            showConfirmButton: false,
            showCancelButton: false,
            buttons: false,
        });
        <?php elseif($message = Session::get('error')): ?>
        swal({
            type: "error",
            icon: "error",
            title: "GAGAL!",
            text: "<?php echo e($message); ?>",
            timer: 1500,
            showConfirmButton: false,
            showCancelButton: false,
            buttons: false,
        });
        <?php endif; ?>

        // delete
        function Delete(id)
        {
            var id = id;
            var token = $("meta[name='csrf-token']").attr("content");

            swal({
                title: "APAKAH KAMU YAKIN ?",
                text: "INGIN MENGHAPUS DATA INI!",
                icon: "warning",
                buttons: [
                    'TIDAK',
                    'YA'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {

                    //ajax delete
                    jQuery.ajax({
                        url: "<?php echo e(route("account.categories_debit.index")); ?>/"+id,
                        data: 	{
                            "id": id,
                            "_token": token
                        },
                        type: 'DELETE',
                        success: function (response) {
                            if (response.status == "success") {
                                swal({
                                    title: 'BERHASIL!',
                                    text: 'DATA BERHASIL DIHAPUS!',
                                    icon: 'success',
                                    timer: 1000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            }else{
                                swal({
                                    title: 'GAGAL!',
                                    text: 'DATA GAGAL DIHAPUS!',
                                    icon: 'error',
                                    timer: 1000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            }
                        }
                    });

                } else {
                    return true;
                }
            })
        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.account', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KODING\uangku-laravel\resources\views/account/categories_debit/index.blade.php ENDPATH**/ ?>