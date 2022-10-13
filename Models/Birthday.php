<?php

//namespace Users;

require '../Includes/db.inc.php';

   class Birthday{
        private $db;
       
        public function __construct($conn)
        {
            $this->db= $conn;
        }

        public function fetchBirthdayCelebrant($birthmonth){
          $sql="SELECT * FROM members WHERE birthmonth=:birthmonth";
          $stmt=$this->db->prepare($sql);
          $stmt->bindParam(':birthmonth',$birthmonth );
          $stmt->execute();
          $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
          $g=1;
          if ($stmt->rowCount() > 0){
            ob_start();
            ?>
        
      <div class="table-container">
                  <table id="example">
                    <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Members Name</th>
                        <th>Members Id</th>
                        <th>Members contact</th>
                        <th>gender</th>
                        <th>Fellowships</th>
                        <th>Birthday</th>
                      </tr>
                    </thead>
                    <tbody>
      
            <?php foreach($data as $members){  ?>
              <div>
                          <tr class="trr" id="eachorder<?php echo  "{$members['id']}"; ?>">
                          <td> <b><?php echo $g++; ?> </b>   </td>                  
                            <td> <b><?php echo  "{$members['firstname']} {$members['lastname']}"; ?> </b> </td>
                            <td> <?php echo  "{$members['rollid']}"; ?> </td>
                            <td> <?php echo  "{$members['mobile']}"; ?> </td>
                            <td> <?php echo  "{$members['gender']}"; ?> </td>
                            <td> <?php echo  "{$members['fellowships']}"; ?> </td>
                            <td><b> <?php echo  "{$members['birthmonth']} {$members['birthday']}"; ?> </b> </td>
                          
                          </tr>
                        </div>
                
            <?php } ?>
      
      
        <?php }else{ ?>
          <p>No celebrant in this month</p>
        
      <?php     }
     //   return  ob_get_clean();
              }  
   }
?>
