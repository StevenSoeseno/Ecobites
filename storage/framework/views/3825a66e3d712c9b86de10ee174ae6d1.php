<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Homepage</title>

  <!-- CSS -->
  <link rel="stylesheet" href="/welcome.css">

  <!-- Font Prompt -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<body>
  <div class="container-fluid">

      <!-- Navbar HTML -->
      <nav class="navBar">
          <div class="logoEcobite">
              <img src="./images/Logo.png" alt="">
          </div>

          <?php if(auth()->guard()->guest()): ?>
          <div class="navLinks">
            <a href="/"><b>Home</b></a>
            <a href="<?php echo e(route('register')); ?>">Register</a>
            <a href="<?php echo e(route('login')); ?>"><button>Login</button></a>
            </div> 
        <?php else: ?> 
            <div class="navLinks">
                <a href="/"><b>Home</b></a>
                <a href="/cartPage">Cart[<?php echo e($totalQuantity); ?>]</a>
                <a href="">Log Out</a>
            </div>   
          <?php endif; ?>
      </nav>

      <!-- Landing page HTML -->
      <div class="landingPageContainer">
          <div class="landingPageText">
              <h1 id="EveryBite">Every Bite</h1>
              <h1 id="Counts">Counts</h1>
          </div>
          <div class="landingPageImage">
              <img src="/assets/Landing Page Image.png" alt="">
          </div>
      </div>

      <!-- Menu Navbar HTML -->
      <div class="menuNavBarContainer">
          <div class="categories">
              <h1 id="Food">Food</h1>
              <h1 id="Drinks">Drinks</h1>
          </div>
      </div>

      <!-- Main course HTML -->
      <div class="mainCourseContainer">
          <div class="mainCourseText">
              <h2>Main Course</h2>
          </div>
          <!-- Menu untuk food -->
          <div class="FoodCourseMenu">
              <?php $__empty_1 = true; $__currentLoopData = $foodMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="mainCourseCard">
                    <div class="image">
                        <img src="<?php echo e(asset('storage/' .$m->FotoFoodMain)); ?>" alt="<?php echo e($m->FotoFoodMain); ?>">
                    </div>
                    <div class="keterangan">
                        <h1 class="foodTitle"><?php echo e($m->NamaFoodMain); ?></h1>
                        <h2 class="originalPrice"><del>Rp. <?php echo e(number_format($m->HargaOriFoodMain)); ?></del></h2>
                        <h2 class="discountPrice">Rp. <?php echo e(number_format($m->HargaOriFoodMain/2)); ?></h2>
                        <form action="<?php echo e(url('addcart', $m->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="buttonContainer">
                                <input type="number" value="1" min="1" class="form-control" name="cartQuantity" id="cartQuantity">
                                <input type="submit" value="Add To Cart" class="addButton">
                            </div>
                        </form>
                    </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p><?php echo e('No product added'); ?></p>
              <?php endif; ?>

          </div>
          
          <!-- Menu untuk minuman -->
          <div class="DrinkCourseMenu">
            <?php $__empty_1 = true; $__currentLoopData = $drinkMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="mainCourseCard">
                    <div class="image">
                        <img src="storage/<?php echo e($d->FotoFoodMain); ?>" alt="<?php echo e($d->FotoFoodMain); ?>">
                    </div>
                    <div class="keterangan">
                        <h1 class="drinkTitle"><?php echo e($d->NamaFoodMain); ?></h1>
                        <h2 class="originalPrice"><del><?php echo e($d->HargaOriFoodMain); ?></del></h2>
                        <h2 class="discountPrice">Rp. <?php echo e(($d->HargaOriFoodMain)/2); ?></h2>
                        <form action="<?php echo e(url('addcart', $m->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="buttonContainer">
                                <input type="number" value="1" min="1" class="form-control" name="cartQuantity" id="cartQuantity">
                                <input type="submit" value="Add To Cart" class="addButton">
                            </div>
                        </form>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p><?php echo e('No product added'); ?></p>
            <?php endif; ?>
          </div> 
      </div>

      <!-- Side Course HTML -->
      <div class="SideCourseContainer">
          <div class="sideCourseText">
              <h2>Side Course</h2>
          </div>
          <div class="sideCourseMenu">
            <?php $__empty_1 = true; $__currentLoopData = $sideDishMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="sideCourseCard">
                    <div class="image">
                        <img src="storage/<?php echo e($s->FotoFoodMain); ?>" alt="<?php echo e($s->FotoFoodMain); ?>">
                    </div>
                    <div class="keterangan">
                        <h1 class="foodTitle"><?php echo e($s->NamaFoodMain); ?></h1>
                        <h2 class="originalPrice"><del><?php echo e($s->HargaOriFoodMain); ?></del></h2>
                        <h2 class="discountPrice">Rp. <?php echo e(($s->HargaOriFoodMain)/2); ?></h2>
                        <form action="<?php echo e(url('addcart', $m->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="buttonContainer">
                                <input type="number" value="1" min="1" class="form-control" name="cartQuantity" id="cartQuantity">
                                <input type="submit" value="Add To Cart" class="addButton">
                            </div>
                        </form>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p><?php echo e('No product added'); ?></p>
            <?php endif; ?>
          </div>
      </div>
      
  <script src="/welcome.js"></script>
  </div>
  
</body>
</html><?php /**PATH C:\Users\steve\Downloads\ecobites\MVP-TechTitan-page-FinalSubmit\resources\views/welcome.blade.php ENDPATH**/ ?>