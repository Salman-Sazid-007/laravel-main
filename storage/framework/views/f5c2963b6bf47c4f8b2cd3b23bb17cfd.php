<?php $__env->startSection('title'); ?>
Home 
<?php $__env->stopSection(); ?>



<?php $__env->startSection('page-content'); ?>


    <div class="row mt-2">
        <div class = "col-lg-10">
            <form method="get" action="<?php echo e(route('books.index')); ?>">
                <div class="row g-3">
                    <div class="col-8">
                      <input type="text" class="form-control" name="search" placeholder="Search" value="<?php echo e(request('search')); ?>">
                    </div>
                    <div class="col">
                      <button type="text" class="btn btn-success"> <i class="bi bi-search"></i> Search</button>
                    </div>
                  </div>

           </form>
        </div>

        <div class = "col-lg-2">
            <p class = "text-end">
                <a href="<?php echo e(route('books.create')); ?>" class = "btn btn-primary"><i class="bi bi-file-earmark-plus"></i> New Book</a>
            </p>
        </div>
    </div>

    <h1 >Book List</h1>
    <table class="table table-striped" >
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>

            <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($book->id); ?></td>
                <td><?php echo e($book->title); ?></td>
                <td><?php echo e($book->author); ?></td>
                <td><?php echo e($book->price); ?></td>
                <td><?php echo e($book->stock); ?></td>
                <td> 
                    <a class="btn btn-info" href = "<?php echo e(route('books.show',$book->id)); ?>"> <i class="bi bi-info-circle"></i> View</a>
                    <a class="btn btn-warning" href = "<?php echo e(route('books.edit',$book->id)); ?>"> <i class="bi bi-pencil-square"></i> Edit</a>
                    <form class= "d-inline-block" method="post" action="<?php echo e(route('books.destroy')); ?>"  onsubmit="return confirm('Are you sure?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <input type="hidden" name="id" value="<?php echo e($book->id); ?>">
                        <input type="submit" value="Delete" class="btn btn-danger" >
                    </form>
                </td>
            </tr>
                
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <?php echo e($books->links()); ?>


    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cse4222_g3-main\resources\views/books/index.blade.php ENDPATH**/ ?>