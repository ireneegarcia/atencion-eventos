var EnterKey = 13;



$.fn.isBound = function(type, fn) {
    var data = this.data('events')[type];

    if (data === undefined || data.length === 0) {
        return false;
    }

    return (-1 !== $.inArray(fn, data));
};

$(document).ready(function() {


    runBind();
    function runBind() {
        $('.destroy').on('click', function(e) {

            done_todo();
            $currentListItem = $(this).closest('li');

            $currentListItem.remove();

        });

        $('.toggle').on('click', function(e) {

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
            add_todo();
            /* console.log(id_todo);
             $('.destroy').off('click');
             $('.toggle').off('click');
             var todos = $todoList.html();
             todos += ""+
             "<li>" +
             "<div class='view'>" +
             "<input class='toggle' type='checkbox'>" +
             "<label id="+id_todo+" data=''>" + " " + $('#new-todo').val() + "</label>" +
             "<a class='destroy'></a>" +
             "</div>" +
             "</li>";

             $(this).val('');
             $todoList.html(todos);
             runBind();
             $('#main').show();*/

        }}); // end if

    $('#todo-enter').click(function(e) {
        add_todo();
        /*$('.destroy').off('click');
         $('.toggle').off('click');
         var todos = $todoList.html();
         todos += ""+
         "<li>" +
         "<div class='view'>" +
         "<input class='toggle' type='checkbox'>" +
         "<label id="+id_todo()+" data=''>" + " " + $('#new-todo').val() + "</label>" +
         "<a class='destroy'></a>" +
         "</div>" +
         "</li>";
         $(this).val('');
         $('#new-todo').val('');
         $todoList.html(todos);
         runBind();
         $('#main').show();*/

    });

    function add_todo(){

        //var id_todo = null;
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
            success: function(data) {
                //console.log(data);
                $('.destroy').off('click');
                $('.toggle').off('click');
                var todos = $todoList.html();
                todos += ""+
                    "<li>" +
                    "<div class='view'>" +
                    "<input id='item_todo'  value="+data+" class='toggle' type='checkbox'>" +
                    "<label data=''>" + " " + $('#new-todo').val() + "</label>" +
                    "<a class='destroy'></a>" +
                    "</div>" +
                    "</li>";

                $('#new-todo').val('');
                $todoList.html(todos);
                runBind();
                $('#main').show();
            },
            error: function (data) {
                // console.log(data);
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

});


function done_todo(){
    //console.log( $('#item_todo').val());
    $.ajax({
        type: "POST",
        url: GetBaseURL()+"api/doneTodo",
        data: {
            id: $('#item_todo').val(),
            //account: jsonObjeto.id
        },
        dataType: "json",
        success: function(data) {
            //console.log("ok");
        },
        error: function (data) {
            // console.log(data);
            swal({
                title: "Algo salió mal",
                text: "Por favor, intente de nuevo eliminar su item",
                type: "error",
                showCancelButton: false,
                closeOnConfirm: true
            }, function(){
                location.reload();
            });
        }
    });
}