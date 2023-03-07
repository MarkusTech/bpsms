<h1 class="">Welcome to <?php echo $_settings->info('name') ?></h1>
<hr>
<div class="row">
  
          <div class="col-12 col-sm-6 col-md-3">
            <div class="shadow info-box">
              <span class="info-box-icon bg-gradient-dark elevation-1"><i class="fas fa-copyright"></i></span>

              <div class="info-box-content">
              <a href=?page=maintenance/brands>Available na Brands</a>
                <span class="info-box-number">
                  <?php 
                    $inv = $conn->query("SELECT count(id) as total FROM brand_list where delete_flag = 0 ")->fetch_assoc()['total'];
                    echo number_format($inv);
                  ?>
                  <?php ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="shadow info-box">
              <span class="info-box-icon bg-light elevation-1"><i class="fas fa-th-list"></i></span>

              <div class="info-box-content">
              <a href=?page=maintenance/category>Total Category</a>
                <span class="info-box-number">
                  <?php 
                    $inv = $conn->query("SELECT count(id) as total FROM categories where delete_flag = 0 ")->fetch_assoc()['total'];
                    echo number_format($inv);
                  ?>
                  <?php ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
         
          <div class="col-12 col-sm-6 col-md-3">
            <div class="shadow info-box mb-3">
              <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
              <a href=?page=clients>Registered Client</a>
                <span class="info-box-number">
                <?php 
                    $services = $conn->query("SELECT sum(id) as total FROM `client_list` where status = 1 and delete_flag = 0 ")->fetch_assoc()['total'];
                    echo number_format($services);
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="shadow info-box mb-3">
              <span class="info-box-icon bg-gradient-secondary elevation-1"><i class="fas fa-tasks"></i></span>

              <div class="info-box-content">
              <a href=?page=orders>Pending orders</a>
                <span class="info-box-number">
                <?php 
                    $services = $conn->query("SELECT sum(id) as total FROM `order_list` where status = 0 ")->fetch_assoc()['total'];
                    echo number_format($services);
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="shadow info-box mb-3">
              <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-tasks"></i></span>

              <div class="info-box-content">
              <a href=?page=orders>Confirmed Orders</a>
                <span class="info-box-number">
                <?php 
                    $services = $conn->query("SELECT sum(id) as total FROM `order_list` where status = 1 ")->fetch_assoc()['total'];
                    echo number_format($services);
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="shadow info-box mb-3">
              <span class="info-box-icon bg-gradient-success elevation-1"><i class="fas fa-tasks"></i></span>

              <div class="info-box-content">
              <a href=?page=orders>Order For Delivery</a>
                <span class="info-box-number">
                <?php 
                    $services = $conn->query("SELECT sum(id) as total FROM `order_list` where status = 2 ")->fetch_assoc()['total'];
                    echo number_format($services);
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="shadow info-box mb-3">
              <span class="info-box-icon bg-gradient-warning elevation-1"><i class="fas fa-tasks"></i></span>

              <div class="info-box-content">
              <a href=?page=orders>On the Way Orders</a>
                <span class="info-box-number">
                <?php 
                    $services = $conn->query("SELECT sum(id) as total FROM `order_list` where status = 3 ")->fetch_assoc()['total'];
                    echo number_format($services);
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="shadow info-box mb-3">
              <span class="info-box-icon bg-gradient-success elevation-1"><i class="fas fa-tasks"></i></span>

              <div class="info-box-content">
              <a href=?page=orders>Delivered orders</a>
                <span class="info-box-number">
                <?php 
                    $services = $conn->query("SELECT sum(id) as total FROM `order_list` where status = 4 ")->fetch_assoc()['total'];
                    echo number_format($services);
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="shadow info-box mb-3">
              <span class="info-box-icon bg-gradient-danger elevation-1"><i class="fas fa-tasks"></i></span>

              <div class="info-box-content">
              <a href=?page=orders>Cancelled orders</a>
                <span class="info-box-number">
                <?php 
                    $services = $conn->query("SELECT sum(id) as total FROM `order_list` where status =5 ")->fetch_assoc()['total'];
                    echo number_format($services);
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="shadow info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-file-invoice"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Finished Requests</span>
                <span class="info-box-number">
                <?php 
                    $services = $conn->query("SELECT sum(id) as total FROM `service_requests` where status = 3 ")->fetch_assoc()['total'];
                    echo number_format($services);
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>
