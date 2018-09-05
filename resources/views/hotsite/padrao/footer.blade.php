<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



<script>

    $(document).ready(function(){

        var showHeaderAt = -1;

        var win = $(window),
            body = $('body');
        body.addClass('fixed');

        // Show the fixed header only on larger screen devices

        if(win.width() > 400){

            // When we scroll more than 150px down, we set the
            // "fixed" class on the body element.

            win.on('scroll', function(){

                if(win.scrollTop() > showHeaderAt) {
                    body.addClass('fixed');
                }
                else {
                    body.removeClass('fixed');
                }
            });

        }

    });

</script>


<footer class="footer-distributed main-footer">

    <div class="footer-left">
        <p style=" color: black; font-family: Ubuntu-Regular, sans-serif; font-size: 20px;">C o n t r o l
        <span style="color: #5383d3; font-family: Ubuntu-Regular, sans-serif; font-size: 20px;">H o t e l</span></p>
        <p class="footer-company-name">&copy; 2018</p>
    </div>

    <div class="footer-center">

        <div>
            <i class="fa fa-map-marker"></i>
            <p><span>Univali</span> Itajaí, Santa Catarina</p>
        </div>

       <div>
            <i class="fa fa-envelope"></i>
            <p><a href="mailto:adm@controlhotel.com.br">adm@controlhotel.com.br</a></p>
        </div>

    </div>

    <div class="footer-right">
        <div class="footer-icons">

            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-github"></i></a>

        </div>

    </div>

</footer>


<!-- jQuery 3 -->
<script src="{{asset('../assets/js/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('../assets/js/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 3.3.7 -->
<script src="{{asset('../assets/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{asset('../assets/js/raphael.min.js')}}"></script>
<script src="{{asset('../assets/js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('../assets/js/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('../assets/js/jquery-jvectormap-1.2.2.min.js')}}"></script>

<script src="{{asset('../assets/js/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('../assets/js/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('../assets/js/moment.min.js')}}"></script>
<script src="{{asset('../assets/js/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('../assets/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('../assets/js/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('../assets/js/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('../assets/js/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('../assets/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('../assets/js/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('../assets/js/demo.js')}}"></script>