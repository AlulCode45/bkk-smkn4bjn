$(document).ready(() => {
    
    $('#nothing').on('click', () => {
        if ($('#nothing').is(':checked'))
        return notcheck();

        
    })
    
    $('#kuliah').on('click', () => {
        return $('#nothing').prop('checked', false)
    })

    $('#bekerja').on('click', () => {
        return $('#nothing').prop('checked', false)
    })

    $('#usaha').on('click', () => {
        return $('#nothing').prop('checked', false)
    })

    function notcheck()
    {
        $('#kuliah').prop('checked', false)
        $('#bekerja').prop('checked', false)
        $('#usaha').prop('checked', false)
    }
})

var namaUniv = null;
var namakantor = null;
var namausaha = null;

function getDetailJurusan(event)
    {
        var option = document.getElementById('jurusanDetail')
        
            $('#jurusanDetail').children().remove().end()
            $('#jurusanDetail').append('<option value="#">Pilih Jurusan</option>')
        $.get({
        url: 'https://bkk-smkn4bojonegoro.sch.id/api/detailjurusan/' + event.target.value ,
        dataType: 'html',
        cache: false,
        success: (result) => {
            $('.form-kelas').removeClass('d-none')
            var komli = JSON.parse(result);
            // console.log(komli.)
            komli.komli.map((child, i) => {
            var select = document.createElement('option')
            select.value = child.id;
            select.text = child.nama_komli;
            option.add(select)
            })
            
        }
    })
    }

    function getDetailSiswa(event)
    {
        var temp = new URL(window.location.href)
        var tahun = temp.searchParams.get('tahun')
        $('#siswaDetail').children().remove().end()
        $('#siswaDetail').append('<option value="#">Pilih Nama</option>')
        $.get({
            url: 'https://bkk-smkn4bojonegoro.sch.id/api/detailSiswa/' + event.target.value + '/' + tahun,
            dataType: 'html',
            cache: false,
            success: (res) => {
                $('.form-nama').removeClass('d-none')
                var result = JSON.parse(res);
                result.siswa.map((child) => {
                    $('#siswaDetail').append('<option value="' + child.id + '">' + child.nama_siswa +'</option>')
                })
            }
        })
    }
    
    function nextForm(event)
    {
        event.preventDefault()

        $('.next').removeClass('d-none')
        $('.btn-next-form').addClass('d-none');

        if ($('#kuliah').is(':checked'))
        $('.chk-kuliah').removeClass('d-none')

        if ($('#bekerja').is(':checked'))
        $('.chk-kerja').removeClass('d-none')

        if ($('#usaha').is(':checked'))
        $('.chk-usaha').removeClass('d-none')

        return;
    }
    
    function validationchange()
    {
        if ($('#kuliah').is(':checked') || $('#bekerja').is(':checked') || $('#usaha').is(':checked') || $('#nothing').is(':checked'))
        return $('.btn-next-form').prop('disabled', false);

        return $('.btn-next-form').prop('disabled', true);
    }

    function handleuniv(event)
    {
        return namaUniv = event.target.value;
    }

    function handleKantor(event)
    {
        return namakantor = event.target.value;
    }

    function handleUsaha(event)
    {
        return namausaha = event.target.value;
    }

    function onSubmit(event)
    {
        var jurusan = document.getElementById('jurusan');
        var kelas = document.getElementById('jurusanDetail');
        var siswa = document.getElementById('siswaDetail') 
        if (jurusan.value == '#' || kelas.value == '#' || siswa.value == '#' || ($('#kuliah').is(':checked') && namaUniv == null) || ($('#bekerja').is(':checked') && namakantor == null) || ($('#usaha').is(':checked') && namausaha == null)){
            event.preventDefault();
        $('.msg').removeClass('d-none')
        }
        
        
    }

    function generateAngket(event)
    {
        event.preventDefault();
        var angket = document.getElementById('generateAngket');
        var generate = document.getElementById('generatedLink');   
        $('.unlink').addClass('d-none')
        generate.value = 'https://bkk-smkn4bojonegoro.sch.id/angket_siswa/?tahun=' + angket.value
        $('.link').removeClass('d-none');
        $('.btn-generate').addClass('d-none');
        $('.btn-copy').removeClass('d-none')

    }

    function copyLink(event){
        event.preventDefault();
        var btnLink = document.getElementById('btnlink')
        var link = document.getElementById('generatedLink')
        navigator.clipboard.writeText(link.value);
        btnLink.innerHTML = 'Copied!'
        $('#btnlink').removeClass('btn-outline-success')
        $('#btnlink').addClass('btn-success')
        $('#btnlink').prop('disabled', true);
        
    }