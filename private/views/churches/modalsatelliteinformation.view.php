<div id="modalsatelliteinformation" class="modal fade" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <!-- <form action="churchList/add" method="POST"> -->
        <div class="modal-header">
          <h5 class="modal-title">ADD WORSHIP PLACE</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modalsatelliteform">
          <div class="container pt-3">
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="mb-3">
                    <label for="satellitename" class="form-label">Worship Place <span class='text-danger'>*</span></label>
                    <input type="text" class="form-field form-control form-control-md txt_firstCapital letteronly" id="satellitename" name="satellitename">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="mb-3">
                    <label for="areapastor" class="form-label">Area Pastor <span class='text-danger'>*</span></label>
                    <input type="text" class="form-field form-control form-control-md txt_firstCapital letteronly" id="areapastor" name="areapastor" style="cursor: pointer;">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="mb-3">
                    <label for="worshipday" class="form-label">Worship Day</label>
                    <select class="form-field form-select input-sm" name="worshipday" id="worshipday">
                      <option value="">--Select day--</option>
                      <option value="Sunday">Sunday</option>
                      <option value="Monday">Monday</option>
                      <option value="Tuesday">Tuesday</option>
                      <option value="Wednesday">Wednesday</option>
                      <option value="Thursday">Thursday</option>
                      <option value="Friday">Friday</option>
                      <option value="Saturday">Saturday</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="mb-3">
                    <label for="worshiptime" class="form-label">Worship Time</label>
                    <input type="time" class="form-field form-control form-control-md" id="worshiptime" name="worshiptime">
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="mb-3">
                    <label for="satellitelocation" class="form-label">Location</label>
                    <textarea class="form-field form-control" cols="5" rows="5" name="satellitelocation" id="satellitelocation"></textarea>
                  </div>
                </div>
              </div>
            </div>

          </div>          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="addnewsatellite();"><i class='bx bx-save'></i> Save</button>
          <button type="button" class="btn btn-danger" onclick="closeModal('modalsatelliteinformation');"><i class='bx bx-x'></i> Close</button>
        </div>
      </div>
    <!-- </form> -->
  </div>
</div>