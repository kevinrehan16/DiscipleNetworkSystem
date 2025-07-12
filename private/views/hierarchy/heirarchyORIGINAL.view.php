<!-- MAIN -->
<main>
  <h1 class="title">DISCIPLE NETWORK</h1>
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
                  <li class="li-dNet" id="elders">
                      <a href="javascript:void(0)" id="board-of-elders">
                          <span>Board of Elders</span>
                      </a>
                  </li>
                  <li class="li-dNet" id="deacons">
                      <a href="javascript:void(0)" id="board-of-deacons">
                          <span>Board of Deacons</span>
                      </a>
                  </li>
                  <li class="li-dNet" id="pastoral">
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
//   document.addEventListener("DOMContentLoaded", function() {
//     // Get the elements
//     const boardOfElders = document.getElementById("board-of-elders");
//     const boardOfDeacons = document.getElementById("board-of-deacons");
//     const pastoralStaff = document.getElementById("pastoral-staff");

//     const eldersLevel = document.querySelector(".level-elders");
//     const deaconsLevel = document.querySelector(".level-deacons");
//     const pastoralLevel = document.querySelector(".level-pastoral");

//     // Initially hide all levels
//     eldersLevel.style.display = "none";
//     deaconsLevel.style.display = "none";
//     pastoralLevel.style.display = "none";

//     // Function to toggle visibility of the levels
//     function toggleVisibility(level, section) {
//         if (level.style.display === "none" || level.style.display === "") {
//             level.style.display = "block";
//         } else {
//             level.style.display = "none";
//         }
//     }

//     // Add event listeners to the sections
//     boardOfElders.addEventListener("click", function() {
//         toggleVisibility(eldersLevel, boardOfElders);
//     });

//     boardOfDeacons.addEventListener("click", function() {
//         toggleVisibility(deaconsLevel, boardOfDeacons);
//     });

//     pastoralStaff.addEventListener("click", function() {
//         toggleVisibility(pastoralLevel, pastoralStaff);
//     });
//   });

//   function toggleList(anchor) {
//     // Find the <a> element that was clicked
//     let parentLi = anchor.closest('li');
    
//     // Check if the <ul> for this <a> already exists
//     let ul = parentLi.querySelector('ul');

//     if (!ul) {
//         // Create the new <ul> element
//         ul = document.createElement('ul');
        
//         // Create 3 <li> elements and append them to the <ul>
//         for (let i = 1; i <= 3; i++) {
//             const li = document.createElement('li');
            
//             // Create the inner <a> element with the same functionality
//             const innerAnchor = document.createElement('a');
//             innerAnchor.href = 'javascript:void(0)';
//             innerAnchor.setAttribute('onclick', 'toggleList(this)');
//             const span = document.createElement('span');
//             span.textContent = 'Growth Group ' + i;
//             innerAnchor.appendChild(span);
//             li.appendChild(innerAnchor);

//             // Append the new <li> to the <ul>
//             ul.appendChild(li);
//         }

//         // Append the <ul> to the same <li> element
//         parentLi.appendChild(ul);
//     }

//     // Toggle the display of the <ul>
//     ul.style.display = (ul.style.display === 'none' || ul.style.display === '') ? 'block' : 'none';
//   }

</script>

<?php 
  include("hierarchy.script.php"); 
?>