<!-- MAIN -->
<main>
  <h1 class="title">CLUSTER MEMBERS PAGE</h1>
  <ul class="breadcrumbs">
    <li><a href="javascript::void(0)">Home</a></li>
    <li class="divider">/</li>
    <li><a href="javascript::void(0)" class="active">Cluster Members List</a></li>
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
            Cluster Members Table
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
              <thead>
                <th>Cluster Name</th>
                <th>Cluster Leader</th>
                <th>Cluster Members</th>
                <th>Actions</th>
              </thead>
              <tbody id="tblclustermembers">
                <?php
                // echo "<pre>";
                // print_r($clusters);
                // if(isset($clusters) && is_array($clusters)){
                //   foreach($clusters as $key => $cluster){
                //     echo "
                //       <tr>
                //         <td>".$cluster->clustername."</td>
                //         <td>".$cluster->clusterleaderid."</td>
                //         <td></td>
                //         </td>
                //         <td></td>
                //       </tr>
                //     ";
                //   }
                // }
                ?>
              </tbody>
            </table>
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
  include("clustermembers.script.php"); 
?>