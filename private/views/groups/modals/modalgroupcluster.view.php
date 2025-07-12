<div id="modalgroupcluster" class="modal fade" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <!-- <form action="churchList/add" method="POST"> -->
        <div class="modal-header">
          <h5 class="modal-title">NEW CLUSTER</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container pt-3">
            <div class="row mb-2">
              <div class="col-md-12">
                <label>Cluster Name</label>
                <input type="text" class="form-control input-md form-control-md txt_firstCapital" id="txtclustername">
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-12">
                <label>Cluster Leader</label>
                <input type="text" class="form-control input-md form-control-md" id="txtclusterleader" onclick="selectLeader();" readonly style="cursor: pointer;">
                <input type="text" class="form-control input-md form-control-md d-none" id="txtleaderid" disabled>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-md btn-success" onclick="savegroupcluster();"><i class='bx bx-save'></i> Save</button>
          <button type="button" class="btn btn-md btn-danger" onclick="cancelgroupcluster();" data-bs-dismiss="modal"><i class='bx bx-x'></i> Close</button>
        </div>
      </div>
    <!-- </form> -->
  </div>
</div>