<?php 

    require_once 'header.php';

    $url = $config['URLS']['API_PATH'] . $config['URLS']['GET_ALL_BLOGS'];
	//echo $url;
	$blogs = json_decode(sendGetRequest($url, array()));
	//print_r($companies);
	$blogs = $blogs->data;

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
                                    	<th>Blog Title</th>
                                    	<th>Category</th>
                                    	<th>Date</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                            $i = 0;
                                            foreach($blogs as $blog) { 
                                                $i = $i + 1;    
                                            ?>
                                                <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $blog->title; ?></td>
                                                        <td><?php echo $blog->category->name; ?></td>
                                                        <td><?php echo substr($blog->createdAt, 0, 10); ?></td>
                                                        <td>
                                                            <form action="edit-blog.php" method="post">
                                                                <div class="text-center">
                                                                    <input type="hidden" value="<?php echo $blog->_id; ?>" name="blogId">
                                                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Edit</button>
                                                                </div>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <form action="delete-blog.php" method="post">
                                                                <div class="text-center">
                                                                    <input type="hidden" value="<?php echo $blog->_id; ?>" name="blogId">
                                                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Delete</button>
                                                                </div>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <div class="text-center">
                                                                <a href="http://139.59.42.1/blog-detail.php?blogId=<?php echo $blog->_id; ?>"><button type="button" class="btn btn-info btn-fill btn-wd">View</button>
                                                            </div>
                                                        </td>
                                                    
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