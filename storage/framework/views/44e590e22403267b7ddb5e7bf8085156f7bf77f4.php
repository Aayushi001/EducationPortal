<?php $__env->startSection('content'); ?>

	<table>
        <thead>
        <th>Name</th>
        <th>E-Mail</th>
        <th>User</th>
        <th>Teacher</th>
        <th>Admin</th>
        <th></th>
        </thead>
        <tbody>
        <?php foreach($users as $user): ?>
            <tr>
                <form action="<?php echo e(route('admin.assign')); ?>" method="post">
                    <td><?php echo e($user->first_name); ?></td>
                    <td><?php echo e($user->email); ?> <input type="hidden" name="email" value="<?php echo e($user->email); ?>"></td>
                    <td><input type="checkbox" <?php echo e($user->hasRole('User') ? 'checked' : ''); ?> name="role_user"></td>
                    <td><input type="checkbox" <?php echo e($user->hasRole('Teacher') ? 'checked' : ''); ?> name="role_teacher"></td>
                    <td><input type="checkbox" <?php echo e($user->hasRole('Admin') ? 'checked' : ''); ?> name="role_admin"></td>
                    <?php echo e(csrf_field()); ?>

                    <td><button type="submit">Assign Roles</button></td>
                </form>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>