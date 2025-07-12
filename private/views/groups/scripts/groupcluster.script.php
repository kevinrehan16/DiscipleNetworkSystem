<script>
  var members = [];
  var groupclusters = [];

  $(function(){
    getmemberslist();
    getgroupclusterlist();

    $(".fixTable").tableHeadFixer();

    $('#txtSearchInformation').keyup(function(event){
      var keycode = (event.keyCode ? event.keyCode : event.which);
      if(keycode == '13'){
          getmemberslist();
      }else if(keycode == '8'){
          getmemberslist();
      }
    });
  });

  function getgroupclusterlist(){
    var dataRecord = "";
    var txtSearchInformation = $("#txtSearchInformation").val();

    $.ajax({
      type: 'POST',
      url: '<?=ROOT_PUBLIC?>/clustersgroup/getgroupcluster',
      dataType: 'json',
      data: {
        joinTable: 'members',
        txtSearchInformation: txtSearchInformation
      },
      beforeSend: function(){
        $("#tblgroupcluster").html("<tr><td class='text-center' colspan='4'>Loading Records...</td></tr>");
      },
      success: function(data){
        // console.log(data);

        groupclusters = data;

        let groupclustersLength = Array.isArray(groupclusters) ? groupclusters.length : 0;
        $("#cntGroupCluster").text(groupclustersLength);

        if(groupclustersLength > 0){
          $.each(data, function(index, cluster){
            // console.log(cluster);"+

            $memPicture = '';
            if(cluster.picture != ""){
              $memPicture = "<?=ROOT_PRIVATE?>/views/memberimage/"+cluster.memberid+"/"+cluster.picture+"";
            }
            else{
              // Placeholder image with the letter
              $memPicture = "https://ui-avatars.com/api/?name="+cluster.firstname+"+"+cluster.lastname; 
            }
  
            // const memberFullName = members.filter(member => member.memberid === cluster.clusterleaderid);
            dataRecord += "<tr>"+
                          "<td>"+ cluster.clusterid +"</td>"+
                          "<td>"+ cluster.clustername +"</td>"+
                          "<td><img src='"+$memPicture+"' alt='Image 1'> &nbsp;"+ cluster.firstname +" "+ cluster.lastname +"</td>"+
                          "</td>"+
                          "<td></td>"+
                        "</tr>";
          });
        }else{
          dataRecord = "<tr><td class='text-center' colspan='4'>No Record Found...</td></tr>"
        }

        $("#tblgroupcluster").html(dataRecord);
      }
    });
  }

  function addnewcluster(){
    openModal("modalgroupcluster");
  }

  function cancelgroupcluster(){
    closeModal("modalgroupcluster");
    $("#modalgroupcluster .form-control").val('');
  }

  function selectLeader(){
    openModal("modalmemberslist");
  }

  function getmemberslist(){
    var dataRecord = "";
    var txtSearchInformation = $("#txtSearchInformation").val();

    $.ajax({
      type: 'POST',
      url: '<?=ROOT_PUBLIC?>/memberlist/getmembers',
      dataType: 'json', 
      data: {
        txtSearchInformation: txtSearchInformation
      },
      success: function(data){
        // console.log(data);

        members = data;

        $.each(data, function(index, memberInfo){
          // console.log(memberInfo);
          dataRecord += "<tr>"+
                          "<td>"+memberInfo.firstname+" "+memberInfo.lastname+"</td>"+
                          "<td>"+memberInfo.emailaddress+"</td>"+
                          "<td>"+memberInfo.mobilenumber+"</td>"+
                          "<td>"+
                            "<button class='btn btn-sm btn-flat btn-info' onclick='selectMember("+index+");'><i class='bx bx-check'></i></button>"+
                          "</td>"+
                        "</tr>";
        });

        $("#tblmodalmemberslist").html(dataRecord);
      }
    });
  }

  function selectMember(index){
    $("#txtleaderid").val(members[index].memberid);
    $("#txtclusterleader").val(members[index].firstname + " " + members[index].lastname);

    closeModal("modalmemberslist");
  }

  function savegroupcluster(){
    var txtclustername = $("#txtclustername").val();
    var txtclusterleader = $("#txtclusterleader").val();
    var txtleaderid = $("#txtleaderid").val();
    const defaultID = members.filter(member => member.memberid === txtleaderid);

    $.ajax({
      type: 'POST',
      url: '<?=ROOT_PUBLIC?>/clustersgroup/savegroupcluster',
      data: {
        defaultID: defaultID[0].id,
        txtclustername: txtclustername,
        txtleaderid: txtleaderid
      },
      success: function(data){
        console.log(data);
        Swal.fire({
          title: "New Cluster",
          text: txtclustername+ ", leader "+ txtclusterleader +" has been added successfully.",
          icon: "success"
        });
      },
      complete: function(){
        cancelgroupcluster();
        getgroupclusterlist();
      }
    });
  }
</script>