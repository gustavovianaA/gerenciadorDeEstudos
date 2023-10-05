$(document).ready(function () {

    let xCsrfToken = $('meta[name="csrf-token"]').attr('content')
    
    $('#exampleModal').on("click", ".available-topic", function () {
        $('#main_topics').append($(this).prop("outerHTML").replace('available-topic', 'main-topic'))
        $(this.remove())
    })

    $('#exampleModal').on("click", ".main-topic", function () {
        $('#other_topics').append($(this).prop("outerHTML").replace('main-topic', 'available-topic'))
        $(this.remove())
    })

    $('#modalSaveTopics').click(function () {

        let phaseIdentifier = $('#phase_identifier').attr('phase_id')
        let topicsToAdd = []
        let topicsToRemove = []

        $('.main-topic').each(function(){
            topicsToAdd.push($(this).attr('topic_id'))
        })

        $('.available-topic').each(function(){
            topicsToRemove.push($(this).attr('topic_id'))
        })

        console.log(phaseIdentifier)
        console.log('add: ' + topicsToAdd)
        console.log('remove:' + topicsToRemove)        

        $.ajax({
            url: "/app/managetopicphase",
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': xCsrfToken
            },
            data: {
                phaseId: phaseIdentifier, 
                topicsToAdd: topicsToAdd,
                topicsToRemove: topicsToRemove
            },

            beforeSend: function () {
                //console.log('Manage Topics')
            }
        })
            .done(function (response) {
                window.location.reload()
            })
            .fail(function (jqXHR, textStatus, msg) {
                console.log(msg)
            })
    })

})