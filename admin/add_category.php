<?php

include_once("includes/header.php");
include_once("includes/topnav.php");
include_once("includes/sidenav.php");

// include_once("view/add_cat_view.php");
include("program/function.php");
$obj = new blog();
if (isset($_POST['add_cat'])) {
    $return_msg = $obj->addpost($_POST);
    echo $return_msg;
}


?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Add Your Category Here</h3>
                </div>
                <?php
                if (isset($return_msg)){
                    echo $return_msg;
                }

                ?>
                <div class="card-body">
                    <form>
                        <div class="form-row dsf py-2">
                            <div class="col-md-12 pd-10">
                                <div class="form-group">
                                    <label class="small mb-1" for="cat_name">Category name</label>
                                    <input class="form-control py-2" name="cat_name" id="" type="text" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="cat_des">Category Description</label>
                                    <input class="form-control py-2" name="cat_des" id="" type="text" />
                                </div>
                                <div class="">
                                    <input name="add_cat" class="form-control btn btn-block btn-primary" style="margin-top: 20px;" type="submit" value="Add Category">
                                </div>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
<?php
include_once("includes/footer.php");
?>