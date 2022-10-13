<?php

//namespace Users;

require '../Includes/db.inc.php';

   class Fellowship{
        private $db;
       
        public function __construct($conn)
        {
            $this->db= $conn;
        }

        //create new Unit
        public function createFellowship($name, $creator, $created_at){  
               try{
                
                   $sql="INSERT INTO fellowships(name, added_by, added_date) VALUES (:fellowshipname, :creator, :created)";
                     $stmt= $this->db->prepare($sql);
                      $result=  $stmt->execute([
                        ":fellowshipname"=>$name,
                        ":creator" =>$creator,
                        ":created" =>$created_at
                   ]);
   
                   if($result){
                     return true;
                  }else{
                    //   echo "error while creating";
                    return false;
                   }
               } catch(PDOException $e){
                   echo  $e->getMessage(); 
               }
    }   //create()
   
                                  //if produxtname already exist  //auth
public function IfFellowshipExisted($fellowship){
    try{
    
      $sql="SELECT * FROM fellowships WHERE name =:fellowship";
      $stmt= $this->db->prepare($sql);
      $stmt->bindParam(':fellowship', $fellowship);
      $stmt->execute();
      // Check if row is actually returned
      if($stmt->rowCount() > 0 ){
        //  echo "Unit name already existeds";
          return false;
       } else{   
          //   echo 'continue to create Unit';
             return true;
         }
    }catch(PDOException $e){
           echo  $e->getMessage(); 
       }
    }

  
    public function getFellowship()
    {             
      $sql="SELECT * FROM fellowships";
      $stmt=$this->db->prepare($sql);
      $stmt->execute();
      return $stmt;
    }

 
        public function fetchFellowshipMembers($fellowship){
          $sql="SELECT * FROM members WHERE fellowships=:fellowship";
          $stmt=$this->db->prepare($sql);
          $stmt->bindParam(':fellowship',$fellowship );
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
                        <th> Action </th>
                        <th>Members Name</th>
                        <th>Members Id</th>
                        <th>Members contact</th>
                        <th>Ministry</th>
                        <th>Unit</th>
                        <th>Email</th>
                        <th>gender</th>
                        <th>Fellowships</th>
                        <th>Marital Status</th>
                        <th>Residence</th>
                        <th>Birthday</th>
                        <th>State of Origin</th>
                        <th>Previous Church</th>
                        <th>Registered Date</th>
                        <th>Time registered</th>
                      </tr>
                    </thead>
                    <tbody>
      
            <?php foreach($data as $members){  ?>
              <div>
                          <tr class="trr" id="eachorder<?php echo  "{$members['id']}"; ?>">
                          <td> <?php echo $g++; ?>   </td>
                            <form action="" class="order-modify">
                              <td>
                                <!--<button class="editbtn">Edit</button>--><button data-identity="<?php echo  "{$members['id']}"; ?>" class="deletebtn">Delete</button>
                              </td>
                            </form>                     
                            <td> <?php echo  "{$members['firstname']} {$members['lastname']}"; ?> </td>
                            <td> <?php echo  "{$members['rollid']}"; ?> </td>
                            <td> <?php echo  "{$members['mobile']}"; ?> </td>
                            <td> <?php echo  "{$members['ministry']}"; ?> </td>
                            <td> <?php echo  "{$members['department']}"; ?> </td>
                            <td> <?php echo  "{$members['email']}"; ?> </td>
                            <td> <?php echo  "{$members['gender']}"; ?> </td>
                            <td> <?php echo  "{$members['fellowships']}"; ?> </td>
                            <td> <?php echo  "{$members['marital_status']}"; ?> </td>
                            <td> <?php echo  "{$members['residence']}"; ?> </td>
                            <td> <?php echo  "{$members['birthday']}"; ?> </td>
                            <td> <?php echo  "{$members['origin']}"; ?> </td>
                            <td> <?php echo  "{$members['previous_church']}"; ?> </td>
                            <td> <?php echo date("D,F j Y",  strtotime($members['date'])); ?> </td>
                            <td> <?php echo date("H:i a",  strtotime($members['date'])); ?> </td>
                          </tr>
                        </div>
                
            <?php } ?>
      
      
        <?php }else{ ?>
          <p>There are no family in this fellowship yet</p>
        
      <?php     }
     //   return  ob_get_clean();
              }  
   }
?>
