@push('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
@endpush


<div class="modal fade" id="modal-image" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Créer image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="image-form" enctype="multipart/form-data">
                    <input type="hidden" name="type_id" value="1">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="exampleInputFile1">image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="content" type="file" class="custom-file-input" id="exampleInputFile1">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modal-texte" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Créer texte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="texte-form">
                    <input type="hidden" name="type_id" value="2">
                    <div class="form-group">
                        <label for="texte" class="col-form-label">Texte:</label>
                        <textarea name="content" id="summernote" name="editordata"></textarea>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modal-titre" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Créer titre</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="titre-form">
                    @csrf
                    <input type="hidden" name="type_id" value="3">
                    <div class="form-group">
                        <label for="titre" class="col-form-label">Titre:</label>
                        <input type="text" name="content" class="form-control" id="titre">
                    </div>
                    <button id="closeTitre" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary submitBtn">Créer titre</button>
                </form>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="modal-logo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Créer logo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="logo-form" enctype="multipart/form-data">
                    <input type="hidden" name="type_id" value="4">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="exampleInputFile">logo</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="content" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="modal-bouton" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Créer bouton</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="bouton-form">
                    <div class="form-group">
                        <input type="hidden" name="type_id" value="5">
                        <label for="button" class="col-form-label">Url:</label>
                        <input class="form-control" id="button" type="url" name="content">
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>

            </div>
        </div>
    </div>
</div>


@push('js')

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>


<script>
    $(document).ready(function() {

    $('#summernote').summernote();


    $('.custom-file-input').on('change',function(){

            var fileName = $(this).val();

            fileName = fileName.replace("C:\\fakepath\\", "");

            $(this).next('.custom-file-label').html(fileName);
        });







  $('#titre-form').submit(function(event){

    const formData = new FormData(this);
        
        axios.post("{{route('mails.store.component.title' , ['mail'=>$mail])}}" , formData)
             .then( function(response){


                    $(".modal ").modal("hide");
                

                    $('input').val('');

                    toastr.success(response.data.message);

                    refrechDatatable();

                 }
             )
             .catch( function(error){

                toastr.error(error.response.data.errors.content[0])

                }
             );
             event.preventDefault();
  });




  



$('#image-form').submit(function(event){


const formData = new FormData(this);

axios.post("{{route('mails.store.component.image' , ['mail'=>$mail])}}" , formData)
     .then( function(response){


            $(".modal ").modal("hide");
        
            toastr.success(response.data.message);

            refrechDatatable();
         }
     )
     .catch( function(error){

        toastr.error(error.response.data.errors.content[0])

        }
     );
     event.preventDefault();
});





$('#logo-form').submit(function(event){

        
    const formData = new FormData(this);

    axios.post("{{route('mails.store.component.logo' , ['mail'=>$mail])}}" , formData)
        
    .then( function(response){


                $(".modal ").modal("hide");
            
                toastr.success(response.data.message);

                refrechDatatable();
            }
        )
        .catch( function(error){

            toastr.error(error.response.data.errors.content[0])

            }
        );
        event.preventDefault();
});





  $('#texte-form').submit(function(event){


    const formData = new FormData(this);
    
    axios.post("{{route('mails.store.component.text' , ['mail'=>$mail])}}" , formData)
         .then( function(response){


                $(".modal ").modal("hide");
            

                $('textarea').val('');

                toastr.success(response.data.message);

                refrechDatatable();

             }
         )
         .catch( function(error){

            toastr.error(error.response.data.errors.content[0])

            }
         );
         event.preventDefault();
    });



  




$('#bouton-form').submit(function(event){

    const formData = new FormData(this);    
    
    axios.post("{{route('mails.store.component.button' , ['mail'=>$mail])}}" , formData)
         .then( function(response){


                $(".modal ").modal("hide");
            

                $('input').val('');

                toastr.success(response.data.message);

                refrechDatatable();

             }
         )
         .catch( function(error){

            toastr.error(error.response.data.errors.content[0])

            }
         );
         event.preventDefault();
});





 


      function refrechDatatable(){

        var table =  $('#mailcomponents-table').DataTable();
 
        table.ajax.reload();
    }


});
</script>

@endpush