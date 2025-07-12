<!-- MAIN -->
<main>
  <h1 class="title">GROWTH GROUP - (GG) LIST PAGE</h1>
  <ul class="breadcrumbs">
    <li><a href="javascript::void(0)">Home</a></li>
    <li class="divider">/</li>
    <li><a href="javascript::void(0)" class="active">Growth Group - (GG) List</a></li>
  </ul>
  <div class="info-data">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body text-end card-form">
            <div class="row">
              <div class="col-md-3">
                <div class="input-group">
                  <input type="text" id="txtSearchGGInformation" class="form-control search-info" placeholder="Search information..." aria-label="Search information..." aria-describedby="basic-search">
                  <span class="input-group-text" id="basic-search"><i class="bx bx-search"></i></span>
                </div>
              </div>
              <div class="col-md-9">
                <button type="button" class="btn btn-primary btn-md" onclick="addNewGrowthGroup();"><i class='bx bx-church'></i> Add Growth Group</button>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Growth Group Table
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
              <thead>
                <th>Growth Group ID</th>
                <th>Growth Group Name</th>
                <th>Growth Group Leader</th>
                <th>Schedule</th>
                <th>Actions</th>
              </thead>
              <tbody id="tblgrowthgroup">
                
              </tbody>
            </table>
          </div>
          <div class="card-footer">
            Number of Records: <span style="font-weight: 700;" id="cntTblGrowthGroups"></span>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>

<?php 
  include("modals/modalgrowthgroup.view.php");
  include("/../members/modals/modalmemberslist.view.php");
  include("scripts/growthgroup.script.php"); 
?>