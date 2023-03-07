<div class="content py-5 mt-5" style="height:100vh;background-color: #FBAB7E;
background-image: linear-gradient(7deg, #FBAB7E 0%, #F7CE68 22%, #97e084 41%, #ffffff 53%, #28cff1 75%, #e3e6a4 87%);">
<style>body {font-family: Helvetica, sans-serif;}</style>
    <div class="container">
        <h3><b>My Service Requests</b></h3>
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
                                <th>Date Requested</th>
                                <th>Mechanic</th>
                                <th>Service Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 1;
                            $mechanic = $conn->query("SELECT * FROM mechanics_list where id in (SELECT mechanic_id FROM `service_requests` where client_id = '{$_settings->userdata('id')}')");
                            $mechanic_arr = array_column($mechanic->fetch_all(MYSQLI_ASSOC),'name','id');
                            $orders = $conn->query("SELECT * FROM `service_requests` where client_id = '{$_settings->userdata('id')}' order by unix_timestamp(date_created) desc ");
                            while($row = $orders->fetch_assoc()):
                            ?>
                                <tr style="text-align:center;">
                                    <td><?= $i++ ?></td>
                                    <td><?= date("Y-m-d H:i", strtotime($row['date_created'])) ?></td>
                                    <td><p class="truncate-1 m-0"><?= isset($mechanic_arr[$row['mechanic_id']]) ? $mechanic_arr[$row['mechanic_id']] : "N/A" ?></p></td>
                                    <td><?= $row['service_type'] ?></td>
                                    <td>
                                        <?php if($row['status'] == 1): ?>
                                        <span class="badge badge-primary rounded-pill px-3">Confirmed</span>
                                        <?php elseif($row['status'] == 2): ?>
                                            <span class="badge badge-warning rounded-pill px-3">On-progress</span>
                                        <?php elseif($row['status'] == 3): ?>
                                            <span class="badge badge-success rounded-pill px-3">Done</span>
                                        <?php elseif($row['status'] == 4): ?>
                                            <span class="badge badge-danger rounded-pill px-3">Cancelled</span>
                                        <?php else: ?>
                                            <span class="badge badge-secondary rounded-pill px-3">Pending</span>
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
            uni_modal("Service Request Details","view_request.php?id="+$(this).attr('data-id'),"mid-large")
        })

        $('.table th, .table td').addClass("align-middle px-2 py-1")
		$('.table').dataTable();
		$('.table').dataTable();
    })
</script>