<!-- MAIN -->
<main>
  <h1 class="title">DISCIPLE NETWORKS</h1>
  <ul class="breadcrumbs">
    <li><a href="javascript::void(0)">Home</a></li>
    <li class="divider">/</li>
    <li><a href="javascript::void(0)" class="active">Disciple Network</a></li>
  </ul>
  <div class="info-data">
    <div class="tree">
      <ul>
        <li>
          <a href="javascript:void(0)">
            <img id="pic_detail" alt="Senior Pastor" loading="lazy">
            <span id="name_detail">Senior Pastor</span>
          </a>
          <ul>
            <li id="elders">
              <a href="javascript:void(0)" id="board-of-elders">
                <span>Board of Elders</span>
              </a>
            </li>
            <li id="deacons">
              <a href="javascript:void(0)" id="board-of-deacons">
                <span>Board of Deacons</span>
              </a>
            </li>
            <li id="pastoral">
              <a href="javascript:void(0)" id="pastoral-staff">
                <span>Pastoral Staff</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</main>

<script>
  var primaryLevel = [];
  var groupList = [];

  function getPrimaryLevels() {
    return $.ajax({
      type: 'POST',
      url: '<?=ROOT_PUBLIC?>/hierarchy/getPrimaryLevels',
      dataType: 'json',
      success: function (data) {
        primaryLevel = data;
        console.log(primaryLevel);
        const seniorPastor = primaryLevel.find(p => p.memberLvlTitle === "Senior Pastor");
        if (seniorPastor) {
          const memPicture = seniorPastor.picture !== ""
            ? "<?=ROOT_PRIVATE?>/views/memberimage/" + seniorPastor.memberid + "/" + seniorPastor.picture
            : "https://ui-avatars.com/api/?name=" + seniorPastor.firstname + "+" + seniorPastor.lastname;
          $("#pic_detail").attr("src", memPicture);
          $("#name_detail").text(seniorPastor.firstname + " " + seniorPastor.lastname);
        }
      }
    });
  }

  function getGroupList() {
    return $.ajax({
      type: 'POST',
      url: '<?=ROOT_PUBLIC?>/hierarchy/getGroupList',
      dataType: 'json',
      success: function (data) {
        groupList = data;
      }
    });
  }

  function renderMemberLevels(data) {
    const map = {
      "Elder": "#elders",
      "Deacon": "#deacons",
      "Pastor": "#pastoral"
    };
    Object.entries(map).forEach(([title, selector]) => {
      const members = data.filter(m => m.memberLvlTitle === title);
      if (!members.length) return;
      let html = '<ul>';
      members.forEach(member => {
        html += `
          <li data-memberid="${member.memberid}">
            <a href="javascript:void(0)">
              <span>${member.firstname} ${member.lastname}</span>
            </a>
          </li>
        `;
      });
      html += '</ul>';
      $(selector).append(html);
    });
  }

  function renderAllGroupsRecursively() {
    const renderedGroups = new Set();

    function ensureLI(memberid, fullname) {
      let li = $(`li[data-memberid="${memberid}"]`);
      if (!li.length) {
        li = $(`<li data-memberid="${memberid}"><a href="javascript:void(0)"><span>${fullname}</span></a></li>`);
        $('.tree > ul').append(li);
      }
      return li;
    }

    function getFullname(memberid) {
      const found = primaryLevel.find(p => p.memberid === memberid);
      return found ? `${found.firstname} ${found.lastname}` : memberid;
    }

    function renderGroup(leaderId) {
      groupList.forEach(group => {
        if (group.growthgroupleaderid !== leaderId) return;
        if (renderedGroups.has(group.growthgroupid)) return;
        renderedGroups.add(group.growthgroupid);

        const leaderLI = ensureLI(leaderId, getFullname(leaderId));

        let membersHTML = '';
        if (Array.isArray(group.groupid) && group.groupid.length > 0) {
          membersHTML += '<ul>';
          group.groupid.forEach(member => {
            membersHTML += `
              <li data-memberid="${member.ggmemberid}">
                <a href="javascript:void(0)"><span>${member.fullname}</span></a>
              </li>
            `;
          });
          membersHTML += '</ul>';
        }

        const groupHTML = `
          <ul>
            <li>
              <a href="javascript:void(0)">
                <span>${group.growthgroupname} (${group.growthgroupshortname})</span>
              </a>
              ${membersHTML}
            </li>
          </ul>
        `;

        leaderLI.append(groupHTML);

        // Recurse for each member
        if (Array.isArray(group.groupid)) {
          group.groupid.forEach(member => {
            renderGroup(member.ggmemberid);
          });
        }
      });
    }

    // Start with everyone (not just primaryLevel)
    const allPotentialLeaders = new Set([
      ...primaryLevel.map(p => p.memberid),
      ...groupList.flatMap(g => g.groupid.map(m => m.ggmemberid))
    ]);

    allPotentialLeaders.forEach(leaderId => {
      renderGroup(leaderId);
    });
  }

  $(function() {
    $.when(getPrimaryLevels(), getGroupList()).done(function () {
      renderMemberLevels(primaryLevel);
      renderAllGroupsRecursively();
    });
  });
</script>
