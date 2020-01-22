$(function () {
    $('.btn-add').on('click', function () {
        $('#formModalLabel').html('Tambah Data Kategori');
        $('#btn-save').html('Tambah Data');
        $('#input-name').val('');
        $('#input-slug').val('');
    });

    $('#btn-save').on('click', function () {

        const token = $('#modal-form').find('input[name=_token]').val();
        const name = $('#input-name').val();
        const slug = $('#input-slug').val();   

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "/category",
            data: "name=" + name + "&name_clean=" + slug + "&_token=" + token,
            success: function (response) {
                // sembunyikan modal
                $('#modal-form').modal('hide');
            },
            error: function (err) {
                alert('ada error!');
            }
        });

    });

    $('#btn-save').on('click', function() {
        $('#formModalLabel').html('Ubah Data Kategori');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('#modal-form').html('');
        $('#modal-form').find('input[name=_method]').val('PUT');

        $.ajax({
          type: "POST",
          url: "/category/"+id+"/edit",
          dataType: "json",
          success: function(html) {
              $('#modal-form').modal('hide')
              ('#input-name').val(html.data.input-name);
              ('#input-slug').val(html.data.input-slug);
          },
          error: function(err) {
            alert('ada error!');
          }
        });
    });

});



        // clone baris table pertama
        //ubah data clone berdasar data dari response.data
        //tambahkan data clone ke baris pertama tabel (pake prepend)
        // ubah nomor baris baru yang lain jadi 2 dst (find)

        //         $(document).on('click', 'edit', function() {
        //             let id = $(this).attr('id');
        //             $('#modal-form').html('');
        //             $.ajax({
        //                 url: "/category/"+id+"/edit",
        //                 dataType: "json",
        //                 success: function(html) {
        //                     ('#input-name').val(html.data.input-name);
        //                     ('#input-slug').val(html.data.input-slug);
        //                 }
        //             });
        //         });

        //         $("#but").click(function() {
        //                  var $clone = $("#test").clone();
        //                  $clone.find("tr:not(:first-child)").remove();    
        //                  $("#target").html($clone);
        // });
