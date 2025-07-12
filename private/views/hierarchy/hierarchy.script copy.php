<script>
  $(function(){
    var allMembers = [];
    getmemberslist();

    $(".multiCollapse").each(function(){
      var multiCollapse = this.id;
      $('#multi'+multiCollapse).on('show.bs.collapse', function () {
        $('#icon'+multiCollapse).removeClass('bxs-chevron-left').addClass('bxs-chevron-down');
      });

      $('#multi'+multiCollapse).on('hide.bs.collapse', function () {
        $('#icon'+multiCollapse).removeClass('bxs-chevron-down').addClass('bxs-chevron-left');
      });
    });
  });
  
  function getmemberslist(){
    var dataRecord = "";
    var txtSearchInformation = '';

    $.ajax({
      type: 'POST',
      url: '<?=ROOT_PUBLIC?>/memberlist/getmembers',
      dataType: 'json', 
      data: {
        txtSearchInformation: txtSearchInformation
      },
      success: function(data){
        allMembers = data;

        let cntAllMembers = Array.isArray(allMembers) ? allMembers.length : 0;
        $("#cntAllMembers").text(cntAllMembers);
        // console.log(allMembers);

        //!! DATA FOR LEVEL 1
        const seniorPastor = allMembers.filter(member => member.memberLvlTitle === "Senior Pastor");
        // console.log(seniorPastor);
        var lvlonefullname = seniorPastor[0].firstname + " " + seniorPastor[0].lastname;
        var memPicture = '';
        if(seniorPastor[0].picture != ""){
          memPicture = "<?=ROOT_PRIVATE?>/views/memberimage/"+seniorPastor[0].memberid+"/"+seniorPastor[0].picture+"";
        }
        else{
          // Placeholder image with the letter
          memPicture = "https://ui-avatars.com/api/?name="+seniorPastor[0].firstname+"+"+seniorPastor[0].lastname; 
        }
        $("#heirarchy_img").attr("src", memPicture);
        $("#hierarchy_fname").text(lvlonefullname);
        $("#hierarchy_designation").text(seniorPastor[0].memberLvlTitle);
        //!! END DATA FOR LEVEL 1

        //!! DATA FOR LEVEL 2 PASTORAL STAFF
        var dataPastor = '';
        const pastor = allMembers.filter(member => member.memberLvlTitle === "Pastor");
        // console.log(pastor);
        let allpastorLength = Array.isArray(pastor) ? pastor.length : 0;
        if(allpastorLength > 0){
          $.each(pastor, function(index, pastorInfo){
            
            var lvltwofullname = pastorInfo.firstname + " " + pastorInfo.lastname;
            var memPPicture = '';
            if(pastorInfo.picture != ""){
              memPPicture = "<?=ROOT_PRIVATE?>/views/memberimage/"+pastorInfo.memberid+"/"+pastorInfo.picture+"";
            }
            else{
              // Placeholder image with the letter
              memPPicture = "https://ui-avatars.com/api/?name="+pastorInfo.firstname+"+"+pastorInfo.lastname; 
            }

            dataPastor += "<li class='list-group-item'>"+
                              "<div class='item-content'>"+
                                "<img src='"+memPPicture+"' alt='Image' class='item-image'>"+
                                "<a href='<?=ROOT_PUBLIC?>/profilelist/"+pastorInfo.id+"'><span class='item-text link-name'>"+pastorInfo.memberLvlTitle+" "+lvltwofullname+"</span></a>"+
                              "</div>"+
                            "</li>";
          });
        }
        else{
          dataPastor += "<li class='list-group-item'>"+
                              "<div class='item-content'>"+
                                "<span class='item-text'>No Record Found...</span>"+
                              "</div>"+
                            "</li>";
        }

        $("#lvltwopastoralstaff").html(dataPastor);
        $("#numPastors").text(pastor.length);
        //!! END DATA FOR LEVEL 2 PASTORAL STAFF

        //!! DATA FOR LEVEL 2 BOARD OF ELDERS
        var dataElder = '';
        const elder = allMembers.filter(member => member.memberLvlTitle === "Elder");
        // console.log(elder);
        let allelderLength = Array.isArray(elder) ? elder.length : 0;
        if(allelderLength > 0){
          $.each(elder, function(index, elderInfo){
            
            var lvltwofullname = elderInfo.firstname + " " + elderInfo.lastname;
            var memPPicture = '';
            if(elderInfo.picture != ""){
              memPPicture = "<?=ROOT_PRIVATE?>/views/memberimage/"+elderInfo.memberid+"/"+elderInfo.picture+"";
            }
            else{
              // Placeholder image with the letter
              memPPicture = "https://ui-avatars.com/api/?name="+elderInfo.firstname+"+"+elderInfo.lastname; 
            }

            dataElder += "<li class='list-group-item'>"+
                              "<div class='item-content'>"+
                                "<img src='"+memPPicture+"' alt='Image' class='item-image'>"+
                                "<a href='<?=ROOT_PUBLIC?>/profilelist/"+elderInfo.id+"'><span class='item-text link-name'>"+elderInfo.memberLvlTitle+" "+lvltwofullname+"</span></a>"+
                              "</div>"+
                            "</li>";
          });
        }
        else{
          dataElder += "<li class='list-group-item'>"+
                              "<div class='item-content'>"+
                                "<span class='item-text'>No Record Found...</span>"+
                              "</div>"+
                            "</li>";
        }

        $("#lvltwoboe").html(dataElder);
        $("#numElders").text(elder.length);
        //!! END DATA FOR LEVEL 2 BOARD OF ELDERS

        //!! DATA FOR LEVEL 2 BOARD OF DEACONS
        var dataDeacon = '';
        const deacon = allMembers.filter(member => member.memberLvlTitle === "Deacon");
        // console.log(deacon);
        let alldeaconLength = Array.isArray(deacon) ? deacon.length : 0;
        if(alldeaconLength > 0){
          $.each(deacon, function(index, deaconInfo){
            
            var lvltwofullname = deaconInfo.firstname + " " + deaconInfo.lastname;
            var memPPicture = '';
            if(deaconInfo.picture != ""){
              memPPicture = "<?=ROOT_PRIVATE?>/views/memberimage/"+deaconInfo.memberid+"/"+deaconInfo.picture+"";
            }
            else{
              // Placeholder image with the letter
              memPPicture = "https://ui-avatars.com/api/?name="+deaconInfo.firstname+"+"+deaconInfo.lastname; 
            }

            dataDeacon += "<li class='list-group-item'>"+
                              "<div class='item-content'>"+
                                "<img src='"+memPPicture+"' alt='Image' class='item-image'>"+
                                "<a href='<?=ROOT_PUBLIC?>/profilelist/"+deaconInfo.id+"'><span class='item-text link-name'>"+deaconInfo.memberLvlTitle+" "+lvltwofullname+"</span></a>"+
                              "</div>"+
                            "</li>";
          });
        }
        else{
          dataDeacon += "<li class='list-group-item'>"+
                              "<div class='item-content'>"+
                                "<span class='item-text'>No Record Found...</span>"+
                              "</div>"+
                            "</li>";
        }

        $("#lvltwobod").html(dataDeacon);
        $("#numDeacons").text(deacon.length);
        //!! END DATA FOR LEVEL 2 BOARD OF DEACONS


        //!! DATA FOR LEVEL 3 CLUSTER LEADERS
        var dataClusterLeader = '';
        const clusterleader = allMembers.filter(member => member.memberLvlTitle === "Cluster Leader");
        // console.log(clusterleader);
        let allclusterleaderLength = Array.isArray(clusterleader) ? clusterleader.length : 0;
        if(allclusterleaderLength > 0){
          $.each(clusterleader, function(index, clusterleaderInfo){
            
            var lvltwofullname = clusterleaderInfo.firstname + " " + clusterleaderInfo.lastname;
            var memPPicture = '';
            if(clusterleaderInfo.picture != ""){
              memPPicture = "<?=ROOT_PRIVATE?>/views/memberimage/"+clusterleaderInfo.memberid+"/"+clusterleaderInfo.picture+"";
            }
            else{
              // Placeholder image with the letter
              memPPicture = "https://ui-avatars.com/api/?name="+clusterleaderInfo.firstname+"+"+clusterleaderInfo.lastname; 
            }

            dataClusterLeader += "<div class='col-md-3 mb-2'>"+
                              "<div class='item-content'>"+
                                "<img src='"+memPPicture+"' alt='Image' class='item-image'>"+
                                "<a href='<?=ROOT_PUBLIC?>/profilelist/"+clusterleaderInfo.id+"'><span class='item-text link-name'>"+lvltwofullname+"</span></a>"+
                              "</div>"+
                            "</div>";
          });
        }
        else{
          dataClusterLeader += "<div class='col-md-12'>"+
                              "<div class='item-content'>"+
                                "<span class='item-text'>No Record Found...</span>"+
                              "</div>"+
                            "</div>";
        }

        $("#clusterleaders").html(dataClusterLeader);
        $("#numClusterLeaders").text(clusterleader.length);
        //!! END DATA FOR LEVEL 3 CLUSTER LEADERS


        //!! DATA FOR LEVEL 3 GROWTH GROUP LEADERS
        var datagrowthgroupLeader = '';
        const growthgroupleader = allMembers.filter(member => member.memberLvlTitle === "GG Leader");
        // console.log(growthgroupleader);
        let allgrowthgroupleaderLength = Array.isArray(growthgroupleader) ? growthgroupleader.length : 0;
        if(allgrowthgroupleaderLength > 0){
          $.each(growthgroupleader, function(index, growthgroupleaderInfo){
            
            var lvltwofullname = growthgroupleaderInfo.firstname + " " + growthgroupleaderInfo.lastname;
            var memPPicture = '';
            if(growthgroupleaderInfo.picture != ""){
              memPPicture = "<?=ROOT_PRIVATE?>/views/memberimage/"+growthgroupleaderInfo.memberid+"/"+growthgroupleaderInfo.picture+"";
            }
            else{
              // Placeholder image with the letter
              memPPicture = "https://ui-avatars.com/api/?name="+growthgroupleaderInfo.firstname+"+"+growthgroupleaderInfo.lastname; 
            }

            datagrowthgroupLeader += "<div class='col-md-3 mb-2'>"+
                              "<div class='item-content'>"+
                                "<img src='"+memPPicture+"' alt='Image' class='item-image'>"+
                                "<a href='<?=ROOT_PUBLIC?>/profilelist/"+growthgroupleaderInfo.id+"'><span class='item-text link-name'>"+lvltwofullname+"</span></a>"+
                              "</div>"+
                            "</div>";
          });
        }
        else{
          datagrowthgroupLeader += "<div class='col-md-12'>"+
                              "<div class='item-content'>"+
                                "<span class='item-text'>No Record Found...</span>"+
                              "</div>"+
                            "</div>";
        }

        $("#growthgroupleaders").html(datagrowthgroupLeader);
        $("#numGGLeaders").text(growthgroupleader.length);
        //!! END DATA FOR LEVEL 3 GROWTH GROUP LEADERS

        //!! DATA FOR LEVEL 4 GROWTH GROUP MEMBERS
        var datagrowthgroupMember = '';
        const growthgroupmember = allMembers.filter(member => member.memberLvlTitle === "GG Member");
        // console.log(growthgroupmember);
        let allgrowthgroupmemberLength = Array.isArray(growthgroupmember) ? growthgroupmember.length : 0;
        if(allgrowthgroupmemberLength > 0){
          $.each(growthgroupmember, function(index, growthgroupmemberInfo){
            
            var lvltwofullname = growthgroupmemberInfo.firstname + " " + growthgroupmemberInfo.lastname;
            var memPPicture = '';
            if(growthgroupmemberInfo.picture != ""){
              memPPicture = "<?=ROOT_PRIVATE?>/views/memberimage/"+growthgroupmemberInfo.memberid+"/"+growthgroupmemberInfo.picture+"";
            }
            else{
              // Placeholder image with the letter
              memPPicture = "https://ui-avatars.com/api/?name="+growthgroupmemberInfo.firstname+"+"+growthgroupmemberInfo.lastname; 
            }

            datagrowthgroupMember += "<div class='col-md-3 mb-2'>"+
                              "<div class='item-content'>"+
                                "<img src='"+memPPicture+"' alt='Image' class='item-image'>"+
                                "<a href='<?=ROOT_PUBLIC?>/profilelist/"+growthgroupmemberInfo.id+"'><span class='item-text link-name'>"+lvltwofullname+"</span></a>"+
                              "</div>"+
                            "</div>";
          });
        }
        else{
          datagrowthgroupMember += "<div class='col-md-12'>"+
                              "<div class='item-content'>"+
                                "<span class='item-text'>No Record Found...</span>"+
                              "</div>"+
                            "</div>";
        }

        $("#growthgroupmembers").html(datagrowthgroupMember);
        $("#numGGMembers").text(growthgroupmember.length);
        //!! END DATA FOR LEVEL 4 GROWTH GROUP MEMBERS

        //!! DATA FOR LEVEL 5 NON-GROWTH GROUP MEMBERS
        var dataNongrowthgroupMember = '';
        const nongrowthgroupmember = allMembers.filter(member => member.memberLvlTitle === "Non-GG Member");
        // console.log(nongrowthgroupmember);
        let allnongrowthgroupmemberLength = Array.isArray(nongrowthgroupmember) ? nongrowthgroupmember.length : 0;
        if(allnongrowthgroupmemberLength > 0){
          $.each(nongrowthgroupmember, function(index, nongrowthgroupmemberInfo){
            
            var lvltwofullname = nongrowthgroupmemberInfo.firstname + " " + nongrowthgroupmemberInfo.lastname;
            var memPPicture = '';
            if(nongrowthgroupmemberInfo.picture != ""){
              memPPicture = "<?=ROOT_PRIVATE?>/views/memberimage/"+nongrowthgroupmemberInfo.memberid+"/"+nongrowthgroupmemberInfo.picture+"";
            }
            else{
              // Placeholder image with the letter
              memPPicture = "https://ui-avatars.com/api/?name="+nongrowthgroupmemberInfo.firstname+"+"+nongrowthgroupmemberInfo.lastname; 
            }

            dataNongrowthgroupMember += "<div class='col-md-3 mb-2'>"+
                              "<div class='item-content'>"+
                                "<img src='"+memPPicture+"' alt='Image' class='item-image'>"+
                                "<a href='<?=ROOT_PUBLIC?>/profilelist/"+nongrowthgroupmemberInfo.id+"'><span class='item-text link-name'>"+lvltwofullname+"</span></a>"+
                              "</div>"+
                            "</div>";
          });
        }
        else{
          dataNongrowthgroupMember += "<div class='col-md-12'>"+
                              "<div class='item-content'>"+
                                "<span class='item-text'>No Record Found...</span>"+
                              "</div>"+
                            "</div>";
        }

        $("#nongrowthgroupmembers").html(dataNongrowthgroupMember);
        $("#numNonGGMembers").text(nongrowthgroupmember.length);
        //!! END DATA FOR LEVEL 5 NON-GROWTH GROUP MEMBERS

      }
    });
  }
</script>
