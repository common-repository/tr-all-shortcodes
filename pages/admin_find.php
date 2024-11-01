<div class="form welcome-panel">
    <form  method="post" id="find_form">
        <label>Find Shortcode: </label>
        <input type="text" name="shortcode" />
        <input type="submit" class="button button-primary" value="find" />
        <input type="hidden" name="tr_action"  value="find_shortcode" />
    </form>    
</div>

<div id="result_shortcodes" class="results ">
    <div class="welcome-panel">No Result</div>
</div>

<script>
jQuery(function($){
    $('form#find_form').submit(function(){
        $this= $(this);
        $this.find('input[type="submit"]').val('Processing...').attr('disabled','disabled');
        $('#result_shortcodes').html('Please waiting...');
        $.ajax({
            url:ajaxurl,
            type:'post',
            data:$this.serialize(),
            success:function(rs)
            {
                $this.find('input[type="submit"]').val('find').removeAttr('disabled');
                $('#result_shortcodes').html(rs);
            }
        });
        return false;
    })
})
</script>