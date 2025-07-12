<?php require_once(LAYOUT_HEADER); ?>  <!-- I JUST CALL THE FUNCTION OF VIEWING INSTEAD OF USING REQUIRE OR INCLUDE IN PHP -->

  <div class="container-fluid">
    <div class="p-5 mt-5 mx-auto p-3 mb-5 bg-light rounded" style="width: 100%; max-width: 340px; box-shadow: 6px 6px 10px rgba(0, 0, 0, 0.2);">
      <h6 class="text-center text-uppercase">School Management System</h6>
      <div class="text-center">
        <img src="https://png.pngtree.com/png-clipart/20200710/original/pngtree-books-logo-png-image_4135987.jpg" alt="School Logo" class="img-thumbnail rounded-circle h-50 w-50">
      </div>
      <?php 
        echo "<pre>"; 
        print_r($rows); 
      ?>
      <h5 class="pt-3">ADD NEW USER</h5>
      <input type="text" class="form-control input-md mt-1" name="firstname" placeholder="First Name" autofocus>
      <input type="text" class="form-control input-md mt-2" name="lastname" placeholder="Last Name">
      <select name="gender" class="form-control input-md mt-2">
        <option value="">--Select a Gender--</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
      </select>
      <select name="rank" class="form-control input-md mt-2">
        <option value="">--Select a Life Stage--</option>
        <option value="single">Single</option>
        <option value="married">Married</option>
        <option value="widowed">Widowed</option>
        <option value="separate">Separate</option>
        <option value="live_in">Live-In</option>
      </select>
      <input type="text" class="form-control input-md mt-2" name="email" placeholder="Email">
      <input type="text" class="form-control input-md mt-2" name="password" placeholder="Password">
      <input type="text" class="form-control input-md mt-2" name="password2" placeholder="Confirm Password">
      <br>
      <div class="text-right">
        <button class="btn btn-danger">Cancel</button>
        <button class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>


  <?php require_once(LAYOUT_FOOTER); ?> <!-- I JUST CALL THE FUNCTION OF VIEWING INSTEAD OF USING REQUIRE OR INCLUDE IN PHP -->