<?php $__env->startSection('title'); ?>
   Tambah Kategori Uang keluar - DOMPETKU
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>KATEGORI UANG KELUAR</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-dice-d6"></i> TAMBAH KATEGORI UANG KELUAR</h4>
                    </div>

                    <div class="card-body">

                        <form action="<?php echo e(route('account.categories_credit.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label>NAMA KATEGORI</label>
                                <input type="text" name="name" value="<?php echo e(old('name')); ?>" placeholder="Masukkan Nama Kategori" class="form-control">

                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback" style="display: block">
                                        <?php echo e($message); ?>

                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> SIMPAN</button>
                            <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        var timeoutHandler = null;

        /**
         * btn submit loader
         */
        $( ".btn-submit" ).click(function()
        {
            $( ".btn-submit" ).addClass('btn-progress');
            if (timeoutHandler) clearTimeout(timeoutHandler);

            timeoutHandler = setTimeout(function()
            {
                $( ".btn-submit" ).removeClass('btn-progress');

            }, 1000);
        });

        /**
         * btn reset loader
         */
        $( ".btn-reset" ).click(function()
        {
            $( ".btn-reset" ).addClass('btn-progress');
            if (timeoutHandler) clearTimeout(timeoutHandler);

            timeoutHandler = setTimeout(function()
            {
                $( ".btn-reset" ).removeClass('btn-progress');

            }, 500);
        })

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.account', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KODING\uangku-laravel\resources\views/account/categories_credit/create.blade.php ENDPATH**/ ?>