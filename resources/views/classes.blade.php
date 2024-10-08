
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>All Classes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
    rel="stylesheet">
  <style>
    * {
      font-family: "Lato", sans-serif;
    }
  </style>
</head>

<body>
  <main>
    <div class="container my-5">
      <div class="bg-light p-5 rounded">
        <h2 class="fw-bold fs-2 mb-5 pb-2">All Classes</h2>
        <table class="table table-hover">
          <thead>
            <tr class="table-dark">
              <th scope="col">Class Title</th>
              <th scope="col">Capacity</th>
              <th scope="col">Price</th>
              <th scope="col">timeFrom</th>
              <th scope="col">timeTo</th>
              <th scope="col">isFulled</th>
              <th scope="col">Edit</th>
              <th scope="col">Show</th>
              <th scope="col">Delete</th>
              <th scope="col">DeleteofForm</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($classes as $class )
            <tr>
                <td scope="row">{{$class['className']}}</td>
                <td>{{$class['capacity']}}</td>
                <td>{{$class['price']}}</td>
                <td>{{$class['timeFrom']}}</td>
                <td>{{$class['timeTo']}}</td>
                <td>{{($class['isFulled']=== 1) ? "yes" : "no"}}</td>
                <td><a href="{{route('class.edit', $class['id'])}}">Edit</a></td>
                <td><a href="{{route('class.show', $class['id'])}}">show</a></td>
                <td><a  onclick=" return confirm('Are you sure you want to delete?')" href="{{route('class.destroy', $class['id'])}}">Delete</a></td>
                <td>
                  <form action="{{ route('delete.form', $class['id'])}}" method="post">
                  @csrf
                   @method('DELETE')
                  <input type="hidden" name="id"  onclick=" return confirm('Are you sure you want to delete?')" value="{{ $class->id }}">
                  <input type="submit" value="delete">
                  </form>
                  </td>
                  
              </tr>
            @endforeach
            
            
          </tbody>
        </table>
      </div>
    </div>
  </main>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>