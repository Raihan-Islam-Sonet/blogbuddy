<?php

include "inc/header.php";
?>

<div class="page-heading">
    <h3>Profile Statistics</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Profile Views</h6>
                                    <h6 class="font-extrabold mb-0">112.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Followers</h6>
                                    <h6 class="font-extrabold mb-0">183.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Following</h6>
                                    <h6 class="font-extrabold mb-0">80.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Saved Post</h6>
                                    <h6 class="font-extrabold mb-0">112</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-xl-4">
                    <!-- Insert Category -->
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add new category</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical" method="POST">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label for="first-name-icon">Category Name</label>
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control"
                                                            placeholder="Type category name" id="first-name-icon"
                                                            name="cat_name">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-person"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">

                                                <div class="form-group has-icon-left">
                                                    <label for="exampleFormControlTextarea1"
                                                        class="form-label">Description</label>
                                                    <textarea class="form-control" placeholder="Type your description"
                                                        name="cat_description" id="exampleFormControlTextarea1"
                                                        rows="3"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1"
                                                    name="cat_submit">Submit</button>
                                                <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- Insert category value into the database -->
                                <?php
                            
                            if(isset($_POST['cat_submit'])){
                               $cat_name = $_POST['cat_name'];
                               $cat_description = $_POST['cat_description'];

                            $query2 = "INSERT INTO category (c_name, c_desc) VALUES('$cat_name', '$cat_description')";
                            $result2 = mysqli_query($db,$query2);

                            if($result2){
                                header('Location: category.php');
                                //echo "value inserted sucessfully";
                            }else{
                                //echo" category add error";
                            }

                            }


                            ?>

                            </div>
                        </div>
                    </div>

                    <!-- Update Category -->
                    <?php
                            if(isset($_GET['edit_id'])){
                                $edit_id = $_GET['edit_id'];

                                $query4 = "SELECT * FROM category WHERE c_id = '$edit_id'";
                                $result4 = mysqli_query($db,$query4);
                                while($row = mysqli_fetch_assoc($result4)){
                                    $c_id =  $row['c_id'];
                                    $c_name = $row['c_name'];
                                    $c_desc = $row['c_desc'];
                                }
                        ?>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Update category</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical" method="POST">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label for="first-name-icon">Category Name</label>
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control"
                                                            placeholder="Type category name" id="first-name-icon"
                                                            name="cat_name" value="<?php echo $c_name;?>">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-person"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">

                                                <div class="form-group has-icon-left">
                                                    <label for="exampleFormControlTextarea1"
                                                        class="form-label">Description</label>
                                                    <textarea class="form-control" placeholder="Type your description"
                                                        name="cat_description" id="exampleFormControlTextarea1"
                                                        value="<?php echo $c_desc;?>"
                                                        rows="3"><?php echo $c_desc;?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1"
                                                    name="cat_update">Submit</button>
                                                <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <!-- Update category -->
                                <?php

                                            if(isset($_POST['cat_update'])){
                                              $cat_name =  $_POST['cat_name'];
                                              $cat_description =  $_POST['cat_description'];
                                              $query5 = "UPDATE category SET c_name = '$cat_name',c_desc = '$cat_description' WHERE c_id = '$c_id'";

                                              $result5 = mysqli_query($db,$query5);
                                              if($result5){
                                                header('Location: category.php');
                                              }
                                              else{
                                                  echo"Category Update Error!";
                                              }
                                            }

                                        ?>


                            </div>
                        </div>
                    </div>


                    <?php
                            }
                        ?>

                </div>
                <div class="col-12 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Categories</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-lg">
                                    <thead>
                                        <tr>
                                            <th>Serial No</th>
                                            <th>Category Name</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Read category info from database -->
                                        <?php
                                    // step 01: Query language
                                    // step 02: Query > database
                                    // step 03: Feedback
                                    $query = "SELECT * FROM category";
                                    $result = mysqli_query($db,$query);
                                    $count = 0;
                                    while($row = mysqli_fetch_assoc($result)){
                                        $c_id =  $row['c_id'];
                                        $c_name = $row['c_name'];
                                        $c_desc = $row['c_desc'];
                                        $count++;
                                    ?>

                                        <tr>
                                            <td> <?php echo $count; ?> </td>
                                            <td class="col-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-md">
                                                        <img src="assets/images/faces/5.jpg">
                                                    </div>
                                                    <p class="font-bold ms-3 mb-0"><?php echo $c_name; ?></p>
                                                </div>
                                            </td>
                                            <td class="col-auto">
                                                <p class=" mb-0"> <?php echo $c_desc; ?> </p>
                                            </td>
                                            <td>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                    <i class="bi bi-trash text-danger " type="button"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#delete<?php echo $c_id;?>"></i>
                                                </a>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
                                                    href="category.php?edit_id=<?php echo $c_id;?>">
                                                    <i class="bi bi-pencil-square text-success ms-2"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <!--Danger theme Modal -->
                                        <div class="modal fade text-left" id="delete<?php echo $c_id;?>" tabindex="-1"
                                            role="dialog" aria-labelledby="myModalLabel120" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger">
                                                        <h5 class="modal-title white" id="myModalLabel120"> Delete
                                                            Category </h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <img src="assets/images/delete.png" alt="" srcset=""
                                                            width="200">
                                                    </div>
                                                    <div class="modal-footer ">
                                                        <button type="button" class="btn btn-light-secondary"
                                                            data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Close</span>
                                                        </button>
                                                        <a type="button" class="btn btn-danger ml-1"
                                                            href="category.php?delete_id=<?php echo $c_id;?>">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Accept</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


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
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-5">
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="../admin/assets/images/users_img/<?php echo $_SESSION['u_photo'];?>" alt="">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold"> <?php echo $_SESSION['u_name'];?> </h5>
                                <h6 class="text-muted mb-0"><?php echo $_SESSION['u_email'];?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">

            </div>
        </div>
    </section>
    <!-- Delete category info -->
    <?php
        if(isset($_GET['delete_id'])){
            $delete_id = $_GET['delete_id'];

            //Table Name
            //Primary Key
            //Delete Id
            // Redirect Url

            $table = 'category';
            $key = 'c_id';
            $d_id = $delete_id;
            $url = 'category.php';

           delete($table,$key,$d_id,$url);
        }

    ?>

</div>




<?php

include "inc/footer.php";
?>

50