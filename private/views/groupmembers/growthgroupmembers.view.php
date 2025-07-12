<!-- MAIN -->
<main>
  <h1 class="title">GROWTHGROUP MEMBERS PAGE</h1>
  <ul class="breadcrumbs">
    <li><a href="javascript::void(0)">Home</a></li>
    <li class="divider">/</li>
    <li><a href="javascript::void(0)" class="active">GrowthGroup Members List</a></li>
  </ul>
  <div class="info-data">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <!-- <div class="card-body text-end card-form">
            <button type="button" class="btn btn-primary btn-sm" onclick="addnewcluster();"><i class='bx bx-church'></i> Add Cluster</button>
          </div> -->
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Growth-Group Members Table
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
              <thead>
                <th>Growth-Group Name</th>
                <th>Growth-Group Leader</th>
                <th>Growth-Group Members</th>
                <th>Actions</th>
              </thead>
              <tbody id="tblgrowthgroupmembers">
                
              </tbody>
            </table>
          </div>
          <div class="card-footer">
            Number of Records: <span style="font-weight: 700;" id="cntGrowthGroups">0</span>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>

<?php 
  include("modalclustermembers.view.php");
  include("/../members/modals/modalmemberslist.view.php");
  // include("modalsatelliteinformation.view.php");
  include("growthgroupmembers.script.php"); 
?>