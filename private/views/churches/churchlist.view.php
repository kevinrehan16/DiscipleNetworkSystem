<!-- MAIN -->
<main>
  <h1 class="title">CHURCH LIST PAGE</h1>
  <ul class="breadcrumbs">
    <li><a href="javascript::void(0)">Home</a></li>
    <li class="divider">/</li>
    <li><a href="javascript::void(0)" class="active">Church List</a></li>
  </ul>
  <div class="info-data">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body text-end card-form">
            <button type="button" class="btn btn-primary btn-sm" onclick="addnewchurch();"><i class='bx bx-church'></i> Add Church</button>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Church Table
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
              <thead>
                <th>Church ID</th>
                <th>Church Name</th>
                <th>Worship Place</th>
                <th>Actions</th>
              </thead>
              <tbody>
                <?php
                // echo "<pre>";
                // print_r($churches[2]['satellites']);
                if(isset($churches) && is_array($churches)){
                  foreach($churches as $key => $church){
                    echo "
                      <tr>
                        <td>".$church['churchid']."</td>
                        <td>".$church['churchname']."</td>
                        <td>";
                          $satellites = "";
                          echo "<pre>";
                            // print_r($church['satellites']);
                            if(!empty($church['satellites'])){
                              foreach($church['satellites'] as $key => $satellite){
                                echo "<span class='bx bxs-church mb-2'></span> <a class='table-text-link' href='javascript:void(0);' onclick='openModal(\"modalsatelliteinformation\");'>". $satellite['satellitesname'] . " </a><br>";
                              }
                            }else{
                              $satellites = "";
                            }

                          echo $satellites;
                    echo "</td>
                        <td></td>
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

</main>

<?php 
  include("modalchurchinformation.view.php");
  include("modalsatelliteinformation.view.php");
  include("churches.script.php"); 
?>