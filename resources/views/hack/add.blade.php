@extends("common.default")
@section("content")

<div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">{{$title}}</h4>
                                    <!-- <p class="category">Complete your profile</p> -->
                                </div>
                                <div class="card-content">
                                    <form id="addhackform">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Hack Title</label>
                                                    <input type="text" class="form-control" name="title" id="title" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Category</label>
                                                    <input type="hidden"
                                                     id="category" name="category" value="">
                                                    <select class="form-control" name="category_id" id="category_id">
                                                       
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    
                                                    {{-- <h1>{{$hack->hack_type}}</h1> --}}
                                                    <select class="form-control" name="hack_type" id="hack_type">
                                                        <option value="HCK_TXT"
                                                        
                                                        >Text Hack</option>
                                                        <option value="HCK_IMG_TXT"
                                                      
                                                        >Text & Image Hack</option>
                                                        <option value="HCK_IMG" 
                                                          
                                                        >Image Hack</option>
                                                        <option value="HCK_VID"
                                                      
                                                        >Video & Text Hack</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Video URL</label>
                                                   
                                                    <input
                                                    value=""
                                                     type="text" class="form-control" name="videos" id="videos">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label"> Hack text</label>
                                                    <textarea class="form-control" rows="5" name="body" id="body"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Mobile friendly link</label>
                                                    <input type="text" class="form-control"
                                                    value="" 
                                                     id="external_link" name="external_link">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Tags</label>
                                                    <input type="text" class="form-control" id="vt" disabled="disabled">
                                                    <input type="hidden" name="tags" value="[]" id="tags">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="hidden" name="images" id="images" value="">
                                                    <Label>Upload Image
                                                    <input type="file" name="img[]" class="file" id="vi" multiple="multiple">
                                                    </Label>
                                                    <span class="hackimages" id="image_preview">
                                                      
                                                    </span>
                                              
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="togglebutton">
                                                    <label>
                                                        <input type="checkbox" 

                                                        
                                                         id="publish" name="approved">
                                                        Publish
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <h4 class="title pt-3">Assign Content Partner</h4>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="partner_open" id="vc"> Add Author
                                                    </label>
                                                </div>
                                                <div class="row-fluid">
                                                  <select  id="partners" name="author">
                                                    <!-- <options>Select partner</options> -->
                                                  </select>
                                                </div>
                                            </div>
                                             <div class="col-md-12">
                                                <h4 class="title pt-3">Author
                                                <small></small>
                                                </h4>
                                              
                                            </div> 

                                        </div>
                                        <div class="row">

                                        </div>
                                        <input type="hidden" id="token" name="token" value="">
                                        
                                        <input type="hidden" name="approved" id="approved">
                                        <input type="hidden" name="content_partner" id="content_partner">
                                        <div class="clearfix"></div>
                                        <button id="save" type="submit" class="btn btn-success pull-right">Save</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="tstore">
@stop
@section("script")
<input type="hidden" id="content_partner" value="">
<script type="text/javascript">
    var images;
    var tags;
    var $hack=[];
   	$hack["images"]=[];
   
    
    function remove_img($img,$j) {
        $curr=JSON.parse($('#images').val());
        console.log("CURR",$curr);
        $index=$curr.indexOf($img);
        delete $curr[$index];
        $curr=JSON.stringify($curr);
        $("#img_"+$j).hide();
        $('#images').val($curr);
        alert("Image removed");
    }
    function saveimage($data) {
        image_url="";
        url="http://"+host+"/image/save";
        $.ajax({
            type:"POST",
            url:url,
            data:{
                image:$data
            },
            async:false,
            success:function(r){
                image_url=r.url;
                //console.log("saveimage",image_url);
                //console.log(r)
                // images.push(image_url);
            }
        })

        return image_url;
    }

     function get_categories() {
        url=url="http://"+host+"/category/all";
        $.ajax({
            "type":"POST",
            "url":url,
            data:{
                "token":token
            },
            success:function(r){
                options="";
                selected_hack=$("#category").val();

                for (var i = a=r.length - 1; i >= 0; i--) {
                    a=r[i];
                      t=`<option rel-title="`+a.title+`" value="`+a._id+`" `;
                    
                    t+=`">`+a.title+`</option>
                    `;
                    options+=t;

                }
                $('#category_id').append(options);
            }
        })
    }
    function get_partners() {
        url=url="http://"+host+"/partners/all";
        $.ajax({
            "type":"POST",
            "url":url,
            data:{
                "token":token
            },
            success:function(r){
                options="";
                for (var i =r.length - 1; i >= 0; i--) {
                    a=r[i];

                    options+=`
                        <option rel-author="`+a.user_id+`" value=`+a.name+`>`+a.name+`</option>
                    `;

                }
                options+="<option selected='selected'>Please select</option>";
                //console.log(options);
                $('#partners').append(options);
            }
        })
    }

     function get_tags() {
        url=url="http://"+host+"/contents/tags/all";
        $.ajax({
            "type":"POST",
            "url":url,
            data:{
                "token":token
            },
            async:false,
            success:function(r){
                var t=[];
                for (var i = r.length - 1; i >= 0; i--) {
                    z=r[i];
                    t.push(z.tag);
                }
                console.log("T",JSON.stringify(t));
                $('#tstore').val(JSON.stringify(t));
                $('#vt').attr("disabled",false);
                tags=r;
                        
            }
        })
    }


    function getBase64Image(img) {
    // Create an empty canvas element
        var canvas = document.createElement("canvas");
        canvas.width = img.width;
        canvas.height = img.height;

        // Copy the image contents to the canvas
        var ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0);

        // Get the data-URL formatted image
        // Firefox supports PNG and JPEG. You could check img.src to guess the
        // original format, but be aware the using "image/jpg" will re-encode the image.
        var dataURL = canvas.toDataURL("image/png");

        return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
    }
    $(document).ready(function(){
        
        $('#token').val(token);
        get_categories();
        get_tags();
        get_partners();

       

        imghtml="";
        
         $("#image_preview").append(imghtml);


      
        
        tags=$('#tstore').val();
        console.log("TAGS",tags);
        populate=[];
        
        ms=$('#vt').magicSuggest({
            placeholder: 'Enter tag',
            data:JSON.parse(tags),
            resultAsString: true,
            value:populate
        });


        $(ms).on('selectionchange', function(){
                newvalue=this.getSelection();
                v="";
                for (var i = newvalue.length - 1; i >= 0; i--) {
                    n=newvalue[i];
                    v+=n.name+",";
                }
                 $('#tags').val(JSON.stringify(v.split(",")));
        })
        $('#token').val(token);

        
      
        $images=[];
       
        $('#vi').change(function(){
             $('#pModal').modal("show")
             var $flag=0;
             var $limit=this.files.length
            for (var i = this.files.length - 1; i >= 0; i--) {
            
                // this.files[i]
                fr = new FileReader();
                fr.readAsDataURL(this.files[i]);
                fr.onload=function(f){
                    // //console.log(f.target.result)
                    r=saveimage(f.target.result);
                    // //console.log("R",r)
                    $images.push(r)
                   

                }
            }

        $("#pModal").modal("hide");
            
            // var file = this.files;
            // //console.log(fr.result)

            // //console.log(getBase64Image(file))
        })

        // url = 'http://52.38.92.234:8080';
        //console.log(url)
        $("body").on("change","#category_id",function(){
            console.log($(this).val())
            title=$(this).find("option:selected").attr('rel-title') 
            console.log(title)  
            $("#category").val(title);

        });
        $('#save').click(function(e){
            e.preventDefault()
               /*SERIALIZE WONT WORK*/

               im="";
               for (var i = $images.length - 1; i >= 0; i--) {
                   im+=$images[i]+",";
               }
               $publish=false;
               $vc=false;
               if ($('#publish').is(":checked")) {
                $publish=true
               }
               if ($('#vc').is(":checked")) {
                $vc=true
               }
               $('#approved').val($publish);
               $('#content_partner').val($vc);
               $('#images').val(JSON.stringify(im.split(",")));

               if ($('#videos').val().indexOf('[') == -1)
                {
                  // $('#videos').val("['"+$('#videos').val()+"']");
                }
                
               $form=$('#addhackform').serialize();
          
               url="http://"+host+"/contents/submit";
               //console.log($form)
                $.ajax({
                    type:"POST",
                    url:url,
                 
                    data:$form,
                    success:function(r){
                        //console.log(r)
                        alert("Edit Saved");
                        location.reload();
                        
                    },
                    error:function(e){
                        console.log(e)
                        alert("Cannot connect to server")
                    }
                })
        })


    })
</script>
@stop