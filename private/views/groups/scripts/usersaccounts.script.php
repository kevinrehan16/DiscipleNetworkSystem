<script>
  var members = [];
  
  $(function(){
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

  function addnewuseracount(){
    openModal("modalusersaccounts");
  }

  function viewMembers(){
    openModal("modalmemberslist");
  }

  function selectMember(index){
    $("#txtuseraccountid").val(members[index].memberid);
    $("#txtuseraccname").val(members[index].firstname + " " + members[index].lastname);
    $("#txtuseremail").val(members[index].emailaddress);
    $("#txtuseracctemppass").val(generatePassword());

    closeModal("modalmemberslist");
  }

  function canceluseraccount(){
    closeModal("modalusersaccounts");
    $("#modalusersaccounts").find(".form-control").val('');
  }

  function saveuseraccount(){
    var txtuseraccname = $("#txtuseraccname").val();
    var txtuseraccountid = $("#txtuseraccountid").val();
    var txtuseremail = $("#txtuseremail").val();
    var txtuseracctemppass = $("#txtuseracctemppass").val();

    $.ajax({
      type: 'POST',
      url: '<?=ROOT_PUBLIC?>/usersaccounts/saveuseraccount',
      data: {
        txtuseraccountid: txtuseraccountid,
        txtuseremail: txtuseremail,
        txtuseracctemppass: txtuseracctemppass
      },
      success: function(data){
        // console.log(data);
        Swal.fire({
          title: "New User Account",
          text: txtuseraccname +" user account has been created.",
          icon: "success"
        });
      },
      complete: function(){
        canceluseraccount();
        // getgroupclusterlist();
      }
    });
  }
  
</script>