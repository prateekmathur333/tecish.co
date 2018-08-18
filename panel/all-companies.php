<?php 
    require_once 'header.php';

    $url = $config['URLS']['API_PATH'] . $config['URLS']['GET_ALL_COMPANIES'];
	//echo $url;
	$companies = json_decode(sendGetRequest($url, array()));
	//print_r($companies);
	$companies = $companies->data;

?>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">

<style>
    .dataTables_length {
        margin-left: 20px !important;
    }

    .dataTables_filter {
        margin-right: 20px !important;
    }

    .dataTables_info {
        margin-left: 20px !important;
    }

    .dataTables_paginate {
        margin-right: 20px !important;
    }

</style>

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                            if(isset($_GET['success']) and $_GET['success']==1) { ?>
                                <div class="alert alert-success">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span>Status Updated Successfully.</span>
                                </div>
                                <?php
                            }
                            else if (isset($_GET['success']) and $_GET['success']==0) { ?>
                                <div class="alert alert-danger">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span>Error while updating status.</span>
                                </div>
                        <?php
                        }
                        ?>
                        <div class="card">
                            <div class="header">
                                <h4 class="title">All Companies List</h4>
                                <p class="category">Here is the list of all the registered companies so far at Tecish.co</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped" id="all-companies">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Company Name</th>
                                    	<th>Email</th>
                                    	<th>Current Status</th>
                                        <th>Action</th>
                                        <th>Apply</th>
                                        <th>Profile</th>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                            $i = 0;
                                            foreach($companies as $company) { 
                                                $i = $i + 1;    
                                            ?>
                                                <tr>
                                                    <form action="update-company-status.php" method="post">
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $company->name; ?></td>
                                                        <td><?php echo $company->emailAdmin; ?></td>
                                                        <td><?php echo $company->status; ?></td>
                                                        <td>
                                                            <select name="status">
                                                                <option value="Approved">Approve</option>
                                                                <option value="Rejected">Reject</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <div class="text-center">
                                                                <input type="hidden" value="<?php echo $company->_id; ?>" name="companyId">
                                                                <button type="submit" class="btn btn-info btn-fill btn-wd">Update Status</button>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="text-center">
                                                                <a href="http://139.59.42.1/company-profile.php?companyId=<?php echo $company->_id; ?>"><button type="button" class="btn btn-info btn-fill btn-wd">View</button>
                                                            </div>
                                                        </td>
                                                    </form>
                                                </tr>
                                            
                                            <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php 
    require_once 'footer.php';
?>

<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js" type="text/javascript"></script>

<script>
    $(document).ready(function() {
        $('#all-companies').DataTable();
        $("#nav-company").addClass("active");
    } );
</script>