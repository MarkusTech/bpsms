 <?php 
 include "config.php";
if(isset($_GET['id'])){
    $qry = $conn->query("SELECT * FROM `order_list` where id = '{$_GET['id']}'");
    if($qry->num_rows > 0){
        foreach($qry->fetch_array() as $k => $v){
            if(!is_numeric($k))
            $$k = $v;
        }
    }
}
?>
 <div class="container-fluid" id="vieworder">
            <div class="row">
                <div class="col-md-6">
                    <label for="" class="text-muted">Reference Code</label>
                    <div class="ml-3"><b><?= isset($ref_code) ? $ref_code : "N/A" ?></b></div>
                </div>
                <div class="col-md-6">
                    <label for="" class="text-muted">Date Ordered</label>
                    <div class="ml-3"><b><?= isset($date_created) ? date("M d, Y h:i A", strtotime($date_created)) : "N/A" ?></b></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="" class="text-muted">Status</label>
                    <div class="ml-3">
                        <?php if(isset($status)): ?>
                            <?php if($status == 0): ?>
                                <span class="badge badge-secondary px-3 rounded-pill">Pending</span>
                            <?php elseif($status == 1): ?>
                                <span class="badge badge-primary px-3 rounded-pill">Packed</span>
                            <?php elseif($status == 2): ?>
                                <span class="badge badge-success px-3 rounded-pill">For Delivery</span>
                            <?php elseif($status == 3): ?>
                                <span class="badge badge-warning px-3 rounded-pill">On the Way</span>
                            <?php elseif($status == 4): ?>
                                <span class="badge badge-default bg-gradient-teal px-3 rounded-pill">Delivered</span>
                            <?php else: ?>
                                <span class="badge badge-danger px-3 rounded-pill">Cancelled</span>
                            <?php endif; ?>
                        <?php else: ?>
                            N/A
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="clear-fix my-2"></div>
            <div class="row">
                <div class="col-12">
                <div class="w-100" id="order-list">
                        <?php 
                        $total = 0;
                        if(isset($id)):
                        $order_item = $conn->query("SELECT o.*,p.name, p.price, p.image_path,b.name as brand, cc.category FROM `order_items` o inner join product_list p on o.product_id = p.id inner join brand_list b on p.brand_id = b.id inner join categories cc on p.category_id = cc.id where o.order_id = '{$id}' order by p.name asc");
                        while($row = $order_item->fetch_assoc()):
                            $total += ($row['quantity'] * $row['price']);
                        ?>
                        <div class="d-flex align-items-center w-100 border cart-item" data-id="<?= $row['id'] ?>">
                            <div class="col-auto flex-grow-1 flex-shrink-1 px-1 py-1">
                                <div class="d-flex align-items-center w-100 ">
                                    <img src="<?= validate_image($row['image_path']) ?>" class="img-thumbnail product-img" style="width: 8rem;height: 8rem;" >
                                    <div class="col-auto flex-grow-1 flex-shrink-1">
                                        <a href="./?p=products/view_product&id=<?= $row['product_id'] ?>" class="h4 text-muted" target="_blank">
                                            <p class="text-truncate-1 m-0"><?= $row['name'] ?></p>
                                        </a>
                                        <small><?= $row['brand'] ?></small><br>
                                        <small><?= $row['category'] ?></small><br>
                                        <div class="d-flex align-items-center w-100 mb-1">
                                            <span><?= number_format($row['quantity']) ?></span>
                                            <span class="ml-2">X &#8369;<?= number_format($row['price'],2) ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto text-right">
                                <h3><b>&#8369;<?= number_format($row['quantity'] * $row['price'],2) ?></b></h3>
                                
                            </div>
                        </div>
                        <?php 
                            endwhile; 
                            endif;
                        ?>
                        <?php if(isset($order_item) && $order_item->num_rows <= 0): ?>
                        <div class="d-flex align-items-center w-100 border justify-content-center">
                            <div class="col-12 flex-grow-1 flex-shrink-1 px-1 py-1">
                                <small class="text-muted">No Data</small>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="d-flex align-items-center w-100 border">
                            <div class="col-auto flex-grow-1 flex-shrink-1 px-1 py-1">
                                   <i> <h6 class="text-right">Standard Shipping Fee: &#8369;100.00</h6></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-center w-100">
                        <div class="col-auto flex-grow-1 flex-shrink-1 px-1 py-1 text-right">
                            <h3>TOTAL</h3>
                        </div>
                        <div class="col-auto flex-grow-1 flex-shrink-1 px-1 py-1 text-right">
                            <h3>&#8369;<?= number_format($total+100,2) ?></h3>
                        </div>
                    </div>
            </div>
            <div class="clear-fix my-2"></div>
        </div>


        <form action="" id="update_myorder">
            <input type="hidden" name="id" value="<?= isset($id) ? $id : "" ?>">
            <div class="form-group">
                <label for="status" class="control-label">Order Status</label>
                <select name="status" id="status" class="custom-select form-control-sm">
                    <option value="0" disabled <?= isset($status) && $status == 0 ? 'selected' : "" ?>>Please Select if you want to cancel your order</option>
                    <option value="5" <?= isset($status) && $status == 5 ? 'selected' : "" ?>>Cancel this Order</option>
                </select>
            </div>
        </form>


<script>
    $(function(){
        $('#update_myorder').submit(function(e){
            e.preventDefault();
            var _this = $(this)
             $('.err-msg').remove();
            start_loader();
            $.ajax({
                url:_base_url_+"classes/Master.php?f=update_order_status",
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
                error:err=>{
                    console.log(err)
                    alert_toast("An error occured",'error');
                    end_loader();
                },
                success:function(resp){
                    if(typeof resp =='object' && resp.status == 'success'){
                        location.reload();
                    }else if(resp.status == 'failed' && !!resp.msg){
                        var el = $('<div>')
                            el.addClass("alert alert-danger err-msg").text(resp.msg)
                            _this.prepend(el)
                            el.show('slow')
                            $("html, body").animate({ scrollTop: _this.closest('.card').offset().top }, "fast");
                            end_loader()
                    }else{
                        alert_toast("An error occured",'error');
                        end_loader();
                        console.log(resp)
                    }
                }
            })
        })
    })
</script>