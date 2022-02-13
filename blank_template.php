<?php
    include "inc/header.php";
?>

<div class="page-heading">
    <h3>Profile Statistics</h3>
</div>
<div class="page-content">
    <!-- Structure of the users page -->
    <?php

        //if(isset($_GET['do'])){
            //$do = $_GET['do'];
        //}else{
           // $do = 'manage';
        //}

        $do = isset($_GET['do']) ? $_GET['do'] : 'manage';

            if( $do = 'manage'){
                //view all user
            }
            if( $do = 'add'){
                 //add new user
            }

            if( $do = 'edit'){
                //edit user
            }

            if( $do = 'update'){
                //update user
            }

            if( $do = 'delete'){
                //delete user
            }






        //$do = 'manage';      //view all users
       // $do = 'add';        //add new user
        //$do = 'edit';       //edit user
       // $do = 'update';     //update user
        //$do = 'delete';     //delete user
        //defoult
        //$do = 'manage';     //view all users



    ?>
    <section class="row">
        <div class="col-12 col-lg-9">

        </div>  
    </section>
</div>

<?php
    include "inc/footer.php";
?>