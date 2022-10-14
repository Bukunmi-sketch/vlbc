  <!------------------------LEFT ----------------- ---------------->
  <div class="left">
    <!------------------------for keeping profile and remove button for sidenav----------------- ---------------->
    <div class="image-removebox">

      <a href="mypage" class="profile">
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

        
        <a href="dashboard"  class="menu-item">
            <h3>Home</h3>
        </a>

        <a href="Javascript:void(0)"   onclick="myFunction()" class="menu-item">
            <h3>Members</h3>
        </a>

       
        <div id="myDropdown" class="dropdown-content">
           <a href="add_member" class="menu-item"> <i class="fa fa-users" aria-hidden="true"></i> <h3>Add members </h3> </a>
           <a href="all_members" class="menu-item"> <h3>Members details </h3> </a>
         </div>

         <a href="javascript:void(0)"  class="menu-item" onclick="manage()">
            <h3>Your Birthdays</h3>
        </a>

        <div id="manage" class="dropdown-content">
           <a href="units" class="menu-item"> <i class="fa fa-users" aria-hidden="true"></i> <h3>Create Units </h3> </a>
           <a href="view_ministry" class="menu-item"> <i class="fa fa-users" aria-hidden="true"></i> <h3>View Ministries</h3> </a>
           <a href="view_units" class="menu-item"> <i class="fa fa-users" aria-hidden="true"></i> <h3>View Departments</h3> </a>
         </div>

        <a href="javascript:void(0)"  class="menu-item" onclick="announce()">
            <h3>Pay Tithes and Offerings</h3>
        </a>
        <div id="announce" class="dropdown-exams">
           <a href="announcement" class="menu-item"> <h3>Add Announcement</h3> </a>
           <a href="view_announce" class="menu-item"> <h3>View Announcement</h3> </a>
         </div>

        <a href="javascript:void(0)" class="menu-item" onclick="exams()">
            <h3>House Fellowship</h3>
        </a>

        <div id="exams" class="dropdown-exams">
           <a href="add_fellowship" class="menu-item"> <h3>Create House Fellowship</h3> </a>
           <a href="view_fellowship" class="menu-item"> <h3>View Fellowhip Members</h3> </a>
           <a href="send-textmsg" class="menu-item"> <h3>Children Details</h3> </a>
         </div>

       
        <a href="javascript:void(0)" class="menu-item" onclick="visit()">
            <h3>Your department</h3>
        </a>

        <div id="visit"  class="dropdown-attendance">
           <a href="mark_attendance" class="menu-item"> <h3>Mark Attendance</h3> </a>
           <a href="view_attendance" class="menu-item"> <h3>View Attendance</h3> </a>
         </div>

        <a href="javascript:void(0)" class="menu-item" onclick="attend()">
            <h3>Visitors</h3>
        </a>

        <div id="attendance"  class="dropdown-attendance">
           <a href="add_visitor" class="menu-item"> <h3>Add Visitor</h3> </a>
           <a href="visitor_details" class="menu-item"> <h3>Visitor Details</h3> </a>
         </div>

       
         <a href="javascript:void(0)" onclick="members()" class="menu-item">
            <h3>Events & Birthdays</h3>
        </a>
       
        <div id="members"  class="dropdown-members">
            <a href="events" class="menu-item"> <h3>Upcoming Events</h3> </a>
            <a href="birthday" class="menu-item"> <h3>View Birthdays</h3> </a>   
         </div>

          <a href="javascript:void(0)" onclick="campreg()" class="menu-item">
            <h3>Financial Reports</h3>
          </a>

          <div id="campreg" class="dropdown-exams">
           <a href="send-email" class="menu-item"> <h3>Add Tithe</h3> </a>
           <a href="send-textmsg" class="menu-item"> <h3>Add Offering</h3> </a>
           <a href="send-textmsg" class="menu-item"> <h3> Add Donations</h3> </a>
         </div>
                     
<!---------------------------------------------------------- EDIT ADMIN ACCOUNT ------------------------------------------------------->     
        <a href="adminedit" class="menu-item">
       <!--    <span><i class="material-icons">settings</i></span> -->
            <h3>Your Details</h3>
        </a>

        <a href="dashboard?logout=true" class="menu-item">
            <h3>Log out</h3>
        </a>


    </div>
  </div>

    <script>




    </script>
