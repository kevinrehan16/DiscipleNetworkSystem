<?php require_once(LAYOUT_HEADER); ?>

  <div class="container-fluid">
    <div class="p-5 mt-5 mx-auto mb-5 bg-light rounded" style="width: 100%; max-width: 340px; box-shadow: 6px 6px 10px rgba(0, 0, 0, 0.2);">
      <h6 class="text-center text-uppercase fw-bold text-primary">Disciple <span class="text-dark">Network System</span></h6>
      <br>
      <center>
        <img src="<?php echo SYSTEM_LOGO; ?>/logo.png" alt="School Logo" class="img-thumbnail rounded-circle w-75 h-75">
      </center>
      <br>
      <input type="email" class="form-control input-md mt-1" id="useremail" placeholder="Email" autofocus>
      <input type="password" class="form-control input-md mt-2" id="userpassword" placeholder="Password">
      <br>
      <a href="javascript:void(0);">Forgot password?</a>
      <br><br>
      <button class="btn btn-primary w-100" onclick="loginAccount();"><i class="bx bx-log-in-circle"></i> Login</button>
    </div>
  </div>

  <?php require_once(LAYOUT_FOOTER); ?>

  <script>
    $(function(){
      $('.form-control').on('keydown', function(event) {
        if (event.key === 'Enter' || event.keyCode === 13) {
          loginAccount();
        }
      });
    });

    function loginAccount(){
      var useremail = $("#useremail").val();
      var userpassword = $("#userpassword").val();

      $.ajax({
        type: 'POST',
        url: '<?=ROOT_PUBLIC?>/login/loginAccount',
        data: {
          useremail: useremail,
          userpassword: userpassword
        },
        success: function(data){
          if(data == "success"){
            window.location.href = "home";
          }else{
            Swal.fire({
              title: "Invalid username or password.",
              text: "Please kindly enter the correct username and password.",
              icon: "warning"
            });
          }
        }
      });
    }
  </script>