var EnterKey = 13;

$.fn.isBound = function(type, fn) {
    var data = this.data('events')[type];

    if (data === undefined || data.length === 0) {
        return false;
    }

    return (-1 !== $.inArray(fn, data));
};

$(document).ready(function() {
    function runBind() {
        $('.destroy').on('click', function(e) {

            $currentListItem = $(this).closest('li');

            console.log($currentListItem);


            $currentListItem.remove();
        });

        $('.toggle').on('click', function(e) {

            alert("j");
            var $currentListItemLabel = $(this).closest('li').find('label');
			/*
			 * Do this or add css and remove JS dynamic css.
			 */
            if ( $currentListItemLabel.attr('data') == 'done' ) {
                $currentListItemLabel.attr('data', '');
                $currentListItemLabel.css('text-decoration', 'none');
            }
            else {
                $currentListItemLabel.attr('data', 'done');
                $currentListItemLabel.css('text-decoration', 'line-through');
            }
        });
    }


    $todoList = $('#todo-list');
    $('#new-todo').keypress(function(e) {
        if (e.which === EnterKey) {
            $('.destroy').off('click');
            $('.toggle').off('click');
            var todos = $todoList.html();
            todos += ""+
                "<li>" +
                "<div class='view'>" +
                "<input class='toggle' type='checkbox'>" +
                "<label data=''>" + " " + $('#new-todo').val() + "</label>" +
                "<a class='destroy'></a>" +
                "</div>" +
                "</li>";
            add_todo();
            $(this).val('');
            $todoList.html(todos);
            runBind();
            $('#main').show();

        }}); // end if

    $('#todo-enter').click(function(e) {
        $('.destroy').off('click');
        $('.toggle').off('click');
        var todos = $todoList.html();
        todos += ""+
            "<li>" +
            "<div class='view'>" +
            "<input class='toggle' type='checkbox'>" +
            "<label data=''>" + " " + $('#new-todo').val() + "</label>" +
            "<a class='destroy'></a>" +
            "</div>" +
            "</li>";

        add_todo();

        $(this).val('');
        $('#new-todo').val('');
        $todoList.html(todos);
        runBind();
        $('#main').show();

    });

});


function add_todo(){

    var jsonObjeto =JSON.parse(GetCookie("user"));
    //console.log(jsonObjeto.id);
    $.ajax({
        type: "POST",
        url: GetBaseURL()+"api/storeTodo",
        data: {
            item: $('#new-todo').val(),
            account: jsonObjeto.id
        },
        dataType: "json",
        error: function (data) {
            console.log(data);
            swal({
                title: "Algo salió mal",
                text: "Por favor, intente de nuevo añadir su item",
                type: "error",
                showCancelButton: false,
                closeOnConfirm: true
            }, function(){
                location.reload();
            });
        }
    });
}

