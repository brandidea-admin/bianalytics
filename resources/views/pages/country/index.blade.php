@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('/assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Countries</li>
    </ol>
</nav>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Countries</h4>
    </div>
    @if(Auth::user()->type == "Admin")
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <a href="{{ url('/country/create') }}" class="btn btn-sm btn-primary btn-icon-text mr-2 d-none d-md-block">
            <i class="btn-icon-prepend" data-feather="plus"></i>
            Add Country
        </a>
    </div>
    @endif
</div>
<div class="row">
    <div class="col-lg-12 col-xl-12 stretch-card">
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="companyTable" class="table table-hover table-bordered mb-0">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id=""></th>
                                <th>Country Name</th>
                                <th>Site URL</th>
                                <th>Status</th>
                                <th>Actions</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($searchlist))
                            @foreach($searchlist as $slist)
                            <tr>
                                <td><input type="checkbox" value="" class="checkSingle" name="select_all[]"></td>
                                <td>{{$slist->country_name}}</td>
                                <td>{{$slist->country_site}}</td>
                                <td></td>
                                <td>

                                    @if(Auth::user()->type == "Admin")

                                    <a href="{{url('/country/'.$slist->id.'/edit')}}" class="btn btn-sm btn-warning btn-icon-text" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                        <i class="fas fa-edit text-white"></i>
                                    </a>
                                    @endif
                                </td>
                                
                                <td>

                                    @if(Auth::user()->type == "Admin")
        
                                        <form action="{{ route('country.destroy', $slist->id)}}" class="myForm1" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"><i class="fas fa-trash text-white"></i> </button>
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
        $('#companyTable').DataTable();
    });

    $('.myForm1').submit(function() {
        var status = confirm("Are you sure to Delete this record ?");
        if(status == false){
        return false;
        }
        else{
        return true; 
        }
    });


</script>
@endpush