<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>

  
  <script src="https://kit.fontawesome.com/c07884273f.js" crossorigin="anonymous"></script>

  <!-- Connect CSS -->
  <link rel="stylesheet" href="/addMenu.css">
</head>
<body>
    <div class="container-fluid">
        <div class="adminTitle">
            <h1>Admin Dashboard</h1>
        </div>
        <hr>
        <a href="/"><h2><i class="fa-solid fa-arrow-left"></i>Home</h2></a>

      <!-- Table HTML -->
        <div class="tableContainer">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Harga</th>
                        <th>Availability</th>
                        <th>Action</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($m->IDFoodMain); ?></td>
                        <td><?php echo e($m->NamaFoodMain); ?></td>
                        <td><?php echo e($m->JenisFoodMain); ?></td>
                        <td><?php echo e($m->HargaOriFoodMain); ?></td>
                        <td><?php echo e($m->QuantityFoodMain); ?></td>
                        <td><a href="/edit-menu/<?php echo e($m->id); ?>"><button class="editBtn">Edit</button></a></td>
                        <td><form action="/delete-menu/<?php echo e($m->id); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <button class="deleteBtn" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p>No Items Added Just Yet</p>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Add new Menu HTML -->
        <div class="addMenuContainer">
            <button id="addMenuBtn">Add Menu</button>
        </div>

        <!-- Popup to edit, and add menu HTML -->
        <form action="/store-menu" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
            <div class="popUpContainer" id="popUpContainer">
                <div class="popUpTitle">
                    <h1>Add Menu</h1>
                </div>

                
                <div id="IDContainer" class="contentContainer">
                    <label for="IDFoodMain">ID</label>
                    <input id="IDFoodMain" type="text" value="<?php echo e(old('IDFoodMain')); ?>" name="IDFoodMain">
                    <?php $__errorArgs = ['IDFoodMain'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="error-message"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div id="NamaMakananContainer" class="contentContainer">
                    <label for="NamaFoodMain">Nama</label>
                    <input id="NamaFoodMain" type="text" value="<?php echo e(old('NamaFoodMain')); ?>" name="NamaFoodMain" >
                    <?php $__errorArgs = ['NamaFoodMain'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="error-message"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div id="JenisContainer" class="contentContainer">
                    <label for="JenisFoodMain">Jenis</label>
                    
                    <select name="" id="dropDown">
                        <option value="Food">Food</option>
                        <option value="Drinks">Drinks</option>
                        <option value="Side Dish">Side Dish</option>
                    </select>
                    <input id="JenisFoodMain" type="text" value="<?php echo e(old('JenisFoodMain')); ?>" name="JenisFoodMain">
                    <?php $__errorArgs = ['JenisFoodMain'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="error-message"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div id="HargaContainer" class="contentContainer">
                    <label for="HargaOriFoodMain">Harga</label>
                    <input id="HargaOriFoodMain" type="text" value="<?php echo e(old('HargaOriFoodMain')); ?>" name="HargaOriFoodMain">
                    <?php $__errorArgs = ['HargaOriFoodMain'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="error-message"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div id="FotoContainer" class="contentContainer">
                    <label for="">Foto</label>
                    <label for="FotoFoodMain"><button class="uploadBtn">Upload</button></label>
                    <input id="FotoFoodMain" type="file" value="<?php echo e(old('FotoFoodMain')); ?>" name="FotoFoodMain">
                    <?php $__errorArgs = ['FotoFoodMain'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="error-message"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div id="DeskripsiContainer" class="contentContainer">
                    <label for="DeskripsiFoodMain">Deskripsi</label>
                    <input id="DeskripsiFoodMain" type="text" value="<?php echo e(old('DeskripsiFoodMain')); ?>" name="DeskripsiFoodMain">
                    <?php $__errorArgs = ['DeskripsiFoodMain'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="error-message"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div id="QuantityContainer" class="contentContainer">
                    <label for="">Quantity</label>
                    <div class="quantityContent">
                        <button class="minusBtn">-</button>
                        <p class="quantity">1</p>
                        <button class="plusBtn">+</button>
                        <input type="text" id="QuantityFoodMain" value="<?php echo e(old('QuantityFoodMain')); ?>" name="QuantityFoodMain">
                    </div>
                </div>

                
                <div id="SaveContainer" class="contentContainer">
                    <button type="submit" class="saveBtn">Save</button>
                </div>
            </div>
        </form>

        
        <div class="darkOverlay"></div>

        <!-- link to javascript -->
        <script src="/addMenu.js"></script>
    </div>
</body>
</html><?php /**PATH C:\Users\steve\Downloads\MVP-TechTitan-page-FinalSubmit\MVP-TechTitan-page-FinalSubmit\resources\views/addMenu.blade.php ENDPATH**/ ?>