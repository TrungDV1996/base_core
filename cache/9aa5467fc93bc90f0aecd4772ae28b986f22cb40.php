<?php $__env->startSection("content"); ?>
    <form method="post" action="<?php echo e($baseUrl); ?>user/update" id="formEdit">
        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" name="id" class="form-control" value="<?php echo e($result['id']); ?>" id="id" placeholder="" readonly>
        </div>
        <div class="form-group">
            <label for="username">Name</label>
            <input type="text" name="username" class="form-control" value="<?php echo e($result['name']); ?>" id="name" placeholder="name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" value="<?php echo e($result['email']); ?>" id="email" placeholder="email">
        </div>
        <button type="submit" name="update" class="btn btn-primary" id="update">Update</button>
        <div>
            <a href="<?php echo e($baseUrl); ?>">Return Home</a>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layout.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\base-core\resources\views/user/edit.blade.php ENDPATH**/ ?>