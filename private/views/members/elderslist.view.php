<!-- MAIN -->
<main>
  <h1 class="title">BOARD OF ELDERS</h1>
  <ul class="breadcrumbs">
    <li><a href="javascript::void(0)">Home</a></li>
    <li class="divider">/</li>
    <li><a href="javascript::void(0)" class="active">Elders</a></li>
  </ul>
  <div class="info-data">
    <div class="row">
      <div class="col-md-12">
        <div class="card pt-2 px-2 text-end">
          <!-- <div class="card-body"> -->
            <div class="row">
              <div class="col-md-3">
                <div class="input-group">
                  <input type="text" id="txtsearcheldersinfo" class="form-control search-info" placeholder="Search information..." aria-label="Search information..." aria-describedby="basic-search">
                  <span class="input-group-text" id="basic-search"><i class="bx bx-search"></i></span>
                </div>
              </div>
              <div class="col-md-9">
                <button type="button" class="btn btn-primary btn-md mt-1" onclick="addnewelders();"><i class='bx bxs-user-plus'></i> Add Elder</button>
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
            Elders List
          </div>
          <div class="card-body">
            <div class="table-parent">
              <table class="table table-bordered table-striped table-hover fixTable">
                <thead>
                  <th style="width: 5%;">Status</th>
                  <th>Member ID</th>
                  <th>Nickname</th>
                  <th>Full Name</th>
                  <th>Life-Stage</th>
                  <th>Birthday</th>
                  <th>Email Address</th>
                  <th>Actions</th>
                </thead>
                <tbody id="tblelderslist">
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>

<?php 
  // include("/modals/modalelderssinformation.view.php");
  include("/modals/modalmemberslist.view.php");
  // include("/modals/modalsatelliteslist.view.php");
  // // include("modalsatelliteslist.view.php");
  include("/scripts/elders.script.php");
?>