<?php

//namespace Users;

require '../Includes/db.inc.php';

   class Unit{
        private $db;
       
        public function __construct($conn)
        {
            $this->db= $conn;
        }

        //create new Unit
        public function createUnit($name, $creator, $created_at){  
               try{
                
                   $sql="INSERT INTO unit_ministry(name, added_by, created_at) VALUES (:Unit_name, :creator, :created)";
                     $stmt= $this->db->prepare($sql);
                      $result=  $stmt->execute([
                        ":Unit_name"=>$name,
                        ":creator" =>$creator,
                        ":created" =>$created_at
                   ]);
   
                   if($result){
                     return true;
                  }else{
                    //   echo "error while creating Unit";
                    return false;
                   }
               } catch(PDOException $e){
                   echo  $e->getMessage(); 
               }
    }   //create()
   
                                  //if produxtname already exist  //auth
public function IfUnitExisted($Unitname){
    try{
    
      $sql="SELECT * FROM unit_ministry WHERE name =:Unitname";
      $stmt= $this->db->prepare($sql);
      $stmt->bindParam(':Unitname', $Unitname);
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

  
    public function getunitMinistry()
    {             
      $sql="SELECT * FROM unit_Ministry";
      $stmt=$this->db->prepare($sql);
      $stmt->execute();
      return $stmt;
    }

    /*
  public function fetchUnitMembers($ministry){
    $sql="SELECT * FROM members WHERE ministry=:ministry";
    $stmt=$this->db->prepare($sql);
    $stmt->bindParam(':ministry',$ministry );
    $stmt->execute();
    $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
    $g=1;
    if ($stmt->rowCount() > 0){ 
   echo '
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
                  <th>Residence</th>
                  <th>Birthday</th>
                  <th>State of Origin</th>
                  <th>Previous Church</th>
                  <th>Registered Date</th>
                  <th>Time registered</th>
                </tr>
              </thead>
              <tbody>
';
       foreach($data as $members){ 
   echo '   <div>
                    <tr class="trr" id="eachorder'.  "{$members['id']}".'">
                    <td> '. $g++.'   </td>
                      <form action="" class="order-modify">
                        <td>
                          <!--<button class="editbtn">Edit</button>--><button data-identity="'.  "{$members['id']}".'" class="deletebtn">Delete</button>
                        </td>
                      </form>                     
                      <td> '.  "{$members['firstname']} {$members['lastname']}".' </td>
                      <td> '.  "{$members['rollid']}".' </td>
                      <td> '.  "{$members['mobile']}".' </td>
                      <td> '.  "{$members['ministry']}".' </td>
                      <td> '.  "{$members['unit']}".' </td>
                      <td> '.  "{$members['email']}".' </td>
                      <td> '.  "{$members['gender']}".' </td>
                      <td> '.  "{$members['residence']}".' </td>
                      <td> '.  "{$members['birthday']}".' </td>
                      <td> '.  "{$members['origin']}".' </td>
                      <td> '.  "{$members['previous_church']}".' </td>
                      <td> '. date("D,F j Y",  strtotime($members['date'])).' </td>
                      <td> '. date("H:i a",  strtotime($members['date'])).' </td>
                    </tr>
                  </div>
                  ';
          
       }


   }else{ 
     echo '<p>There are no members here</p> ';
  
     }
   // ob_get_clean();
        }
*/

        public function fetchUnitMembers($ministry){
          $sql="SELECT * FROM members WHERE ministry=:ministry";
          $stmt=$this->db->prepare($sql);
          $stmt->bindParam(':ministry',$ministry );
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
          <p>There are no members here</p>
        
      <?php     }
     //   return  ob_get_clean();
              }  
   }
?>
