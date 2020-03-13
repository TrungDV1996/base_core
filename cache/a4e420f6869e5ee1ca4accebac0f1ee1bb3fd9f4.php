<?php $__env->startSection("content"); ?>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th scope="row"><?php echo e($value['id']); ?></th>
                <td><?php echo e($value['name']); ?></td>
                <td><?php echo e($value['email']); ?></td>
                <td><?php echo e($value['password']); ?></td>
                <td><a href="<?php echo e($baseUrl); ?>user/edit/<?php echo e($value['id']); ?>">Edit</a></td>
                <td>
                    <a href="<?php echo e($baseUrl); ?>user/delete/<?php echo e($value['id']); ?>" onclick="return confirm('Are You Sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layout.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\base-core\resources\views/test.blade.php ENDPATH**/ ?>