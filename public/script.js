$(document).ready(function() {
    $('#registration-form').submit(function(event) {
        event.preventDefault();
        let form = $(this);
        let url = form.attr('action');
        $.ajax({
            type: 'POST',
            url: url,
            data: form.serialize(),
            success: function(response) {
                let result = JSON.parse(response)
                if (result['hasError']) {
                    showErrors(result['messages']);
                 } else {
                    showSuccess(result['messages']);
                }
            },
            error: function() {                
                showErrors({error:'Error occurred. Please try again.'});
            }
        });
    });
    
    function formatMessages(messages){
        console.log(messages)
        text = ''
        for(let key in messages){
            text += messages[key] + '<br>'
        }
        return text
    }

    function showErrors(messages) {
        $('#error-message').removeClass('d-none');
        $('#success-message').addClass('d-none'); 
        $('#success-link').addClass('d-none');        
        $('#error-message').html(formatMessages(messages))      
    }

    function showSuccess(messages) {
        $('#registration-form').addClass('d-none')
        $('#error-message').addClass('d-none');
        $('#success-link').removeClass('d-none');
        $('#success-message').removeClass('d-none');
        $('#success-message').html(formatMessages(messages))
    }
});