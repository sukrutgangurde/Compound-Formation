
    <footer class="footer shadow" style="background-color:black;color:white;">
        <div class="container-fluid text-center p3">
            Copyright &#169; <?php echo date('Y')?> Compound Formation
        </div>
    </footer>
		



<script src="../bootstrap/js/jquery-3.5.1.js"></script>
<script src="../bootstrap/js/jquery.dataTables.min.js"></script>
<script src="../bootstrap/js/bootstrap-datepicker.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>


<script>
$(document).ready(function() {
    $('#tblrecord').DataTable();
} );
</script>

<script>
setTimeout(function()
{
     $("#messge").css("display", "none");
}, 5000); 
</script> 


</body>
</html>

