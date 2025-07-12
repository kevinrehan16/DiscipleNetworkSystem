<?php require_once(LAYOUT_HEADER); ?> 

<?php require_once(LAYOUT_SIDEBAR); ?> <!-- I JUST CALL THE FUNCTION OF VIEWING INSTEAD OF USING REQUIRE OR INCLUDE IN PHP -->

<section id="content">
  <?php require_once(LAYOUT_NAVBAR); ?> <!-- I JUST CALL THE FUNCTION OF VIEWING INSTEAD OF USING REQUIRE OR INCLUDE IN PHP -->
  

  <?php
    $folder = "";
    if($folderPage != ""){
      $folder = $folderPage;
    }
    
    require_once($folder."/".$viewPage.".view.php");
  ?>

</section>


<?php require_once(LAYOUT_FOOTER); ?> <!-- I JUST CALL THE FUNCTION OF VIEWING INSTEAD OF USING REQUIRE OR INCLUDE IN PHP -->