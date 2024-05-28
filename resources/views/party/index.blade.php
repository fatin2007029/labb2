@extends('layout.app')

@section('content')

<!-- Start Content-->
<div class="container-fluid">
<div class="row">
 <div class="col">
                    <div class="page-title-box">
                        <h2 class="page-title font-weight-bold text-uppercase">Manage Clients</h2>
                    </div>
                </div>

            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">

                @if(session('status'))
              <div class="alert alert-success">  {{session('status')}} </div>
            @endif  


            @if(count($errors))
            <div class="alert alert-danger">
            <strong>Validation errors: Please fix the following issues</strong>
            <ul>
            @foreach($errors->all() as $error)

               <li> {{ $error }} </li>
               @endforeach
            </ul>    
             
            </div>
            @endif
                    <div class="card-box">
                        <a href="{{ route('add-party') }}" class="btn btn-sm btn-blue waves-effect waves-light float-right">
                            <i class="mdi mdi-plus-circle"></i> Add Party
                        </a>
                        <h4 class="header-title mb-4 text-uppercase">Manage Clients</h4>
                        <div class="row">
                            <div class="col-sm-12 col-md-10">
                                
                        </div>
                        <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100 table-bordered"
                            id="tickets-table">
                            <thead>
                                <tr>
                                    <th>
                                        S.No.
                                    </th>
                                    <th>Client Type</th>
                                    <th>Client Info</th>
                                    <th>Bank Details</th>
                                    
                                    <th>Created At</th>
                                    <th class="hidden-sm">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @if(count($parties))
                                @foreach($parties as $index => $party)

                                <tr>
                                    <td><b>{{ $index+1 }}</b></td>
                                    <td>
                                    <span class="badge badge-info">  {{ $party->party_type }} </span>
                                    </td>

                                    <td>
                                        <ul class="list-unstyled">
                                        <li><b>Name :</b><span> {{ $party->full_name }} </span></li>
                                            <li><b>Phone :</b><span> {{ $party->phone_no }}</span></li>
                                            <li><b>Address :</b> <span> {{ $party->address }}</span></li>
                                        </ul>
                                    </td>

                                    <td>
                                        <ul class="list-unstyled">
                                        <li><b>Account Holder Name:</b><span> {{ $party->account_holder_name }} </span></li>
                                            <li><b>Acc No :</b><span> {{ $party->account_no }}</span></li>
                                            <li><b>Bank Name :</b> <span> {{ $party->bank_name }}</span></li>
                                            <li><b>IFSC Code :</b> <span> {{ $party->ifsc_code }}</span></li>
                                            <li><b>Branch Address :</b> <span> {{ $party->branch_address }}</span></li>
                                        </ul>
                                    </td>

                                    <td>
                                    {{ date("d-m-Y", strtotime($party->created_at)) }}
                                    </td>

                                    <td>
                                        <div class="btn-group dropdown">
                                            <a href="javascript: void(0);"
                                                class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm"
                                                data-toggle="dropdown" aria-expanded="false"><i
                                                    class="mdi mdi-dots-horizontal"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{ route('edit-party', $party->id) }}"><i
                                                        class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Edit</a>
                                               <!-- <a class="dropdown-item" href="#"><i
                                                        class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Delete</a> -->

                                               <form method="post"  action="{{ route('delete-party', $party) }}">
                                                @csrf
                                                @method('DELETE')
                                                 
                                                 <button type="submit" class="dropdown-item"><i
                                                        class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Delete</button> 
                                                  </form>    
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                @endforeach
                              @endif

                            </tbody>
                        </table>

                    </div><!-- end col -->
                </div>

            </div>
            <!-- end row -->

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

</div>


@endsection
