<!-- MAIN -->
<main>
  <h1 class="title">USER ACCOUNTS PAGE</h1>
  <ul class="breadcrumbs">
    <li><a href="javascript::void(0)">Home</a></li>
    <li class="divider">/</li>
    <li><a href="javascript::void(0)" class="active">User Accounts List</a></li>
  </ul>
  <div class="info-data">
    <div class="row">
      <div class="col-md-12">
        <div class="card pt-2 px-2 text-end">
          <!-- <div class="card-body"> -->
            <div class="row">
              <div class="col-md-3">
                <div class="input-group">
                  <input type="text" id="txtsearchusersaccountsinfo" class="form-control search-info" placeholder="Search information..." aria-label="Search information..." aria-describedby="basic-search">
                  <span class="input-group-text" id="basic-search"><i class="bx bx-search"></i></span>
                </div>
              </div>
              <div class="col-md-9">
                <button type="button" class="btn btn-primary btn-md" onclick="addnewuseracount();"><i class='bx bxs-user-plus'></i> Add User Account</button>
              </div>
            </div>
          <!-- </div> -->
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            User Accounts Table
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
              <thead>
                <th>User ID</th>
                <th>Member Name</th>
                <th>Username</th>
                <th>Actions</th>
              </thead>
              <tbody id="tblusersaccounts">
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>

<?php 
  include("modals/modalusersaccounts.view.php");
  include("/../members/modals/modalmemberslist.view.php");
  // include("modalsatelliteinformation.view.php");
  include("scripts/usersaccounts.script.php"); 
?>