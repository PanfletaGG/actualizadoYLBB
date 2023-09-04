<?php 
      session_start();

      $emailUser = $_SESSION['email'] ?? null;
      $nameUser = $_SESSION['name'] ?? null;
      $lastNameUser = $_SESSION['last_name'] ?? null;
      $rolUser = $_SESSION['role'] ?? null;

      require_once("../model/Seller.php");
      require_once("../model/Customer.php");

      //verificar si el rol es customer o seller e instanciar los objetos dependiendo de eso

      if ($emailUser !== null && $nameUser !== null && $lastNameUser !== null && $rolUser !== null) {
        if ($rolUser == 'seller') {
          $seller = new Seller($nameUser, $lastNameUser, $rolUser, $emailUser);
          $res = $seller->verifyAccount($emailUser);
          $role = $seller->getRole($emailUser);
        }else if($rolUser == 'customer') {
          $customer = new Customer($nameUser, $lastNameUser, $rolUser, $emailUser);
          $res = $customer->verifyAccount($emailUser);
          $role = $customer->getRole($emailUser);
        }
      }else {
        return;
      }
      
      
?>

<?php
if ($res == true && $role == 'seller') { ?>
  
  <script>
      let role = <?php echo json_encode($role); ?>;
      
  </script>
  <script>
    let userName = <?php echo json_encode($nameUser); ?>;
  </script>
<?php  
}else if($res == true && $role == 'customer'){ ?>
   <script>
      let role = <?php echo json_encode($role); ?>;
   </script> 
<?php } ?>