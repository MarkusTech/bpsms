<style>
    body {font-family: Helvetica, sans-serif;}
    table td,table th{
        padding: 3px !important;
    }
</style>
<?php 
$date_start = isset($_GET['date_start']) ? $_GET['date_start'] :  date("Y-m-d",strtotime(date("Y-m-d")." -7 days")) ;
$date_end = isset($_GET['date_end']) ? $_GET['date_end'] :  date("Y-m-d") ;
?>
<div class="card card-primary card-outline">
    <div class="card-header">
        <h5 class="card-title">Inventory Report</h5>
    </div>
    <div class="card-body">
        <form id="filter-form">
            <div class="row align-items-end">
                <div class="form-group col-md-3">
                    <label for="date_start">Date Start</label>
                    <input type="date" class="form-control form-control-sm" name="date_start" value="<?php echo date("Y-m-d",strtotime($date_start)) ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="date_start">Date End</label>
                    <input type="date" class="form-control form-control-sm" name="date_end" value="<?php echo date("Y-m-d",strtotime($date_end)) ?>">
                </div>
                <div class="form-group col-md-1">
                    <button class="btn btn-flat btn-block btn-primary btn-sm"><i class="fa fa-filter"></i> Filter</button>
                </div>
                <div class="form-group col-md-1">
                    <button class="btn btn-flat btn-block btn-success btn-sm" type="button" id="printBTN"><i class="fa fa-print"></i> Print</button>
                </div>
            </div>
        </form>
        <hr>
        <div id="printable">
            <div>
                <h4 class="text-center m-0"><?php echo $_settings->info('name') ?></h4>
                <h3 class="text-center m-0"><b>Product Inventory Report</b></h3>
                <p class="text-center m-0">Date Between <?php echo $date_start ?> and <?php echo $date_end ?></p>
                <hr>
            </div>
            <table class="table table-bordered">
                <colgroup>
                    <col width="10%">
                    <col width="20%">
                    <col width="20%">
                    <col width="40%">
                </colgroup>
                <thead>
                    <tr>
                    <th>#</th>
						<th>Date Created</th>
						<th>Brand</th>
						<th>Proudct</th>
						<th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                   $i = 1;
                   $qry = $conn->query("SELECT p.*,b.name as brand from `product_list` p inner join brand_list b on p.brand_id = b.id where p.delete_flag = 0 order by (p.`name`) asc ");
                   while($row = $qry->fetch_assoc()):
                       $row['stocks'] = $conn->query("SELECT SUM(quantity) FROM stock_list where product_id = '{$row['id']}'")->fetch_array()[0];
                       $row['out'] = $conn->query("SELECT SUM(quantity) FROM order_items where product_id = '{$row['id']}' and order_id in (SELECT id FROM order_list where `status` != 5) ")->fetch_array()[0];
                       $row['stocks'] = $row['stocks'] > 0 ? $row['stocks'] : 0;
                       $row['out'] = $row['out'] > 0 ? $row['out'] : 0;
                       $row['available'] = $row['stocks'] -$row['out'];
               ?>
                   <tr>
                       <td class="text-center"><?php echo $i++; ?></td>
                       <td><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></td>
                       <td><?php echo ucwords($row['brand']) ?></td>
                       <td><?php echo ucwords($row['name']) ?></td>
                       <td class="text-right"><?= number_format($row['available']) ?></td>
                      
                   </tr>
               <?php endwhile; ?>
                    
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<noscript>
    <style>
        .m-0{
            margin:0;
        }
        .text-center{
            text-align:center;
        }
        .text-right{
            text-align:right;
        }
        .table{
            border-collapse:collapse;
            width: 100%
        }
        .table tr,.table td,.table th{
            border:1px solid gray;
        }
    </style>
</noscript>
<script>
    $(function(){
        $('#filter-form').submit(function(e){
            e.preventDefault()
            location.href = "./?page=report/orders&date_start="+$('[name="date_start"]').val()+"&date_end="+$('[name="date_end"]').val()
        })

        $('#printBTN').click(function(){
            var rep = $('#printable').clone();
            var ns = $('noscript').clone().html();
            start_loader()
            rep.prepend(ns)
            var nw = window.document.open('','_blank','width=900,height=600')
                nw.document.write(rep.html())
                nw.document.close()
                nw.print()
                setTimeout(function(){
                    nw.close()
                    end_loader()
                },500)
        })
    })
</script>