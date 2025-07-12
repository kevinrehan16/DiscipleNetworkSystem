<script>
  $dataInformation = [];

  $(function(){
    getInformation();
    
    $("#group-list-info .list-group-item").each(function(){
      $(this).click(function(){
        $("#group-list-info .list-group-item").removeClass("active");
        $(this).addClass("active");
      });
    })
  });

  function getInformation(){
    var defaultId = "<?php echo explode('/', $_GET['url'])[1]; ?>";

    $.ajax({
      type: 'POST',
      url: '<?=ROOT_PUBLIC?>/profilelist/getinformation',
      dataType: 'json',
      data: {
        defaultId: defaultId
      },
      success: function(data) {
        dataInformation = data;
      },
      complete: function(){
        // console.log(dataInformation);

        var memPicture = '';
        if(dataInformation[0].picture != ""){
          memPicture = "<?=ROOT_PRIVATE?>/views/memberimage/"+dataInformation[0].memberid+"/"+dataInformation[0].picture+"";
        }
        else{
          // Placeholder image with the letter
          memPicture = "https://ui-avatars.com/api/?name="+dataInformation[0].firstname+"+"+dataInformation[0].lastname; 
        }

        $("#srcpicture").prop("src", memPicture);

        var fullName = dataInformation[0].firstname + ' ' + dataInformation[0].lastname;
        $("#lblfullname").text(fullName);
        $("#lbloccupation").text(dataInformation[0].occupation);
        $("#lbladdress").text(dataInformation[0].barangay + ', ' + dataInformation[0].city);

        $("#lblnickname").text(dataInformation[0].nickname);
        $("#lblgender").text(dataInformation[0].gender);
        $("#lblemail").text(dataInformation[0].emailaddress);
        $("#lblfacebook").text(dataInformation[0].facebookname);
        $("#lblmobile").text(dataInformation[0].mobilenumber);
        $("#lblbirthday").text(formatDate(dataInformation[0].birthday));
        $("#lblage").text(dataInformation[0].age + " years old");
        $("#lbllifestage").text(dataInformation[0].lifestage);
      }
    });
    
  }
</script>