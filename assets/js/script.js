$(function() {

    $('.tampilModalUbah').on('click', function(){
        $('#judulLabel').html('Ubah Data');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action','http://localhost/Project_LKPD/soal/edit');
        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/Project_LKPD/soal/getubah', 
            data: {id : id}, 
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#soal').val(data.soal);
                $('#id').val(data.id);
            }
        });
    });

});