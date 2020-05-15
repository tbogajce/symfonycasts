var $container = $('.js-vote-arrows');
$container.find('a').on('click', function(e) {
    e.preventDefault();
    var $link = $(e.currentTarget);

    $.ajax({
        url: '/comments/10/vote/'+$link.data('direction'),
        method: 'POST'
    }).then(function(responseData) {
        console.log(responseData);
        $container.find('.js-vote-total').text(responseData.votes);
    });
});