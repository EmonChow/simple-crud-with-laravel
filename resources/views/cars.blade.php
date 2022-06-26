


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js">   
    <title>Task_one</title>
</head>
<body>
    
<style>
        .pagination{
            float: right;
            margin-top: 10px;
        }
</style>



<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> MY TASK ONE </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('cars.create')}}"> Create New Car</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered" >
        <tr>
            <th>SL</th>
            <th>Model</th>
            <th>Year</th>
            <th>Action</th>
        </tr>
        @foreach ($cars as $k=> $car)
        <tr>
             <td>{{$k++}}</td>
            <td>{{$car->model}} <br>
            {{Carbon\Carbon::parse($car->created_at)->diffForHumans()}}

            </td>
            <td>{{ $car->year }}</td>
            <td>
                 <a class="btn btn-info" href="">Show</a>
                    <a class="btn btn-primary" href="{{route('cars.edit',$car->id)}}">Edit</a>
                <form action="{{route('cars.delete',$car->id)}}" method="get">
   
                    @csrf
             
                    <button type="submit"  class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach



     


        <div class="card-footer">
            <div class="row justify-content-between">
                <div class="col-md-6">
              
                </div>
                <div class="col-md-2">

                </div>





    </table>

    {!! $cars->links() !!}
</body>
</html>




