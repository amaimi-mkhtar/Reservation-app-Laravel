@extends('layouts.adminmaster')

@section('content')
<section class="jumbotron ">
    <div class="container-fluid text-center">    
        <div class="row content  bg-light">
        
            <div class="col-sm-2 sidenav">
            <hr>
            <table class="table table-dark">
                <tbody >
                    <tr style="padding:0px;border:0px;" colspan="2">
                    <td > <h2 class="jumbotron-heading">Reservations</h2></td>
                    </tr>
                   
                    <tr style="padding:0px;border:0px;">
                    <td><a  href="/administration/reservations" class="lead text-muted" style="color:gray;">Consulter</a></td>
                    </tr>
                   
                </tbody>
            </table>
            </div>
            <div class="col-sm-10 text-left"> 
            <hr>
            <h2 class="jumbotron-heading"> Add Reservation</h2>
            <hr>
            @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <p>{{$error}}</p>
                            </div>
                            @endforeach
                            <hr>
<form method="POST" action="/administration/reservations/AddReservation" >
                    {{csrf_field()}}
            <div class="col-6">
                <?php $clients = \App\client::all()->pluck('email'); ?>
                    <select class="form-control" name="email_client" value="{{old('email_client')}}">
                        <option disiabled>Email Client</option>
                        @foreach($clients as $client)
                        <option>{{$client}}</option>
                        @endforeach
                        
                    </select>
               
            </div>
            <br>
            <div class="col-6">
                <?php $salons = \App\salon::all()->pluck('NAME_SALON'); ?>
                    <select name="salon_name" class="form-control" id="salon_name" value="{{old('salon_name')}}">
                        <option >Salon</option>
                        @foreach($salons as $salon)
                        <option>{{$salon}}</option>
                        @endforeach
                        
                    </select>
               
                 </div>
                 <meta name="csrf-token" id="token"content="{{ csrf_token() }}">

        <script  >
         
          $('#salon_name').on('change', function(){
               
               var salon=$(this).val();
               if(salon){
                   
                   $.ajax({
                      headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                         },
                    
                       type:'POST',
                       url:'/ajaxadminfetchdata' ,
                       data:$("#salon_name").serialize(),
                       success:function(html){
                           
                           $('#coiffeur_name').html(html);
                           $('#prestation').html("<option>Select coiffeur first</option>");
                       }

                   });
               }else{   
                         $('#coiffeur_name').html("<option>Select coiffeur first</option>");
                         $('#prestation').html("<option>Select coiffeur first</option>");
                        
                       
               }
               


          });
          
        
         </script>




            <br>
            <div class="col-6">
                
                    <select class="form-control" name="coiffeur_name" id="coiffeur_name" value="{{old('coiffeur_name')}}">
                      
                    </select>
               
            </div>
            <script  >

        $('#coiffeur_name').on('change', function(){
               
               var coiffeur = $(this).val();
               if(coiffeur){
               $.ajax({
                     headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                   
                      type:'POST',
                      url:'/ajaxadminfetchdata' ,
                      data:$("#coiffeur_name").serialize(),
                      success:function(html){
                          
                          $('#prestation').html(html);
                          
                      }
           
                  });
              }
                    
               
           
           
           });


</script>
            
            <br>
            <div class="col-6">
                
                    <select class="form-control" name="prestation_id" id="prestation" >
                      
                        
                    </select>
               
            </div>
            <br>
            <div class="row">
            <div class="col-2">
                
                <label  class="form-control" >Date & Time</label>
               
            </div>
            <div class="col-3">
                
                <input  class="form-control" type="date" name="date_reservation" value="{{old('date_reservation')}}">
               
            </div>
            
            <div class="col-2">
                
                   
                <input  class="form-control" type="time" name="time_reservation" value="{{old('time_reservation')}}" >
               
            </div>
            </div>
            <br>
            <div class="col-6">
            <input type="submit" class="form-control btn-danger" value="Add Reservation">
            </div>
            </form>
            </br>
            </div>


@endsection