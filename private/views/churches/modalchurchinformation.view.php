<div id="modalchurchinformation" class="modal fade" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <!-- <form action="churchList/add" method="POST"> -->
        <div class="modal-header">
          <h5 class="modal-title">ADD NEW CHURCH</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container pt-3">
            <div class="row">
              <div class="col-md-12 text-center">
                <div class="row">
                  <div class="col-md-12">
                    <div class="circle">
                      <img id="imagefileInput" src="https://www.caspianpolicy.org/no-image.png" class="rounded-circle img-fluid img-thumbnail" alt="Church photo">
                    </div>
                    <div class="container mt-1">
                      <input type="file" id="fileInput" name="fileInput" onchange="showimg();" class="custom-file-input">
                      <label for="fileInput" class="custom-file-button"><i class='bx bx-paperclip'></i> Choose logo</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-9">
                <div class="row">
                  <div class="mb-3">
                    <label for="churchname" class="form-label">Church Name</label>
                    <input type="text" class="form-control form-control-md txt_firstCapital letteronly" id="churchname" name="churchname">
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="row">
                  <div class="mb-3">
                    <label for="shortname" class="form-label">Short Name</label>
                    <input type="text" class="form-control form-control-md txt_firstCapital letteronly" placeholder="Ex. CCF" id="shortname" name="shortname" maxlength="5">
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-12">
                <div class="text-end">
                  <button class="btn btn-md btn-info text-end mb-2" onclick="openModal('modalsatelliteinformation');"><i class="bx bx-buildings"></i> Add Worship Place</button>
                </div>
                <table class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr>
                      <th>Worship Place</th>
                      <th>Area Pastor</th>
                      <th>Schedule</th>
                      <th>Location</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="tblSatellites">
                    <!-- Append here... -->
                  </tbody>
                </table>
              </div>
            </div>

          </div>          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="savenewchurch();"><i class='bx bx-save'></i> Save</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class='bx bx-x'></i> Close</button>
        </div>
      </div>
    <!-- </form> -->
  </div>
</div>