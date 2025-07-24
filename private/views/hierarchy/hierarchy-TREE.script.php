<script>
  var primaryLevel = [];
  var groupList = [];
  
  $(function(){
    getPrimaryLevels();
    getGroupList();

    // Bind click event to all <li> elements (when they are clicked, toggle nested <li>s)
    $("ul").on("click", "li.li-dNet > a", function(e) {
        // Prevent the click event from bubbling up to the parent <ul>
        e.stopPropagation();
        // Call the function to toggle nested list items under the clicked <li>
        toggleNestedListItems($(this).closest("li")[0]);
    });
  });

  // Function to add/remove nested <li> items
  function toggleNestedListItems(parentLi) {
    // Check if the <li> has any child <ul> (i.e., nested <li> items)
    var childUl = $(parentLi).children('ul');
    var cntArray = 0;
    var levelTitle = '';
    if(parentLi.id == "elders"){
      levelTitle = "Elder";
    }
    else if(parentLi.id == "deacons"){
      levelTitle = "Deacon";
    }
    else if(parentLi.id == "pastoral"){
      levelTitle = "Pastor";
    }
    else {
      levelTitle = "";
    }

    if (childUl.length === 0) {
      // If no nested <ul>, create and add 3 new <li> items
      var newUl = $("<ul></ul>");
      
      if(levelTitle == "Elder" || levelTitle == "Deacon" || levelTitle == "Pastor"){
        var levelInfo = primaryLevel.filter(level => level.memberLvlTitle == levelTitle);
        // console.log(levelInfo);

        // Create 3 new <li> elements with <a> and <span>
        $.each(levelInfo, function(index, info){
          var newLi = $("<li class='li-dNet nameInfo' id='"+info.memberid+"'></li>").append(
              $("<a></a>").attr("href", "javascript:void(0)").attr("id", "new-item-" + index).append(
                  $("<span></span>").text(info.firstname + " " + info.lastname)
              )
          );
          newUl.append(newLi);
        });
      }
      else{
        if($("#"+parentLi.id).hasClass("nameInfo")){
          var groupInfo = groupList.filter(group => group.growthgroupleaderid == parentLi.id);

          $.each(groupInfo, function(index, ginfo){
            var newLi = $("<li class='li-dNet groupInfo' id='"+ginfo.growthgroupid+"'></li>").append(
                $("<a></a>").attr("href", "javascript:void(0)").attr("id", "group-item-" + index).append(
                    $("<span></span>").text(ginfo.growthgroupshortname)
                )
            );
            newUl.append(newLi);
          });
        }
        else if($("#"+parentLi.id).hasClass("groupInfo")){
          var groupInfo = groupList.filter(group => group.growthgroupid == parentLi.id);
          var groupNames = groupInfo[0].groupid;

          $.each(groupNames, function(index, gninfo){
            var newLi = $("<li class='li-dNet nameInfo' id='"+gninfo.ggmemberid+"'></li>").append(
                $("<a></a>").attr("href", "javascript:void(0)").attr("id", "group-item-" + index).append(
                    $("<span></span>").text(gninfo.fullname)
                )
            );
            newUl.append(newLi);
          });
        }
      }
      
      // Append the new <ul> with the 3 <li> elements below the clicked <a> tag
      $(parentLi).append(newUl);
    } else {
      // If there are child <ul> (nested items), remove them
      childUl.remove();
    }
  }


  function getPrimaryLevels(){
    $.ajax({
      type: 'POST',
      url: '<?=ROOT_PUBLIC?>/hierarchy/getPrimaryLevels',
      dataType: 'json',
      data: {
        
      },
      success: function(data){
        primaryLevel = data;
        // console.log(primaryLevel);
        
        seniorPastor = primaryLevel.filter(level => level.memberLvlTitle === "Senior Pastor");
        seniorPastor = seniorPastor[0];
        
        var memPicture = '';
        if(seniorPastor.picture != ""){
          memPicture = "<?=ROOT_PRIVATE?>/views/memberimage/"+seniorPastor.memberid+"/"+seniorPastor.picture+"";
        }
        else{
          // Placeholder image with the letter
          memPicture = "https://ui-avatars.com/api/?name="+seniorPastor.firstname+"+"+seniorPastor.lastname; 
        }

        $("#pic_detail").attr("src", memPicture);
        $("#name_detail").text(seniorPastor.firstname + " " + seniorPastor.lastname);
      }
    });
  }

  function getGroupList(){
    $.ajax({
      type: 'POST',
      url: '<?=ROOT_PUBLIC?>/hierarchy/getGroupList',
      dataType: 'json',
      data: {
        
      },
      success: function(data){
        groupList = data;
        // console.log(data);
      }
    });
  }
</script>
