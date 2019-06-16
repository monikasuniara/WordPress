<?php
if ( is_front_page() ) :
get_header( 'home' );
elseif ( is_page( 'About' ) ) :
get_header( 'about' );
else:
get_header();
endif;

?>
<div id="primary" class="site-content">
<div class="entry-content">
<?php the_content(); ?>

<style type="text/css">
    form{
        margin: 20px 0;
    }
    form input, button{
        padding: 5px;
    }
    table{
        width: 100%;
        margin-bottom: 20px;
		border-collapse: collapse;
    }
    table, th, td{
        border: 1px solid #cdcdcd;
    }
    table th, table td{
        padding: 10px;
        text-align: left;
    }
</style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="http://services.iperfect.net/js/IP_generalLib.js"></script>