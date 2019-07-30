<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?php echo lang("loans_borrower_list"); ?></h3>
    </div>
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th><?php echo lang("loan_id"); ?></th>
                    <th><?php echo lang("member_id"); ?></th>
                    <th><?php echo lang("branch"); ?></th>
                    <th><?php echo lang('borrower_name'); ?></th>
                    <th><?php echo lang("loan_provided_date"); ?></th>
                    <th><?php echo lang("approve_loan"); ?></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#example1').DataTable({
                // Processing indicator
                "processing": true,
                // DataTables server-side processing mode
                "serverSide": true,
                // Initial no order.
                "order": [],
                // Load data from an Ajax source
                "ajax": {
                    "url": "<?php echo base_url('loan/getLoanProvidersLists'); ?>",
                    "type": "POST",
                    "data": {loan_status:<?php echo $type; ?>}
                },
                "columns": [
                    { "data": function(e,k){
                        var value = JSON.stringify({member_id:e.member_id,id:e.id});
                        return "<a href='javascript:void(0)' class='context-menu-one' data-value='"+value+"'>"+e.id+"</a>";
                    } },
                    { "data": "member_id"},
                    { "data": "branch" },
                    { "data": "borrower_name" },
                    { "data": "date" },
                    { "data": function(e){
                        var html = '';
                        html = '<input type="checkbox" name="loan_status" class="loan_status" value="2" data-id="'+e.id+'" />';
                        return html;
                    } },
                ],
                "fnCreatedRow": function( nRow, aData, iDataIndex ) {
                    var id = "loans_"+aData.id;
                    $(nRow).attr('id', id);
                }
            });
        });
        $("body").on("click",".loan_status",function(){
            if ($(this).is(":checked")) {
                if (confirm("Really want to change loan status as Approved?")) {
                    var value = $(this).val();
                    var id = $(this).data("id");
                    console.log(value);
                    $.ajax({
                        url: site_url+"loan/approveLoan",
                        type: "POST",
                        data: {loan_status:value,id:id,'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'},
                        success: function(result){
                            if(result==1)
                            {
                                location.href = site_url+"loan/loan-providers-list/2";
                            }
                        }
                    });
                }else{
                    $(this).prop("checked",false);
                }
            }
        });
        $.contextMenu({
            selector: '.context-menu-one',
            trigger: 'hover',
            autoHide: true,
            build: function($triggerElement, e){
                var value = $triggerElement.data("value");
                var items = {};
                if (<?php echo authenticate('1_6'); ?>) {
                    items.delete = {
                            name: "<a href='javascript:void(0)' class='deleteAjax' data-table='loans' data-id='"+value.id+"' data-where='"+JSON.stringify({id:value.id,member_id:value.member_id})+"'><?php echo lang('delete'); ?></a>", 
                            icon: "delete",
                            isHtmlName: true
                        }
                }
                if (items) {
                    return {
                        callback: function(){},
                        items: items
                    }
                }else{
                    return false;
                }
            }
        });
    </script>
</div>