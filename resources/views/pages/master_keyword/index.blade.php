@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('/assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Master Keyword</li>
    </ol>
</nav>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Master Keywords</h4>
    </div>
    @if(Auth::user()->type == "Admin")
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <a href="{{ url('/master_keyword/create') }}" class="btn btn-sm btn-primary btn-icon-text mr-2 d-none d-md-block">
            <i class="btn-icon-prepend" data-feather="plus"></i>
            Create Master Keyword
        </a>
    </div>
    @endif
</div>
<div class="row">
    <div class="col-lg-12 col-xl-12 stretch-card">
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTableExample" class="table table-hover table-bordered mb-0">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="example-select-all"></th>
                                <th>Keywords</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($searchlist))
                            @foreach($searchlist as $slist)
                            <tr>
                                <td><input type="checkbox" value="{{$slist->id}}" class="checkSingle" name="select_all[]"></td>
                                <td>{{$slist->keyword}}</td>
                                <td>
                                    <form action="/master_keyword/destroy" method="post">
                                        <input type="hidden" name="energy_id" value="">
                                        <div class="custom-control custom-switch">
                                            <label class="custom-control-label" for="customSwitch1"></label>
                                        </div>
                                    </form>
                                </td>
                                <td>
                                    @if(Auth::user()->type == "Admin")
                                    <a href="{{url('/master_keyword/'.$slist->id.'/edit')}}" class="btn btn-sm btn-warning btn-icon-text" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                        <i class="fas fa-edit text-white"></i>
                                    </a>
                                    <a href="{{ route('master_keyword.index') }}" data-confirm="Are you sure to delete this item?" class="btn btn-sm btn-danger btn-icon-text" onclick="return myFunction();"> 
                                       <i class="fas fa-trash text-white"></i> 
                                    </a> 
                                
                                    <form id="delete-form-{{$slist->id}}"  action="{{route('master_keyword.destroy', $slist->id)}}" 
                                    method="post"> 
                                        @csrf @method('DELETE') 
                                    </form> 
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('plugin-scripts')
<script src="{{ asset('/assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
<script>
    $(function() {
        $('#dataTableExample').DataTable();
    });

    function myFunction() {
      var x = confirm("Are You Sure to delete this");
      if(x == true) {
            document.getElementById('delete-form-{{$slist->id}}').submit();
            return false;
      } else {
            return false;
      }
    }
</script>
@endpush