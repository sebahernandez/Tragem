@extends('layouts.master_admin')

@section('css')
    @parent
@endsection

@section('content')
<!-- START BREADCRUMB -->
    <ul class="breadcrumb push-down-0">
        <li><a href="#">Admin</a></li>
        <li><a href="#">Posts</a></li>
        <li class="active">Listado</li>
    </ul>
    <!-- END BREADCRUMB --> 

    <!-- START CONTENT FRAME -->
    <div class="content-frame">   
        
        <!-- START CONTENT FRAME TOP -->
        <div class="content-frame-top">                        
            <div class="page-title">                    
                <h2><span class="fa fa-files-o"></span> Posts</h2>
            </div>                                      
            <div class="pull-right"> 
                <a  href="{{ route('post.nuevo') }}">                           
                    <button class="btn btn-primary">
                        <span class="fa fa-plus"></span> Agregar nuevo post
                    </button>
                </a>
            </div>                         
        </div>
    
        <!-- START CONTENT FRAME BODY -->
        <div class="content-frame-body content-frame-body-left"> 
    
    <div class="row">
        <div class="col-md-12">
            
            <div class="panel panel-default">
                <div class="panel-body posts">
                    
                    <div class="row">
                        <div class="col-md-6">
                            
                            <div class="post-item">
                                <div class="post-title">
                                    <a href="pages-blog-post.html">Outer space</a>
                                </div>
                                <div class="post-date"><span class="fa fa-calendar"></span> October 23, 2014 / <a href="pages-blog-post.html#comments">3 Comments</a> / <a href="pages-profile.html">by Dmitry Ivaniuk</a></div>
                                <div class="post-text">
                                    <img src="assets/images/blog/post_1.jpg" class="img-responsive img-text"/>
                                    <p>Outer space, or simply space, is the void that exists between celestial bodies, including the Earth. It is not completely empty, but consists of a hard vacuum containing a low density of particles: predominantly a plasma of hydrogen and helium.</p>                                            
                                </div>
                                <div class="post-row">
                                    <div class="post-info">
                                        <span class="fa fa-thumbs-up"></span> 15 - <span class="fa fa-eye"></span> 15,332 - <span class="fa fa-star"></span> 322
                                    </div>
                                    <button class="btn btn-default btn-rounded pull-right">Read more &RightArrow;</button>
                                </div>
                            </div>                                            
                            
                        </div>
                        <div class="col-md-6">
                    
                            <div class="post-item">
                                <div class="post-title">
                                    <a href="pages-blog-post.html">Nature</a>
                                </div>
                                <div class="post-date"><span class="fa fa-calendar"></span> October 22, 2014 / <a href="pages-blog-post.html#comments">5 Comments</a> / <a href="pages-profile.html">by Dmitry Ivaniuk</a></div>
                                <div class="post-text">
                                    <div class="post-video">
                                        <iframe width="560" height="315" src="//www.youtube.com/embed/kguSGXP3-_E" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                    <p>Nature, in the broadest sense, is equivalent to the natural, physical, or material world or universe. "Nature" refers to the phenomena of the physical world, and also to life in general. It ranges in scale from the subatomic to the cosmic.</p>                                            
                                </div>
                                <div class="post-row">
                                    <div class="post-info">
                                        <span class="fa fa-thumbs-up"></span> 15 - <span class="fa fa-eye"></span> 15,332 - <span class="fa fa-star"></span> 322
                                    </div>                                            
                                    <button class="btn btn-default btn-rounded pull-right">Read more &RightArrow;</button>
                                </div>
                            </div>                                            
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            
                            <div class="post-item">
                                <div class="post-title">
                                    <a href="pages-blog-post.html">Womans</a>
                                </div>
                                <div class="post-date"><span class="fa fa-calendar"></span> October 21, 2014 / <a href="pages-blog-post.html#comments">3 Comments</a> / <a href="pages-profile.html">by Dmitry Ivaniuk</a></div>
                                <div class="post-text">
                                    <img src="assets/images/blog/post_2.jpg" class="img-responsive img-text"/>
                                    <p>A woman is a female human. The term woman is usually reserved for an adult, with the term girl being the usual term for a female child or adolescent. However, the term woman is also sometimes used to identify a female human.</p>                                            
                                </div>
                                <div class="post-row">
                                    <div class="post-info">
                                        <span class="fa fa-thumbs-up"></span> 15 - <span class="fa fa-eye"></span> 15,332 - <span class="fa fa-star"></span> 322
                                    </div>
                                    <button class="btn btn-default btn-rounded pull-right">Read more &RightArrow;</button>
                                </div>
                            </div>                                            
                            
                        </div>
                        <div class="col-md-6">
                    
                            <div class="post-item">
                                <div class="post-title">
                                    <a href="pages-blog-post.html">History</a>
                                </div>
                                <div class="post-date"><span class="fa fa-calendar"></span> October 20, 2014 / <a href="pages-blog-post.html#comments">5 Comments</a> / <a href="pages-profile.html">by Dmitry Ivaniuk</a></div>
                                <div class="post-text">                                                   
                                    <p>History (from Greek ἱστορία, historia, meaning "inquiry, knowledge acquired by investigation") is the study of the past, specifically how it relates to humans. It is an umbrella term that relates to past events as well as the memory, discovery, collection, organization, presentation, and interpretation of information about these events.</p>
                                    <ol>
                                        <li>Demographic history</li>
                                        <li>Black history</li>
                                        <li>History of education</li>
                                        <li>Ethnic history</li>
                                        <li>Family history</li>
                                        <li>Labor history</li>
                                        <li>Rural history</li>
                                        <li>Urban history</li>                                                        
                                    </ol>
                                    <p>Stories common to a particular culture, but not supported by external sources (such as the tales surrounding King Arthur) are usually classified as cultural heritage or legends, because they do not support the "disinterested investigation" required of the discipline of history.[10][11] Herodotus, a 5th-century BC Greek historian is considered within the Western tradition to be the "father of history", and, along with his contemporary Thucydides, helped form the foundations for the modern study of human history.</p>
                                </div>
                                <div class="post-row">
                                    <div class="post-info">
                                        <span class="fa fa-thumbs-up"></span> 15 - <span class="fa fa-eye"></span> 15,332 - <span class="fa fa-star"></span> 322
                                    </div>                                            
                                    <button class="btn btn-default btn-rounded pull-right">Read more &RightArrow;</button>
                                </div>
                            </div>                                            
                            
                        </div>
                    </div>                                      
                </div>
            </div>
            
            <ul class="pagination pagination-sm pull-right push-down-20">
                <li class="disabled"><a href="#">«</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>                                    
                <li><a href="#">»</a></li>
            </ul>                            
            
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
    
    <script type="text/javascript">
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        }); 

        function delete_usuario(id){
        
	        var box = $("#mb-remove-row");
	        box.addClass("open");
	        
	        box.find(".mb-control-yes").on("click",function(){
	            box.removeClass("open");
	            eliminar(id);
	            $("#trow_"+id).hide("slow",function(){
	                $(this).remove();
	            });
	        });
	        
	    }

	    function eliminar(id)
        {
            var url = root + '/eliminar-usuario';

            $.ajax({
                url:url,
                type:'POST',
                data:{id:id},               
                beforeSend: function() {

                },
                success:function(data){                                                             
                            
                    if(data['type'] == 'error'){ 
                        noty({text: data['msj'], layout: 'center', type: 'error'});
                    }else{
                        noty({text: data['msj'], layout: 'center', type: 'success'});
                        $('#item'+id).css({
                            display: "none",
                            visibility: "hidden"
                        });
                    }
                },
                error: function (data) {
                    var lista_errores="";
                    var errors = $.parseJSON(data.responseText);

                    $.each(errors,function(index, value) {
                        lista_errores+=value;
                    });
                    
                    noty({text: lista_errores, layout: 'center', type: 'error'});
                }
            });
        }
    </script>
@stop