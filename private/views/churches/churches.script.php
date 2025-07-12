<script>
  $(function(){
    // alert("wew");
  });

  var arrSatellites = [];

  function addnewchurch(){
    $("#modalchurchinformation").modal("show");
  }

  function savenewchurch(){
    var churchname = $("#churchname").val();
    var shortname = $("#shortname").val();

    $.ajax({
      type: 'POST',
      url: '<?=ROOT_PUBLIC?>/churchlist/add',
      data: {churchname: churchname,
      shortname: shortname,
      satellites: arrSatellites
      },
      success: function(data){
        // console.log(data);
        window.location.href = "churchlist";
      }
    });
  }

  function addnewsatellite(){
    var satellitename = $("#satellitename").val();
    var worshipday = $("#worshipday").val();
    var worshiptime = $("#worshiptime").val();
    var areapastor = $("#areapastor").val();
    var satellitelocation = $("#satellitelocation").val();

    var tblSatellites = "";
    var ctr = 0;

    if(satellitename == "" || areapastor == ""){
      Swal.fire({
        title: "(<span class='text-danger'>*</span>) Important fields are empty.",
        text: "Please kindly enter worship place name and the area pastor.",
        icon: "warning"
      });
    }
    else{
      $("#tblSatellites").append("<tr id='satellite-"+ctr+"'>"+
        "<td>"+satellitename+"</td>"+
        "<td>"+areapastor+"</td>"+
        "<td>"+worshipday+" "+worshiptime+"</td>"+
        "<td>"+satellitelocation+"</td>"+
        "<td>Actions</td>"+
      "</tr>");

      arrSatellites.push({
        satellitename: satellitename,
        areapastor: areapastor,
        worshipday: worshipday,
        worshiptime: worshiptime,
        satellitelocation: satellitelocation,
      });

      $("#modalsatelliteform").find(".form-field").val("");
      closeModal("modalsatelliteinformation");
    }

  }
</script>