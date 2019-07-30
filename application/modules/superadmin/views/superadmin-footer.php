            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.4.0
                </div>
                <strong>Copyright &copy; 2019-<?php echo date("Y"); ?> All rights reserved.
            </footer>
            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
    <!-- <div class="context-menu" id="context-menu" style="display:none;position:absolute;z-index:99">
            <ul>
              <li><a href="#"><i class="fa fa-eye"></i> View</a></li>       
              <li><a href="#"><i class="fa fa-share-alt"></i> Share</a></li>       
              <li><a href="#"><i class="fa fa-trash"></i> Delete</a></li>       
              <li><a href="#"><i class="fa fa-share fa-fw"></i> Move</a></li>       
              <li><a href="#"><i class="fa fa-files-o"></i> Copy</a></li>       
            </ul>
        </div> -->
        </div>
        <!-- Morris.js charts -->
        <script src="<?php echo base_url("assets/admin/") ?>bower_components/raphael/raphael.min.js"></script>
        <script src="<?php echo base_url("assets/admin/") ?>bower_components/morris.js/morris.min.js"></script>
        <!-- Sparkline -->
        <script src="<?php echo base_url("assets/admin/") ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?php echo base_url("assets/admin/") ?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
        <!-- Slimscroll -->
        <script src="<?php echo base_url("assets/admin/") ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url("assets/admin/") ?>bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url("assets/admin/") ?>dist/js/adminlte.min.js"></script>
        <script>
            // Trigger action when the contexmenu is about to be shown
            $(document).bind("contextmenu", function (event) {
                //console.log(event.which);
                if(event.which == 3){
                  // Avoid the real one
                  event.preventDefault();
                  
                  var menu = $(".context-menu");
            
                  //get x and y values of the click event
                  var pageX = event.pageX;
                  var pageY = event.pageY;
            
                  //position menu div near mouse cliked area
                  menu.css({top: pageY , left: pageX});
            
                  //position menu div near mouse cliked area
                  menu.css({top: pageY , left: pageX});
                  var mwidth = menu.width();
                  var mheight = menu.height();
                  var screenWidth = $(window).width();
                  var screenHeight = $(window).height();
                  //if window is scrolled
                  var scrTop = $(window).scrollTop();
                  //if the menu is close to right edge of the window
                  if(pageX+mwidth > screenWidth){
                      menu.css({left:pageX-mwidth});
                  }
                  //if the menu is close to bottom edge of the window
                  if(pageY+mheight > screenHeight+scrTop){
                      menu.css({top:pageY-mheight});
                  }
                  //finally show the menu
                  menu.finish().toggle(100);
                }
            });
            // If the document is clicked somewhere
            $(document).bind("mousedown", function (e) {
                // If the clicked element is not the menu
                if (!$(e.target).parents(".context-menu").length > 0) {
                    // Hide it
                    $(".context-menu").hide(100);
                }
            });
            $("#language").on("change",function(){
                var csrf_name = '<?php echo $this->security->get_csrf_token_name(); ?>';
                var csrf_hash = '<?php echo $this->security->get_csrf_hash(); ?>';
                $.ajax({
                    url: site_url+"superadmin/updateLang",
                    type: "POST",
                    data: "language="+$(this).val()+"&"+csrf_name+"="+csrf_hash,
                    success: function(result){
                        if(result==1)
                        {
                            location.reload();
                        }
                    }
                });
            });
        </script>
    </body>
</html>