
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
                    <td > <h2 class="jumbotron-heading">Statistiques</h2></td>
                    </tr>
                    <tr style="padding:0px;border:0px;" colspan="2">
                           
                    </tr>
                    <tr style="padding:0px;border:0px;">
                    <td><a  href="/administration/statistiques/salons" class="lead text-muted " style="color:gray;">Salons</a></td>
                    </tr>
                    <tr style="padding:0px;border:0px;">
                    <td><a  href="/administration/statistiques/coiffeurs" class="lead text-muted" style="color:gray;">Coiffeurs</a></td>
                    </tr>
                    <tr style="padding:0px;border:0px;">
                    <td><a  href="/administration/statistiques/prestations" class="lead text-muted" style="color:gray;">Prestations</a></td>
                    </tr>
                </tbody>
            </table>
            </div>
            <?php 
            Carbon\Carbon::setToStringFormat('l Y/m/d ');
            $mois =  Carbon\Carbon::now(); ?>
            <div class="col-sm-10 text-center"> 
            <h2 class="jumbotron-heading"><p class=" lead text-muted text-left">Mois:{{$mois->format('m')}}</p> Top chiffre d'affaires  </h2>
            <hr>
          
            <h3 class="lead text-muted text-left"></h3>
            <div class="col-sm-6 text-center"> 
            <h3 class="lead text-muted text-left">salon</h3>
            <table class="table table-dark">
            <thead>
            <tr>
            <td>Salon_Name</td>
            <td>N° Reservations/mois</td>
            <td>CA</td>
            </tr>
            </thead>
            <tbody>
            <tr>
            <td class="text-info" >Keef</td>
            <td class="text-warning">150</td>
            <td class="text-danger">42500$</td>
            </tr>
            </tbody>
            </table>
            </div>
            
              
            <div class="col-sm-8 text-center"> 
            <h3 class="lead text-muted text-left">coiffeur</h3>
            <table class="table table-dark">
            <thead>
            <tr>
            <td>Coiffeur_Name</td>
            <td>Salon</td>
            <td>N° Reservations/mois</td>
            <td>CA</td>
            </tr>
            </thead>
            <tbody>
            <tr>
            <td class="text-success" >Said farahi</td>
            <td class="text-info" >Paris</td>
            <td class="text-warning">34</td>
            <td class="text-danger">542$</td>
            </tr>
            </tbody>
            </table>
            </div> 

            <div class="col-sm-8 text-center"> 
            <h3 class="lead text-muted text-left">Prestation</h3>
            <table class="table table-dark">
            <thead>
            <tr>
            <td>Prestation_Name</td>
            <td>Coiffeur</td>
            <td>Salon</td>
            <td>N° Reservations/mois</td>
            <td>CA</td>
            </tr>
            </thead>
            <tbody>
            <tr>
            <td class="text-pramiry" >Panga</td>
            <td class="text-success" >Said farahi</td>
            <td class="text-info" >Paris</td>
            <td class="text-warning">34</td>
            <td class="text-danger">542$</td>
            </tr>
            </tbody>
            </table>
            </div> 
                            </div>
                        </div>
                
</section>  
  
            @endsection
