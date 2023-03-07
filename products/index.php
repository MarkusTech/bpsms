<?php
$search = isset($_GET['search']) ? $_GET['search'] : '';
$brand_filter = isset($_GET['brand_filter']) ? explode(",",$_GET['brand_filter']) : 'all';
$category_filter = isset($_GET['category_filter']) ? explode(",",$_GET['category_filter']) : 'all';

$start_price = isset($_GET['start_price']) ? $_GET['start_price']:'';
$end_price = isset($_GET['end_price']) ? $_GET['end_price']:'';
?>

 <style>
     #page-p{
        border-bottom: 4px solid #C3F7FC;
    }
 </style>                    

<div class="content py-5 mt-5" style="background-color: #FBAB7E;
background-image: linear-gradient(7deg, #FBAB7E 0%, #F7CE68 22%, #97e084 41%, #ffffff 53%, #28cff1 75%, #e3e6a4 87%);">
    <div class="container">
    <style>body {font-family: Helvetica, sans-serif;}</style>
    
        <div class="row">
            <div class="col-md-4 mt-3">
                <h4 class="text-muted"> <button style="background-image:linear-gradient( 135deg, #72EDF2 10%, #5151E5 100%);outline:0;border:0;" class="btn btn-flat btn-block btn-sm" data-toggle="collapse" data-target="#demo">Filter <i class="fa fa-filter"></i> </button></button>

<div id="demo" class="collapse">
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4" style="background-color: #8EC5FC;
                    background-image: linear-gradient(0deg, #8EC5FC 0%, #c3f7fc 24%, #ffffff 49%, #c3f7fc 75%, #8ec5fc 100%);">
                    <div class="card-header">
                        <h5>Price Range</h5>
                    </div>
                    <div class="card-body">

                        <form action="" id="price_range">
                            <div class="row">
                                <div class="col-md-4">
                                    <h6 ><label for="">Min.Price</label><h6>
                                    <input type="text" name="start_price" id="s_price" value="<?php if(isset($_GET['start_price'])){echo $_GET['start_price']; }else{echo "100";} ?>" class="form-control" required>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <h6 ><label for="">Max.Price</label><h6>
                                    <input type="text" name="end_price" id="e_price" value="<?php if(isset($_GET['end_price'])){echo $_GET['end_price']; }else{echo "900";} ?>" class="form-control" required>
                                </div>
                                <div class="col-md-1 mt-1">
                                    <label for=""></label>
                                    <button class="btn btn-outline-thirdary"><i class="fa fa-search"></i> </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        
</div></h3> 
                <hr>
                
                <div class="card card-outline shadow card-primary rounded-0" style=" background: #A1FFCE;
                        background: -webkit-linear-gradient(to bottom, #FAFFD1, #A1FFCE);
                        background: linear-gradient(to bottom, #FAFFD1, #A1FFCE);">
                    <div class="card-header">
                        <h3 class="card-title"><b>Brands</b></h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-action" style="background-image: linear-gradient( 135deg, #FFCF71 10%, #2376DD 100%);">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="brand_all" value="all" <?= !is_array($brand_filter) && $brand_filter =='all' ? 'checked' : '' ?>>
                                    <label for="brand_all" class="custom-control-label w-100">All</label>
                                </div>
                            </li>
                            <?php 
                                $brands = $conn->query("SELECT * FROM `brand_list` where `delete_flag` =0 and `status` = 1 order by `name` asc");
                                while($row = $brands->fetch_assoc()):
                            ?>
                                <li class="list-group-item list-group-item" style="background-image: linear-gradient( 135deg, #FFCF71 10%, #2376DD 100%);">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input brand_filter" type="checkbox" id="brand_<?= $row['id'] ?>" value="<?= $row['id'] ?>" <?= ((is_array($brand_filter) && in_array($row['id'],$brand_filter)) || (!is_array($brand_filter) && $brand_filter =='all')) ? 'checked' : '' ?>>
                                        <label for="brand_<?= $row['id'] ?>" class="custom-control-label w-100"><?= $row['name'] ?></label>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
                <div class="card card-outline shadow card-primary rounded-0" 
                style=" background: #A1FFCE;
                        background: -webkit-linear-gradient(to bottom, #FAFFD1, #A1FFCE);
                        background: linear-gradient(to bottom, #FAFFD1, #A1FFCE);">
                    <div class="card-header">
                        <h3 class="card-title"><b>Categories</b></h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-action" style="background-image: linear-gradient( 135deg, #FAD7A1 10%, #E96D71 100%);">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="category_all" value="all" <?= !is_array($category_filter) && $category_filter =='all' ? 'checked' : '' ?>>
                                    <label for="category_all" class="custom-control-label w-100">All</label>
                                </div>
                            </li>
                            <?php 
                                $categories = $conn->query("SELECT * FROM `categories` where `delete_flag` =0 and `status` = 1 order by `category` asc");
                                while($row = $categories->fetch_assoc()):
                            ?>
                                <li class="list-group-item list-group-item" style="background-image: linear-gradient( 135deg, #FAD7A1 10%, #E96D71 100%);">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input category_filter" type="checkbox" id="category_<?= $row['id'] ?>" value="<?= $row['id'] ?>" <?= ((is_array($category_filter) && in_array($row['id'],$category_filter)) || (!is_array($category_filter) && $category_filter =='all')) ? 'checked' : '' ?>>
                                        <label for="category_<?= $row['id'] ?>" class="custom-control-label w-100"><?= $row['category'] ?></label>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-8 mt-3">
                <div class="row">
                    <div class="col-md-12">
                        <form action="" id="search_prod">
                            <div class="input-group">
                                <input type="search" name="search" value="<?= $search ?>" class="form-control" placeholder="Search Product...">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row row-cols-sm-1 row-cols-md-2 row-cols-xl-3 mt-3" style="display: flex;flex-direction: row;height:55.6rem;overflow-y: scroll;">

                    <div id="msg" style="width:100%;"></div>
                    <?php
                        $where="";
                            if(is_array($brand_filter)){
                                $where.=" and p.brand_id in (".(implode(',',$brand_filter)).") ";
                            }
                            if(is_array($category_filter)){
                                $where.=" and p.category_id in (".(implode(',',$category_filter)).") ";
                            }
                            if(!empty($search)){
                                $where.=" and (p.name LIKE '%{$search}%' or p.description LIKE '%{$search}%' or b.name LIKE '%{$search}%' or c.category LIKE '%{$search}%') ";
                            }
                            if(!empty($start_price && $start_price)){
                                $where.="and p.price between $start_price and $end_price";
                            }

                                $products = $conn->query("SELECT p.*,b.name as brand, c.category FROM `product_list` p inner join brand_list b on p.brand_id = b.id inner join `categories` c on p.category_id = c.id where p.delete_flag = 0 and p.status = 1 {$where} order by RAND()");
                                while($row= $products->fetch_assoc()):
                            ?>
                                <a class="col px-1 py-2 text-decoration-none text-dark product-item" href ="./?p=products/view_product&id=<?= $row['id'] ?>">
                                    <div class="card rounded-0 shadow">
                                        <div class="product-img-holder overflow-hidden position-relative">
                                            <img src="<?= validate_image($row['image_path']) ?>" alt="Product Image" class="img-top"/>
                                            <span class="position-absolute price-tag rounded-pill bg-gradient-primary text-light px-3">
                                                <i class="fa fa-tags"></i> <b>&#8369;<?= number_format($row['price'],2) ?></b>
                                            </span>
                                        </div>
                                        <div class="card-body border-top" style="background-image: linear-gradient( 135deg, #90F7EC 10%, #32CCBC 100%);">
                                            <h4 class="card-title my-0"><b><?= $row['name'] ?></b></h4><br>
                                            <small class="text-muted"><?= $row['brand'] ?></small><br>
                                            <small class="text-muted"><?= $row['category'] ?></small>
                                            <p class="m-0 truncate-5"><?= strip_tags(html_entity_decode($row['description'])) ?></p>
                                        </div>
                                    </div>
                                </a>
                                <script>
                                        $("#msg").hide();
                                </script>
                            <?php endwhile; ?>
                        </div>
                        <?php if($products->num_rows <= 0): ?>
                            <script>
                                document.getElementById('msg').innerHTML='<div class="w-100 d-flex justify-content-center align-items-center" style="min-height:10em"><center><em class="text-muted"><h5>No data!</h5></em></center></div>';
                            </script>
                        <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        if($('.brand_filter').length == $('.brand_filter:checked').length){
            $('#brand_all').prop("checked",true)
        }else{
            $('#brand_all').prop("checked",false)
        }
        if($('.category_filter').length == $('.category_filter:checked').length){
            $('#category_all').prop("checked",true)
        }else{
            $('#category_all').prop("checked",false)
        }
        $('#brand_all').change(function(){
            if($(this).is(':checked') ==true){
                $('.brand_filter').prop("checked",true).trigger('change')
            }
        })
        $('#category_all').change(function(){
            if($(this).is(':checked') ==true){
                $('.category_filter').prop("checked",true).trigger('change')
            }
        })

        //get price range
        $('#price_range').submit(function(e){
            e.preventDefault()
            var start_price = $('#s_price').val();
            var end_price = $('#e_price').val();
            location.href="./?p=products"+(start_price != '' ? "&start_price="+start_price : "")+(end_price != '' ? "&end_price="+end_price : "");
        })
        


        $('#search_prod').submit(function(e){
            e.preventDefault()
            var search = $(this).serialize()
            location.href="./?p=products"+(search != '' ? "&"+search : "")+"<?= isset($_GET['brand_filter']) ? "&brand_filter=".$_GET['brand_filter'] : "" ?><?= isset($_GET['category_filter']) ? "&category_filter=".$_GET['category_filter'] : "" ?>";

        })
        $('.brand_filter').change(function(){
            var brand_ids = [];
            if($('.brand_filter').length == $('.brand_filter:checked').length){
                $('#brand_all').prop("checked",true)
            }else{
                $('#brand_all').prop("checked",false)
                $('.brand_filter:checked').each(function(){
                    brand_ids.push($(this).val())
                })  
                brand_ids = brand_ids.join(",")
            }
            
            location.href="./?p=products"+(brand_ids.length > 0 ? "&brand_filter="+brand_ids : "")+"<?= isset($_GET['category_filter']) ? "&category_filter=".$_GET['category_filter'] : "" ?><?= isset($_GET['search']) ? "&search=".$_GET['search'] : "" ?>";
        })
        $('.category_filter').change(function(){
            var category_ids = [];
            if($('.category_filter').length == $('.category_filter:checked').length){
                $('#category_all').prop("checked",true)
            }else{
                $('#category_all').prop("checked",false)
                $('.category_filter:checked').each(function(){
                    category_ids.push($(this).val())
                }) 
                category_ids = category_ids.join(",")
            }
             
            location.href="./?p=products"+(category_ids.length > 0 ? "&category_filter="+category_ids : "")+"<?= isset($_GET['brand_filter']) ? "&brand_filter=".$_GET['brand_filter'] : "" ?><?= isset($_GET['search']) ? "&search=".$_GET['search'] : "" ?>";
        })
    })
</script>