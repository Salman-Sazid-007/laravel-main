<?php $__env->startSection('page-content'); ?>

    
    <h1 >Book Details</h1>

    <table class="table table-striped">
            <tr>
                <th>ID</th>
                <td><?php echo e($book ->id); ?></td>
            </tr>
            <tr>
                <th>Title</th>
                <td><?php echo e($book ->title); ?></td>
            </tr>
            <tr>
                <th>Author</th>
                <td><?php echo e($book ->author); ?></td>
            </tr>
            <tr>
                <th>ISBN</th>
                <td><?php echo e($book ->isbn); ?></td>
            </tr>
            <tr>
                <th>Price</th>
                <td><?php echo e($book ->price); ?></td>
            </tr>
            <tr>
                <th>Stock</th>
                <td><?php echo e($book ->stock); ?></td>
            </tr>
            
          
    </table>
    <tr><td>
        <a class="btn btn-danger" href="<?php echo e(route('books.edit', $book->id)); ?>">Edit</a>
        </td>
    </tr>
    <p>
        <a href="<?php echo e(route('books.index')); ?>" class="btn btn-primary">Book List</a>
    </p>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cse4222_g3-main\resources\views/books/show.blade.php ENDPATH**/ ?>