  <!------------------------LEFT ----------------- ---------------->
  <div class="left">
    <!------------------------for keeping profile and remove button for sidenav----------------- ---------------->
    <div class="image-removebox">

      <a href="mypage.php" class="profile">
           <div class="profile-photo">
              <img src="" alt=""  class="profile-photo">
           </div>
           <div class="handle">
              <h4><?php echo "{$firstname} {$lastname}"; ?> </h4>
              <h6> <?php echo "{$email}" ;?> </h6>
           </div>
       </a>

       <a href="Javascript:void(0)"  onclick="closenv()" class="remove-bar"> <i class="fa fa-remove remove"></i> </a>
     </div>


<!---------------------end for keeping profile and remove button for sidenav----------------- ---------------->


    <!------------------------SIDEBAR-------------------active--------------->
     <div class="sidebar">

        
        <a href="dashboard.php"  class="menu-item">
            <h3>Dashboard</h3>
        </a>

        <a href="Javascript:void(0)"   onclick="myFunction()" class="menu-item">
            <h3>Manage Members </h3>
        </a>

       
        <div id="myDropdown" class="dropdown-content">
           <a href="add_member.php" class="menu-item"> <i class="fa fa-users" aria-hidden="true"></i> <h3>Add members </h3> </a>
           <a href="allmembers.php" class="menu-item"> <h3>Members details </h3> </a>
         </div>

         <a href="units.php"  class="menu-item" onclick="manage()">
            <h3>Ministry/Units</h3>
        </a>

        <div id="manage" class="dropdown-content">
           <a href="add_member.php" class="menu-item"> <i class="fa fa-users" aria-hidden="true"></i> <h3>WMU</h3> </a>
           <a href="allmembers.php" class="menu-item"> <h3>Youth </h3> </a>
           <a href="allmembers.php" class="menu-item"> <h3> MMU </h3> </a>
           <a href="allmembers.php" class="menu-item"> <h3> Choir </h3> </a>
           <a href="allmembers.php" class="menu-item"> <h3> BSF </h3> </a>
           <a href="allmembers.php" class="menu-item"> <h3> Youth </h3> </a>
           <a href="allmembers.php" class="menu-item"> <h3> Usher </h3> </a>
         </div>

        <a href="units.php"  class="menu-item">
            <h3>Announcement</h3>
        </a>

        <a href="javascript:void(0)" class="menu-item" onclick="exams()">
            <h3>Teens & Children</h3>
        </a>

        <div id="exams" class="dropdown-exams">
           <a href="send-email.php" class="menu-item"> <h3>Add Teenager/Children</h3> </a>
           <a href="send-textmsg.php" class="menu-item"> <h3>Teenagers Details</h3> </a>
           <a href="send-textmsg.php" class="menu-item"> <h3>Children Details</h3> </a>
         </div>
                                 

        <a href="javascript:void(0)" class="menu-item" onclick="attend()">
            <h3>Visitors</h3>
        </a>

        <div id="attendance"  class="dropdown-attendance">
           <a href="add_visitor.php" class="menu-item"> <h3>Add Visitor</h3> </a>
           <a href="visitor_details.php" class="menu-item"> <h3>Visitor Details</h3> </a>
         </div>

       
         <a href="javascript:void(0)" onclick="members()" class="menu-item">
            <h3>Events</h3>
        </a>
       
        <div id="members"  class="dropdown-members">
            <a href="events.php" class="menu-item"> <h3>Upcoming Events</h3> </a>
            <a href="birthday.php" class="menu-item"> <h3>Birthdays</h3> </a>   
         </div>

          <a href="javascript:void(0)" onclick="campreg()" class="menu-item">
            <h3>Financial Reports</h3>
          </a>

          <div id="campreg" class="dropdown-exams">
           <a href="send-email.php" class="menu-item"> <h3>Add Tithe</h3> </a>
           <a href="send-textmsg.php" class="menu-item"> <h3>Add Offering</h3> </a>
           <a href="send-textmsg.php" class="menu-item"> <h3> Add Donations</h3> </a>
         </div>
                     
<!---------------------------------------------------------- EDIT ADMIN ACCOUNT ------------------------------------------------------->     
        <a href="adminedit.php" class="menu-item">
       <!--    <span><i class="material-icons">settings</i></span> -->
            <h3>Edit Admin Account</h3>
        </a>

        <a href="dashboard.php?logout=true" class="menu-item">
            <h3>Log out</h3>
        </a>


    </div>
  </div>

    <script>




    </script>
