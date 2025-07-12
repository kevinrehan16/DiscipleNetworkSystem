<div id="modalaudittrail" class="modal fade" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <!-- <form action="churchList/add" method="POST"> -->
        <div class="modal-header">
          <h5 class="modal-title">AUDIT TRAIL</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container pt-3">
            <div class="row">
              <div class="col-md-12">
                <div class="table-parent">
                  <table class="table table-bordered table-hover table-striped fixTable">
                    <thead>
                      <tr>
                        <th width="22%">Old Information</th>
                        <th width="22%">New Information</th>
                        <th width="20%">Change By</th>
                        <th width="16%">Action</th>
                        <th width="20%">Date & Time</th>
                      </tr>
                    </thead>
                    <tbody id="tblmodalaudittrail">
                      <!-- Append here... -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class='bx bx-x'></i> Close</button>
        </div>
      </div>
    <!-- </form> -->
  </div>
</div>

<script>
  var allLogs = [];

  $(function(){
    getAuditTrails();
  });

  function getAuditTrails(){
    var auditInformation = '';

    $.ajax({
      type: 'POST',
      url: '<?=ROOT_PUBLIC?>/audittraillist/getAuditTrail',
      dataType: 'json',
      data: {
        auditInformation: auditInformation
      },
      success: function(data){
        allLogs = data;
        console.log(allLogs);
        
        var logs = "";
        data.forEach(log => {
          logs += "<tr>"+
            "<td>"+log.old_data.substr(0, 10)+"</td>"+
            "<td>"+log.new_data.substr(0, 10)+"</td>"+
            "<td>"+log.changed_byName+"</td>"+
            "<td>"+log.action_type+"</td>"+
            "<td>"+log.change_timestamp+"</td>"+
          "</tr>";
        });

        $("#tblmodalaudittrail").html(logs);
      }
    })
  }

</script>