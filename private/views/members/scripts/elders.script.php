<script>

  $(function(){
    $(".fixTable").tableHeadFixer();

    getAllElders();
    getmemberslist();

    $('.search-info').keyup(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            getAllElders();
        }else if(keycode == '8'){
            getAllElders();
        }
    });
    
    $('#txtSearchInformation').keyup(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            getmemberslist();
        }else if(keycode == '8'){
            getmemberslist();
        }
    });
  });

  function getAllElders(){
    var dataRecord = '';
    var txtSearchInformation = $("#txtsearcheldersinfo").val();

    $.ajax({
      type: 'POST',
      url: '<?=ROOT_PUBLIC?>/memberlist/getMembers',
      dataType: 'json',
      data: {
        // joinTable: 'churches',
        memberLvlTitle: 'Elder',
        txtSearchInformation: txtSearchInformation
      },
      beforeSend: function(){
        $("#tblelderslist").html("<tr><td class='text-center' colspan='8'>Loading Records...</td></tr>");
      },
      success: function(data){
        // console.log(data);

        allMembers = data;
        let allMembersLength = Array.isArray(allMembers) ? allMembers.length : 0;

        if(allMembersLength > 0){
          $.each(data, function(index, memberInfo){
            // console.log(memberInfo);
            
            $memPicture = '';
            if(memberInfo.picture != ""){
              $memPicture = "<?=ROOT_PRIVATE?>/views/memberimage/"+memberInfo.memberid+"/"+memberInfo.picture+"";
            }
            else{
              // Placeholder image with the letter
              $memPicture = "https://ui-avatars.com/api/?name="+memberInfo.firstname+"+"+memberInfo.lastname; 
            }

            var toggleClass = "inactive";
            var chkStatus = "";
            if(memberInfo.memberstatus == "Active"){
              toggleClass = "active"
              chkStatus = "checked";
            }

            dataRecord += "<tr>"+
                            "<td>"+
                              "<input type='checkbox' data-toggle='toggle' data-onstyle='success' data-offstyle='danger' data-size='xs' checked data-on='Active' data-off='Inactive' data-style='ios' value='Active' onChange='alert($(this).val());'>" +
                            "</td>"+
                            "<td>"+memberInfo.memberid+"</td>"+
                            "<td>"+memberInfo.nickname+"</td>"+
                            "<td><img src='"+$memPicture+"' alt='Image 1'> &nbsp;"+memberInfo.firstname+" "+memberInfo.lastname+"</td>"+
                            "<td>"+memberInfo.lifestage+"</td>"+
                            "<td>"+ formatDate(memberInfo.birthday)+"</td>"+
                            "<td>"+memberInfo.emailaddress+"</td>"+
                            "<td class='td-btn'>"+
                              "<i class='btn-icon bx bxs-edit' title='Edit information'></i>"+
                              "<i class='btn-icon bx bx-notepad' title='View logs'></i>"+
                              "<i class='btn-icon bx bx-task-x' title='Remove'></i>"+
                            "</td>"+
                          "</tr>";
          });
        }
        else{
          dataRecord = "<tr><td class='text-center' colspan='8'>No Record Found</td></tr>";
        }

        $("#tblelderslist").html(dataRecord);
      },
      complete: function(){
        $('input[data-toggle="toggle"]').bootstrapToggle();
      }
    });
  }

  function addnewelders(){
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
    Swal.fire({
      title: "Are you sure?",
      text: "Add "+members[index].firstname+" "+members[index].lastname+" in the Board of Elders?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, add it!"
    }).then((result) => {
      if (result.isConfirmed) {
        var defaultid = members[index].id;
        var memberid = members[index].memberid;

        $.ajax({
          type: 'POST',
          url: '<?=ROOT_PUBLIC?>/elderlist/saveNewElder',
          data: {
            defaultid: defaultid,
            memberid: memberid
          },
          success: function(data){
            // console.log(data);
            getAllElders();
          }
        });
        closeModal("modalmemberslist");
      }
    });
    
  }

</script>