<div class="content-wrapper">
    <link rel="stylesheet" href="<?php echo base_url("assets/admin/"); ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <script src="<?php echo base_url("assets/admin/"); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url("assets/admin/"); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <?php echo breadcrumb(lang("loans_borrower_list")); ?>
    <section class="content">
        <?php echo flashAlertMessage(); ?>
        <div class="nav-tabs-custom">
            <?php echo loanListTabs($type); ?>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <?php if ($type == 1): ?>
                        <?php $this->load->view('pending-loan-list'); ?>
                    <?php elseif ($type == 2): ?>
                        <?php $this->load->view('live-loan-list'); ?>
                    <?php else: ?>
                        <?php $this->load->view('complete-loan-list'); ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    $(document).ready(function(){
      $("body").on("click",".deleteAjax",function(){
          var table = $(this).data("table");
          var where = $(this).data("where");
          var id = $(this).data("id");
          var that = this;
          swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
          }).then((result) => {
            if (result.value == 1) {
              $.ajax({
                  url: site_url+"/common/deleteAjax",
                  type: "POST",
                  dataType:"text",
                  data: {table:table,where:where},
                  success: function(response){
                    if (response == 1) {
                      $("#"+table+"_"+id).remove();
                      // $(that).closest("tr").remove();
                      swal.fire(
                        'Deleted!',
                        'Row has been deleted.',
                        'success'
                      )
                    }else{
                      swal.fire(
                        'Not Deleted',
                        'Something went wrong.',
                        'error'
                      )
                    }
                  }
              });
            } else if (
              // Read more about handling dismissals
              result.dismiss === Swal.DismissReason.cancel
            ) {
              swal.fire(
                'Cancelled',
                'Your detail is safe :)',
                'error'
              )
            }
        });
      });
    });
    
</script>