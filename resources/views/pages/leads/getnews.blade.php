@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('/assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
<style type="text/css">
    .custom-row{
        border: 1px solid gainsboro;
        padding: 10px;
        margin: auto !important;
    }
    .custom-col{
        overflow: scroll;
        border-right: 1px solid gainsboro;
        padding: 10px 5px;
        margin: 0px;
    }
</style>
@endpush

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Lead</li>
    </ol>
</nav>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Leads</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
         
        <button type="button" data-url="#" data-method="POST" data-request="ajax-confirm" data-ask_image="warning" data-ask="Are you sure you want to delete?"  class="btn btn-sm btn-danger deletebulk btn-icon-text mb-2 mb-md-0">
            <i class="btn-icon-prepend" data-feather="trash"></i>
            Delete
        </button>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-xl-12 stretch-card">
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="leadTable" class="table table-hover table-bordered mb-0">
                         <thead>
                             <th colspan="5"> Lead Details</th>
                         </thead>
                        <tbody>
                            @for($n=0;$n<=4;$n++)
                             <tr>
                                <td><input type="checkbox" value="" class="checkSingle" name="select_all[]"></td>
                                <td colspan="4"> 
                                    <div class="row">
                                        <div class="col-md-6 " style="border-right:1px solid gainsboro; ">
                                            <dl class="">
                                                <dt>First Name : </dt>
                                                <br>
                                                <dt>Last Name : </dt>
                                                <br>
                                                <dt>Designation : </dt>
                                                <br>
                                                <dt>Company : </dt>

                                            </dl>
                                        </div>
                                        <div class="col-md-6">
                                            <dl>
                                                <dt>Email : </dt>
                                                <br>
                                                <dt>Phone Number : </dt>
                                                <br>
                                                <dt>Keywords : </dt>
                                                <br>
                                                <dt>Location : </dt>
                                                 
                                            </dl>
                                        </div>
                                        
                                    </div>
                                    <b>Recent News:</b>
                                    <ol>   
                                        @for($i=0;$i<=2;$i++)
                                        <li>
                                             
                                                <div class="row custom-row">
                                                    <div class="col-md-6 custom-col">
                                                        <p>
                                                           In marketing, lead generation is the initiation of consumer interest or enquiry into products or services of a business. Leads can be created for purposes such as list building, e-newsletter list acquisition or for sales leads.
                                                        </p>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select>
                                                            <option value="">Select</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select>
                                                            <option value="">Select</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select>
                                                            <option value="">Select</option>
                                                        </select>
                                                    </div>
                                                </div>

                                             
                                        </li>
                                        @endfor
                                    </ol>

                                </td>
                                
                            </tr>
                             @endfor
                                
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
 
@endpush