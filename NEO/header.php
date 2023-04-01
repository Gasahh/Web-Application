<header class="header">

   <div class="flex">

      <a href="#" class="logo">NEO</a>

      <nav class="navbar">
         <a href="index.hmtl">Account</a>
         <a href="index.hmtl">Home</a>
         <a href="index.hmtl">Contact</a>
         <a href="index.html">About</a>
         <a href="admin.php">add products</a>
         <a href="products.php">view products</a>
      </nav>

      <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

      <a href="cart.php" class="cart">cart <span><?php echo $row_count; ?></span> </a>

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>