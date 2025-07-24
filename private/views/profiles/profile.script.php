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

        $("#lblfathername").text(dataInformation[0].fathername);
        $("#lblmothername").text(dataInformation[0].mothername);
        $("#lblspousename").text(dataInformation[0].spousename);

        var childInfo = "";
        if(dataInformation[0].children){
          dataInformation[0].children.forEach((child, index) => {
            childInfo += "<li><i class='bx bx-child text-success'></i>"+child.childname+" ("+child.childage+" y.o)</li>";
          });
        }
        $("#lblchildrenname").html(childInfo);
        
        $("#lblhomeaddress").text(dataInformation[0].homeaddress);
        $("#lblbarangay").text(dataInformation[0].barangay);
        $("#lblcity").text(dataInformation[0].city);
        $("#lblregion").text(dataInformation[0].region);
        $("#lblcountry").text(dataInformation[0].country);

        $("#lblcollegeschoolname").text(dataInformation[0].collegeschool);
        $("#lbldegree").text(dataInformation[0].collegedegree);
        $("#lblhighschool").text(dataInformation[0].highschool);
        $("#lbloccupation").text(dataInformation[0].occupation);
        $("#lblindustry").text(dataInformation[0].industry);

        $("#lblwhenreceive").text(formatDate(dataInformation[0].receivedJesus));
        $("#lblbaptized").text(dataInformation[0].baptizedImmersion);
        $("#lblwhenbaptized").text(formatDate(dataInformation[0].baptizeddate));

        var arrSpiritualGift = dataInformation[0].spiritualgift.split(',').map(item => item.trim());
        const darkColors = ['#8B0000', '#006400', '#800080', '#00008B', '#8B8000', '#000000', '#4B0082', '#8B4500', '#008B8B'];
        var sp = "";
        arrSpiritualGift.forEach((spiritualgift, index) => {
          const bgColor = darkColors[index % darkColors.length];
          sp += `<span class='badge fw-light text-capitalize' style='background-color:${bgColor}; color:#fff; margin-right:5px;'>${spiritualgift}</span>`;
        });
        $("#lblspiritualgifts").html(sp);

        $("#lblpurposereg").text(dataInformation[0].purposereg);
        $("#lblpreviouschurch").text(dataInformation[0].prevchurch);
        $("#lblchurchaffiliation").text(dataInformation[0].churchaffiliation);
      }
    });
    
  }
</script>