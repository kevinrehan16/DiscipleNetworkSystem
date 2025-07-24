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
                <input type="hidden" id="memberIdLogs">
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
  const labelMap = {
    middlename: "Middle Name",
    nickname: "Nickname",
    baptizeddate: "Baptized Date",
    recForMembership: "Rec. For Membership",
    // Add more custom mappings as needed...
  };


  $(function(){
    // getAuditTrails();
  });

  function viewLogs(memberid){
    $("#memberIdLogs").val(memberid);
    getAuditTrails();
    $("#modalaudittrail").modal("show");
  }

  function getAuditTrails(){
    var logs = "";
    var memberIdLogs = $("#memberIdLogs").val();
    var auditInformation = '';

    $.ajax({
      type: 'POST',
      url: '<?=ROOT_PUBLIC?>/audittraillist/getAuditTrail',
      dataType: 'json',
      data: {
        memberIdLogs: memberIdLogs,
        auditInformation: auditInformation
      },
      beforeSend: function(){
        $("#tblmodalaudittrail").html("<tr><td colspan='5' class='text-center'>Loading Records...</td></tr>");
      },
      success: function(data){
        allLogs = data;
        // console.log(allLogs);

        allLogs = data;
        let allLogsLength = Array.isArray(allLogs) ? allLogs.length : 0;

        if(allLogsLength > 0){
          $.each(allLogs, function(index, log){
            const logOldObj = JSON.parse(log.old_data);
            let logDetailsHtml = "";
            for (let key in logOldObj) {
              var label = labelMap[key] || key;
              logDetailsHtml += `<span><span>${label}:</span> ${logOldObj[key]}</span><br>`;
            }

            const logNewObj = JSON.parse(log.new_data);
            let logNewDetailsHtml = "";
            for (let key in logNewObj) {
              var label = labelMap[key] || key;
              logNewDetailsHtml += `<span><span>${label}:</span> ${logNewObj[key]}</span><br>`;
            }

            logs += "<tr>"+
              "<td>"+logDetailsHtml+"</td>"+
              "<td>"+logNewDetailsHtml+"</td>"+
              "<td>"+log.changed_byName+"</td>"+
              "<td>"+log.action_type+"</td>"+
              "<td>"+log.change_timestamp+"</td>"+
            "</tr>";
          });
        }
        else{
          logs = "<tr><td class='text-center' colspan='9'>No Record Found</td></tr>";
        }

        $("#tblmodalaudittrail").html(logs);
      }
    })
  }

</script>