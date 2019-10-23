<?php include "include/header.php"; ?>

<div class="container mt-5">
    <div class="row mb-2">
        <div class="col-lg-12 text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userModal" id="modal_button"> 
            Add New</button>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
             <div id="result" class="table-responsive"> 
                <!-- Data will load under this tag!-->
            </div>
        </div>
    </div>
</div>



<!-- Include Modal -->
    <?php include "include/modal.php"; ?>
<!-- Include Modal -->

<?php include "include/footer.php"; ?>