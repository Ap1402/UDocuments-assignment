<?php
        $.ajax({
            url: '<?php bloginfo('template_url'); ?>/functions/twitter.php',
            data: "tweets=<?php echo $ct_tweets; ?>&account=<?php echo $ct_twitter; ?>",
            success: function(data) {
                $('#twitter-loader').remove();
                $('#twitter-container').html(data);
            }
        });

?>