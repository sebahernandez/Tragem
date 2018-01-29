@extends('layouts.master_admin')

@section('css')
    @parent

    <link rel="stylesheet" href="{{ asset('back/filepicker/css/filepicker.css') }}">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQ9YX_EAJZcastJ3HZ0VR3lN03ysnJY60"></script>
@endsection

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb push-down-0">
        <li><a href="#">Admin</a></li>
        <li><a href="#">Post</a></li>
        <li class="active">Nuevo</li>
    </ul>
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
    
        <div class="row">
            <div class="col-md-12">                
                <form method="POST" action="{{ route('post.store') }}" id="form-post" name="form-post" class="form-horizontal" 
                enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @include("admin.post.form")
                </form>                
            </div>
        </div>                    
        
    </div>
    <!-- END PAGE CONTENT WRAPPER -->
@endsection

@section('js')
    @parent
    <script type='text/javascript' src='{{ asset('back/js/noty/jquery.noty.js') }}'></script>
    <script type='text/javascript' src='{{ asset('back/js/noty/layouts/center.js') }}'></script>
    <script type='text/javascript' src='{{ asset('back/js/noty/themes/default.js') }}'></script>

    <script type='text/javascript' src='{{ asset('back/js/icheck.min.js') }}'></script>

    <script type="text/javascript" src="{{ asset('back/js/fileinput/fileinput.min.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('back/js/summernote/summernote.js') }}"></script>

    
    <script type="text/javascript">
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        }); 
    </script>

     <script>
        $(function(){
            $("#file-simple").fileinput({
                showUpload: false,
                showCaption: false,
                browseClass: "btn btn-danger",
                fileType: "any"
            });             
        });            
    </script>

     <script>
        var data_form = $("#form-post");

        data_form.submit(function(e){
            e.preventDefault();
            var formData = new FormData(this);
            var url = $(this).attr('action');

                $.ajax({
                    url:url,
                    type:'POST',
                    data:formData,
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function() {
                        $("#btn_guardar").addClass("loading");
                    },
                    success:function(data){                                                             
                                
                        if(data['type'] == 'error'){ 
                            noty({text: data['msj'], layout: 'center', type: 'error'});
                        }else{
                            noty({text: data['msj'], layout: 'center', type: 'success'});
                            $('input[type!="submit"]').each(function(i, e) {
                                  if (e.type == 'text'){
                                      e.value = '';
                                  }
                                  if (e.type == 'textarea'){
                                      e.value = '';
                                  }
                                 
                                  $('#texto').code('');
                              })
                        }

                         setTimeout(function() {$("#btn_guardar").removeClass("loading");}, 100);
                    },
                    error: function (data) {
                        var lista_errores="";
                        var errors = $.parseJSON(data.responseText);

                        $.each(errors,function(index, value) {
                            lista_errores+=value;
                        });
                        
                        noty({text: lista_errores, layout: 'center', type: 'error'});
                        setTimeout(function() {$("#btn_guardar").removeClass("loading");}, 100);
                    }
                });
           
        });
    </script>
    
@stop