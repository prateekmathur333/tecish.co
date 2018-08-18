<?php
    require_once 'header.php';
    $url = $config['URLS']['API_PATH'] . $config['URLS']['GET_BLOG'] . $_POST['blogId'];
	//echo $url;
	$blogs = json_decode(sendGetRequest($url, array()));
	//print_r($companies);
	$blog = $blogs->data[0];
?>

<style type="text/css">
    .checkbox .icons {
        top: 20px !important;
    }
</style>

<script src="ckeditor/ckeditor.js"></script>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-lg-8 col-md-7 col-md-offset-2">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Blog</h4>
                            </div>
                            <div class="content">
                                <form action="send-updated-blog.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" class="form-control border-input" value="<?php echo $blog->title; ?>" name="title" placeholder="Title">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Author</label>
                                                <input type="text" class="form-control border-input" value="<?php echo $blog->author; ?>" name="author" placeholder="Author">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Cover Image</label>
                                                <input type="file" class="form-control border-input" name="imgUrl" placeholder="Cover Image">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Category</label>
                                                <select name="category" class="form-control border-input">
                                                    <option value="">-- None --</option>
                                                    <?php					
                                                        $url =  $config['URLS']['API_PATH'] . $config['URLS']['GET_CAT'];
                                                                                
                                                        $data = sendGetRequest($url, array());
                                                        
                                                        $json = json_decode($data);
                                                    
                                                        $json = $json->data;
                                        
                                                        foreach($json as $obj) {
                                                            // echo "<script>console.log('vipul')</script>"  ;     
                                                            echo "<option value='" . $obj->_id . "'>" . $obj->name . "</option>";
                                                        }   
                                                        
                                                    ?>
                                                </select>
        
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Content</label>
                                                <textarea rows="10" class="form-control border-input ckeditor" name="content" placeholder="Start Writing here"><?php echo $blog->content; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Type</label>
                                                <select name="type" class="form-control border-input">
                                                    <option value="">-- None --</option>
                                                    <option value="TopItCompanies">Top IT Companies</option>
                                                    <option value="TechnicalBlog">Technical Blogs</option>
                                                </select>
        
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="padding-right: 15px !important;">
                                            <div class="form-group checkbox">
                                                <br>
                                                <label>Add To Home</label>
                                                <input type="checkbox" class="form-control" id="isHome" name="addToHome" placeholder="Add to Home">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <input type="hidden" name="onHome" value="false" id="onHome">
                                        <input type="hidden" name="blogId" value="<?php echo $_POST['blogId']; ?>">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Publish Blog</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
<?php
    require_once 'footer.php';
?>

<script type="text/javascript">
    function checkIsHome() {
        if($("#isHome").is(":checked")) {
            $("#onHome").val(true);
        }
        else {
            $("#onHome").val(false);
        }
    }
</script>