@if (Session('success'))

  <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> {{Session('success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@elseif(Session('error'))

  <div id="alert" class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong>   {{Session('error')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif