<?php
 require_once '../connection.php'; 
 require __DIR__ . '../../../vendor/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

 ?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta content="" name="descriptison">
    <meta content="" name="keywords">
    <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

    

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
      <link rel="stylesheet" href="assets/font-awesome/css/all.min.css">


    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="assets/DataTables/datatables.min.css" rel="stylesheet">
    <link href="assets/css/select2.min.css" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="assets/css/jquery-te-1.4.0.css">

    <title>Print Receipt</title>

    

</head>
        
 <?php 

    $plist = $conn->query("SELECT * FROM order_list where id =".$_GET['id']);
      while($row= $plist->fetch_assoc()):
     $pname_arr[$row['id']] = $row['date_created'];

 ?>

         <?php
              
 try {
    
    $connector = new WindowsPrintConnector("POS-58");
    $printer = new Printer($connector);

    $date = date("M d, Y",strtotime($row['date_created']));
    $ID = $row['ref_code'];

    $printer -> selectPrintMode(Printer::MODE_EMPHASIZED);
    $printer -> setTextSize(1, 2);
    $printer -> setJustification(Printer::JUSTIFY_CENTER);
    $printer -> text("Danday Motorparts\n"); 
    $printer -> text("&\n");
    $printer -> text("Accessories\n\n"); 
    $printer -> selectPrintMode();
    $printer -> setJustification(Printer::JUSTIFY_LEFT);       
    $printer -> text("================================");
    $printer -> text("Date: " .$date. "\n");
    $printer -> text("Reference code: " .$ID. "\n");
    
    
         
 $printer -> cut();
    
    /* Close printer */
    $printer -> close();
} catch (Exception $e) {
    echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
}
 ?>


 <?php endwhile; ?>
    
          </br>
                
               
    <?php 
      
      $preceipt = ("SELECT order_list.id, order_items.quantity, product_list.name, product_list.price, brand_list.name as brand, categories.category FROM order_list inner join order_items on order_items.order_id = order_list.id inner join product_list on order_items.product_id = product_list.id inner join brand_list on brand_list.id = product_list.brand_id inner join categories on categories.id = product_list.category_id where order_list.id =".$_GET['id']);
             $pdata = $conn->query($preceipt);
           while($row=$pdata->fetch_assoc()):
            $total = ($row['quantity'] * $row['price']);
            $total_amount = ($total+100);
                  
 ?>

           <?php
              
 try {
    
    $connector = new WindowsPrintConnector("POS-58");
    $printer = new Printer($connector);

    $name = ucwords($row['name']);
    $brand = ucwords($row['brand']);
    $category = ucwords($row['category']);
    $quantity = number_format($row['quantity']);
    $price = number_format($row['price'],2);

    
    $printer -> text("================================");
    $printer -> text("Product name: " .$name. "\n");
    $printer -> text("Brand: " .$brand. "\n");
    $printer -> text("Category: " .$category. "\n");
    $printer -> text("quantity/price: " .$quantity. " X P" .$price. "\n");
    $printer -> text("Amount: P" .$total. "\n");
    $printer -> text("================================");
    $printer -> text("Standard Shipping Fee: 100.00\n");
    $printer -> text("================================");
    $printer -> text("Amount: P" .$total_amount. "\n");


    
         
 $printer -> cut();
    
    /* Close printer */
    $printer -> close();
} catch (Exception $e) {
    echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
}
 ?> 

  <?php endwhile; ?>

  

  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/DataTables/datatables.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="assets/js/select2.min.js"></script>
    <script type="text/javascript" src="assets/font-awesome/js/all.min.js"></script>
  <script type="text/javascript" src="assets/js/jquery-te-1.4.0.min.js" charset="utf-8"></script>

  <script>
    function printContent(el) {
        var restorepage = $('body').html();
        var printcontent = $('#' + el).clone();
        $('body').empty().html(printcontent);
        window.print();
        $('body').html(restorepage);
    }
</script>
   
  </html>
 