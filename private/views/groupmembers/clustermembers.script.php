<script>
  var members = [];
  var clustermembersarray = [];
  var colors = ['#FF5733', '#33FF57', '#3357FF', '#F1C40F', '#8E44AD', '#E74C3C', '#3498DB', '#2ECC71'];

  $(function(){
    clustermembers();
    getmemberslist();

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

  // Function to shuffle the colors array
  function shuffleColors(colors) {
      for (let i = colors.length - 1; i > 0; i--) {
          const j = Math.floor(Math.random() * (i + 1));
          [colors[i], colors[j]] = [colors[j], colors[i]]; // Swap
      }
      return colors;
  }

  function clustermembers(){
    var clustermembers = "";
    $.ajax({
      type: 'POST',
      url: '<?=ROOT_PUBLIC?>/ClusterMembers/getClusterMembers',
      dataType: 'json',
      data: {
        joinTable: 'members'
      },
      success: function(data){
        for(cnt in data){
          // console.log(data);
          var shuffledColors = shuffleColors([...colors]);

          clustermembersarray = data;

          var members = "";
          for(cntN in data[cnt].memberid){
            var randomColor = shuffledColors[cntN % shuffledColors.length];
            var name = data[cnt].memberid[cntN].firstname;
            var fullname = data[cnt].memberid[cntN].firstname + " " + data[cnt].memberid[cntN].lastname;
            members += "<li class='icon-circle' style='background-color: "+randomColor+"'><span class='icon'>"+ name.charAt(0) + "</span><span class='tooltip'>"+fullname+"</span></li><br>";
          }

          $memPicture = '';
          if(data[cnt].picture != ""){
            $memPicture = "<?=ROOT_PRIVATE?>/views/memberimage/"+data[cnt].clusterleaderid+"/"+data[cnt].picture+"";
          }
          else{
            // Placeholder image with the letter
            $memPicture = "https://ui-avatars.com/api/?name="+data[cnt].firstname+"+"+data[cnt].lastname; 
          }

          clustermembers += "<tr>"+
                        "<td>"+data[cnt].clustername+"</td>"+
                        "<td><img src='"+$memPicture+"' alt='Image 1'> &nbsp; "+data[cnt].firstname+" "+data[cnt].lastname+"</td>"+
                        "<td><ul class='image-list'>"+members+"</ul></td>"+
                        "<td><button class='btn btn-sm btn-flat btn-info' onclick='viewclustermembers(\"" + cnt + "\");'><i class='bx bx-list-ul'></i></button></td>"+
                      "</tr>";
        }
        $("#tblclustermembers").html(clustermembers);
      }
    });
  }

  function viewclustermembers(arrayIndex){
    openModal('modalclustermembers');
    $(".grpName").text("Cluster");
    $(".modalgrpName").text(clustermembersarray[arrayIndex].clustername);

    $("#imageLeader").attr("src", "<?=ROOT_PRIVATE?>/views/memberimage/"+clustermembersarray[arrayIndex].clusterleaderid+"/"+clustermembersarray[arrayIndex].picture+"");
    $("#clusterleadername").text(clustermembersarray[arrayIndex].firstname + " " + clustermembersarray[arrayIndex].lastname);
    $("#lblggclusterid").text(clustermembersarray[arrayIndex].clusterid);

    var membersInfo = "";
    for(cnt in clustermembersarray[arrayIndex].memberid){

      var membername = clustermembersarray[arrayIndex].memberid[cnt].firstname + " " + clustermembersarray[arrayIndex].memberid[cnt].lastname;
      var mtype = clustermembersarray[arrayIndex].memberid[cnt].clusterMType === "" ? "Member" : clustermembersarray[arrayIndex].memberid[cnt].clusterMType;

      var memPicture = '';
      if(clustermembersarray[arrayIndex].memberid[cnt].picture != ""){
        memPicture = "<?=ROOT_PRIVATE?>/views/memberimage/"+clustermembersarray[arrayIndex].memberid[cnt].memberid+"/"+clustermembersarray[arrayIndex].memberid[cnt].picture+"";
      }
      else{
        // Placeholder image with the letter
        memPicture = "https://ui-avatars.com/api/?name="+clustermembersarray[arrayIndex].memberid[cnt].firstname+"+"+clustermembersarray[arrayIndex].memberid[cnt].lastname; 
      }

      membersInfo += '<div class="col-md-4 mb-2">'+
                '<div class="card">'+
                  '<img id="imageLeader" src="'+memPicture+'" class="img-fluid img-thumbnail rounded-0" alt="Cluster Leader Photo" height="200px;">'+
                  '<div class="card-body text-center">'+
                    '<h6 class="mb-0">'+ membername +'</h6>'+
                    '<small>'+ mtype +'</small>'+
                  '</div>'+
                '</div>'+
              '</div>';
    }

    $("#divmembersinfo").html(membersInfo).append('<div class="col-md-4 mb-2">'+
                '<div class="card border-0" style="height: 100%;">'+
                  '<div class="card-body text-center d-flex justify-content-center align-items-center">'+
                    '<button class="btn btn-lg btn-outline-secondary" style="width: 60px; height: 60px; border-radius: 50%;" onclick="viewMembers();"><i class="bx bx-user-plus text-dark"></i></button>'+
                  '</div>'+
                '</div>'+
              '</div>');
  }

  function viewMembers(){
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
    var lblggclusterid = $("#lblggclusterid").text();
    var memberid = members[index].memberid;
    const clusterinfo = clustermembersarray.filter(clustermembersarray => clustermembersarray.clusterid === lblggclusterid);

    Swal.fire({
      title: "Are you sure?",
      text: "Add "+members[index].firstname+" "+members[index].lastname+" in "+clusterinfo[0].clustername+" cluster?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, add it!"
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: 'POST',
          url: '<?=ROOT_PUBLIC?>/clustermembers/saveClusterMember',
          data: {
            clusterid: lblggclusterid,
            memberid: memberid
          },
          success: function(data){
            // console.log(data);
            // getAllDeacons();
          }
        });
        closeModal("modalmemberslist");
      }
    });
  }
</script>