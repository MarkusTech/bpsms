<div class="content py-5 mt-5" style="height:100vh;background-color: #FBAB7E;
background-image: linear-gradient(7deg, #FBAB7E 0%, #F7CE68 22%, #97e084 41%, #ffffff 53%, #28cff1 75%, #e3e6a4 87%);">
<style>body {font-family: Helvetica, sans-serif;}</style>
    <div class="container">
        <h3><b>My Orders</b></h3>
        <hr>
        <div class="card card-outline card-success shadow rounded-0">
            <div class="card-body">
                <div class="container-fluid">
                    <table class="table table-stripped table-bordered">
                        <colgroup>
                            <col width="5%">
                            <col width="20%">
                            <col width="25%">
                            <col width="20%">
                            <col width="15%">
                            <col width="15%">
                        </colgroup>
                        <thead style="background-image: radial-gradient( circle 588px at 31.7% 40.2%,  rgba(225,200,239,1) 21.4%, rgba(163,225,233,1) 57.1% );">
                            <tr>
                                <th>#</th>
                                <th>Date Ordered</th>
                                <th>Ref. Code</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 1;
                            $orders = $conn->query("SELECT * FROM `order_list` where client_id = '{$_settings->userdata('id')}' order by unix_timestamp(date_created) desc ");
                            while($row = $orders->fetch_assoc()):
                            ?>
                                <tr style="text-align:center;">
                                    <td class="text-center"><?= $i++ ?></td>
                                    <td><?= date("Y-m-d H:i", strtotime($row['date_created'])) ?></td>
                                    <td><?= $row['ref_code'] ?></td>
                                    <td>&#8369; <?= number_format($row['total_amount']+100,2) ?></td>
                                    <td>
                                        <?php if($row['status'] == 0): ?>
                                            <span class="badge badge-secondary px-3 rounded-pill">Pending</span>
                                        <?php elseif($row['status'] == 1): ?>
                                            <span class="badge badge-primary px-3 rounded-pill">Packed</span>
                                        <?php elseif($row['status'] == 2): ?>
                                            <span class="badge badge-success px-3 rounded-pill">For Delivery</span>
                                        <?php elseif($row['status'] == 3): ?>
                                            <span class="badge badge-warning px-3 rounded-pill">On the Way</span>
                                        <?php elseif($row['status'] == 4): ?>
                                            <span class="badge badge-default bg-gradient-teal px-3 rounded-pill">Delivered</span>
                                        <?php else: ?>
                                            <span class="badge badge-danger px-3 rounded-pill">Cancelled</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-flat btn-sm btn-default border view_data" type="button" data-id="<?= $row['id'] ?>"><i class="fa fa-eye"></i> View</button>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('.view_data').click(function(){
            uni_modal("Order Details","view_orders.php?id="+$(this).attr('data-id'),"large")
        })

        $(function(){
            $('#update_status').click(function(){
                uni_modal("Update Order Status","orders/update_status.php?id=<?= isset($id) ? $id :'' ?>")
            })
            $('#btn-cancel').click(function(){
                _conf("Are you sure to cancel this order?","cancel_order",[])
            })
            $('#delete_order').click(function(){
                _conf("Are you sure to delete this order permanently?","delete_order",[])
            })
        })
        function delete_order(){
            start_loader();
            $.ajax({
                url:_base_url_+'classes/master.php?f=delete_order',
                data:{id : "<?= isset($id) ? $id : '' ?>"},
                method:'POST',
                dataType:'json',
                error:err=>{
                    console.error(err)
                    alert_toast('An error occurred.','error')
                    end_loader()
                },
                success:function(resp){
                    if(resp.status == 'success'){
                        location.replace('./?page=orders')
                    }else if(!!resp.msg){
                        alert_toast(resp.msg,'error')
                    }else{
                        alert_toast('An error occurred.','error')
                    }
                    end_loader();
                }
            })
        }

        $('.table th, .table td').addClass("align-middle px-2 py-1")
		$('.table').dataTable();
		$('.table').dataTable();
    })
</script>