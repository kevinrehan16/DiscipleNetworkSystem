<!-- MAIN -->
<main>
  <h1 class="title">NEW MEMBERS</h1>
  <ul class="breadcrumbs">
    <li><a href="javascript::void(0)">Home</a></li>
    <li class="divider">/</li>
    <li><a href="javascript::void(0)" class="active">New Members</a></li>
  </ul>
  <div class="info-data">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body text-end card-form">
            <button type="button" class="btn btn-primary btn-sm" onclick="addnewmember();"><i class='bx bxs-user-plus'></i> Add Member</button>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            New Members List
          </div>
          <div class="card-body">
            <div class="table-parent">
              <table class="table table-bordered table-striped table-hover fixTable">
                <thead>
                  <th>Member ID</th>
                  <th>Full Name</th>
                  <th>Nickname</th>
                  <th>Gender</th>
                  <th>Life-Stage</th>
                  <th>Birthday</th>
                  <th>Email Address</th>
                </thead>
                <tbody>
                  <?php
                    if(isset($newmembers) && is_array($newmembers)){
                      foreach($newmembers as $newmember){
                        echo"
                          <tr>
                            <td>".$newmember->memberid."</td>
                            <td>".$newmember->firstname." ".$newmember->lastname."</td>
                            <td>".$newmember->nickname."</td>
                            <td>".$newmember->gender."</td>
                            <td>".$newmember->lifestage."</td>
                            <td>".date('Y-m-d', strtotime($newmember->birthday))."</td>
                            <td>".$newmember->emailaddress."</td>
                          </tr>
                        ";
                      }
                    }
                  ?>
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
  include("modalmemberinformation.view.php");
  include("modalsatelliteslist.view.php");
  include("members.script.php"); 
?>