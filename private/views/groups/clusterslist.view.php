<!-- MAIN -->
<main>
  <h1 class="title">CLUSTERS LIST PAGE</h1>
  <ul class="breadcrumbs">
    <li><a href="javascript::void(0)">Home</a></li>
    <li class="divider">/</li>
    <li><a href="javascript::void(0)" class="active">Clusters List</a></li>
  </ul>
  <div class="info-data">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body text-end card-form">
            <button type="button" class="btn btn-primary btn-sm" onclick="addnewcluster();"><i class='bx bx-church'></i> Add Cluster</button>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Clusters Table
          </div>
          <div class="card-body">
            <div class="table-parent">
              <table class="table table-bordered table-striped table-hover fixTable">
                <thead>
                  <th>Cluster ID</th>
                  <th>Cluster Name</th>
                  <th>Cluster Leader</th>
                  <th>Actions</th>
                </thead>
                <tbody id="tblgroupcluster">
                  
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer">
            Number of Records: <span style="font-weight: 700;" id="cntGroupCluster"></span>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>

<?php 
  include("modals/modalgroupcluster.view.php");
  include("/../members/modals/modalmemberslist.view.php");
  include("scripts/groupcluster.script.php");
?>