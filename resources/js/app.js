
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
    // var anggaran = numeral($('.numeralAnggaran').text()).format('(Rp 0.00 a)');
    // console.log(anggaran);
    $('#anggaranAcara').number(true,0);
})

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
                console.log("SUKSES");
                console.log(resp);
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
          swal("Tidak ada perubahan");
        }
      });
})