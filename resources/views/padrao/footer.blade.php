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
<footer class="footer-distributed">

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
