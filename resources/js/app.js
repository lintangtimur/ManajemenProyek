
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: '#app'
// });
$(function(){
    $('#anggaranAcara').number(true,0);
    $(".social-login-box").height( $(".login-box").height() - 1000 );
    $('#tDosenDashboard').DataTable({
        processing: true,
        serverSide: true,
        ajax: "dosendashboard",
        drawCallback: function(settings){
            console.log(settings);
            $('.btnValidate').click(function(){
                var idAcara = $(this).data('acara');
                console.log(idAcara);
            
                swal({
                    title: "Acc Proposal?",
                    text: "Ketika sudah di ACC, tidak dapat dikembalikan kembali!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: false,
                  })
                  .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            method: 'post',
                            url: "/accproposal",
                            data: {
                                id: idAcara,
                                _token: $('meta[name="csrf-token"]').attr('content')
                            }
                        })
                        .done(function(resp){
                            console.info("SUKSES");
                            console.info(resp);
                            swal("Telah di acc", {
                                icon: "success",
                            });
                            
                            setTimeout(() => {
                                location.reload();
                            }, 2000);          
                        })
                        .fail(function(resp){
                            console.error(resp);
                            console.log("GAGAL UPDATE");
                        });
            
                    } else {
                      swal("Proses ACC proposal dibatalkan");
                    }
                  });
            });

            $('.btnDecline').click(function(){
                var idAcara = $(this).data('acara');
                var namaAcara = $(this).parents("tr").children("td:first").text();
                $('#idAcara').val(idAcara);
                $('#card-title-comment').text(namaAcara);
            });
        },
        columns: [
            { data: 'namaAcara', name: 'namaAcara' },
            { data: 'temaAcara', name: 'temaAcara' },
            { data: 'tanggalAcara', name: 'tanggalAcara' },
            { data: 'tempatAcara', name: 'tempatAcara' },
            { data: 'username', name: 'username' },
            { data: 'anggaran', name: 'anggaran' },
            { data: 'pathFile', name: 'proposal' },
            { data: 'action', name: 'action'}
        ]
    });
})

// Button ketika ormawa ingin mengedit inputan kegiatan
$('.btnEditOrmawa').click(function(){
    var idkegiatanOrmawa = $(this).data('acaraedit');
    console.log(idkegiatanOrmawa);
});

$('.btnRevisiacara').click(function(){
    var revisiacara_id = $(this).data('revisiacara');
    var comment_section = $('.revisicomment-'+revisiacara_id);
    var judul_section = $('.judulrevisi-'+revisiacara_id);
    console.log(revisiacara_id);

    $.ajax({
        url: 'dashboard/revisi/commendid/'+revisiacara_id,
        method: 'get',
        dataType: 'json',
    })
    .done(function(resp){
        console.log(resp);
        $.each(resp, function(index,val){
            console.log(val);
            comment_section.html(val.comment);
            judul_section.html(val.judulrevisi);
        });
    })
    .fail(function(err){

    });
});
