			<!-- ################################## -->
        </div> <!-- .content -->
    </div><!-- /#right-panel -->
    <!-- Right Panel -->
    <script src="models/admin/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="models/admin/js/popper.min.js"></script>
    <script src="models/admin/js/plugins.js"></script>
    <script src="models/admin/js/bootbox.min.js"></script>
    <!-- Datatable Js -->
    <script src="models/admin/js/lib/data-table/datatables.min.js"></script>
    <script src="models/admin/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="models/admin/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="models/admin/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="models/admin/js/lib/data-table/jszip.min.js"></script>
    <script src="models/admin/js/lib/data-table/pdfmake.min.js"></script>
    <script src="models/admin/js/lib/data-table/vfs_fonts.js"></script>
    <script src="models/admin/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="models/admin/js/lib/data-table/buttons.print.min.js"></script>
    <script src="models/admin/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="models/admin/js/lib/data-table/datatables-init.js"></script>  
    <!-- Datatable Js -->   
       
       
    <script src="models/admin/js/main.js"></script>
    <script src="models/admin/js/lib/chosen/chosen.jquery.min.js"></script>

    <script>
        jQuery(document).ready(function() {
            jQuery(".standardSelect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });
        });
    </script>
    <script>
        calc_total();
        $(".bootstrap-data-table").on('change', function(){
          var parent = $(this).closest('tr');
          var price  = parseFloat($('.paid',parent).text());
          var choose = parseFloat($('.bootstrap-data-table',parent).val());
          $('.paid',parent).text(choose*price);
          calc_total();
        });
        function calc_total(){
          var sum = 0;
          $(".paid").each(function(){
            sum += parseFloat($(this).text());
          });
          $('#sum').text(sum);
        }
    </script>  
</body>
</html>
