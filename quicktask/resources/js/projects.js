$(document).ready(function() {
    $('.edit-project-btn').click(function() {
        var id = $(this).attr('data-id');
        var name = $(this).attr('data-name');
        var description = $(this).attr('data-description');
        
        $('#id_u').val(id);
        $('#name_u').val(name);
        $('#description_u').val(description);
    });
});
