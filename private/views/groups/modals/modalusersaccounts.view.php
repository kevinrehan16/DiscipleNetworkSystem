<div id="modalusersaccounts" class="modal fade" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
        <!-- <form action="churchList/add" method="POST"> -->
        <div class="modal-header">
          <h5 class="modal-title">NEW USER ACCOUNT</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container pt-3">
            <div class="row mb-3">
              <div class="col-md-12">
                <label>Member Name</label>
                <div class="input-group" style="cursor: pointer;" onclick="viewMembers();">
                <input type="text" class="form-control input-md form-control-md txt_firstCapital" id="txtuseraccname" style="cursor: pointer;" readonly>
                  <span class="input-group-text" id="basic-search"><i class="bx bx-search"></i></span>
                </div>
                
                <input type="text" class="form-control input-md form-control-md d-none" id="txtuseraccountid" disabled>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-12">
                <label>Email Address</label>
                <input type="text" class="form-control input-md form-control-md txt_firstCapital" id="txtuseremail" readonly disabled>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-12">
                <label>Temporary Password</label>
                <input type="text" class="form-control input-md form-control-md" id="txtuseracctemppass" readonly disabled>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-md btn-success" onclick="saveuseraccount();"><i class='bx bx-save'></i> Save</button>
          <button type="button" class="btn btn-md btn-danger" onclick="canceluseraccount();" data-bs-dismiss="modal"><i class='bx bx-x'></i> Close</button>
        </div>
      </div>
    <!-- </form> -->
  </div>
</div>