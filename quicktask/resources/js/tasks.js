$(document).ready(function() {
    $('.edit-task-btn').click(function(){
        var id = $(this).attr('data-id');
        var name = $(this).attr('data-name');
        
        $('#id_u').val(id);
        $('#task_name_u').val(name);
    });

    $('.delete').click(function() {
        return confirm('Are you sure you want to delete this item?');
    });
});
