@extends('../layouts.app')
@section('sub-title','Dashboard')
@section('navbar')
    @include('../components.navbar')
@endsection
@section('main-sidebar')
    @include('../components.main-sidebar')
@endsection

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                <div class="card text-white bg-danger mb-3" >
                  
                    <div class="card-body mb-3">
                    <h1 class="font-weight-bold">
                        @if($msgs->count() > 0 ) 
                             {{ count($msgs) }}
                        @else
                             No Message
                        @endif
                    </h1>
                        <h5 class="card-title">Total Messages</h5>
                       
                    </div>
                    <a href="/">
                        <div class=" text-center opacity"><span>More info. <i class="fas fa-arrow-circle-right"></i> </span></div>
                    </a>
                </div>
                </div>

                <div class="col-md-4">
                <div class="card text-white bg-success mb-3" >
                  
                    <div class="card-body mb-3">
                    <h1 class="font-weight-bold">
                        @if($projects->count() > 0 ) 
                             {{ count($projects) }}
                        @else
                             No Project
                        @endif
                    </h1>
                        <h5 class="card-title">Total Projects</h5>
                       
                    </div>
                   <a href="/">
                        <div class=" text-center opacity"><span>More info. <i class="fas fa-arrow-circle-right"></i> </span></div>
                    </a>
                </div>
                </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                    <div class="card text-white bg-primary mb-3" >
                        <div class="card-body mb-3">
                        <h1 class="font-weight-light">
                        @forelse ($personal_infos as $personal_info)
                        {{ $personal_info->updated_at}}
                        @empty
                        <tr>No Result Found</tr>
                        @endforelse
                        </h1>
                            <h5 class="card-title">Personal Info date last updated</h5>
                        
                        </div>
                    <a href="/">
                            <div class=" text-center opacity"><span>More info. <i class="fas fa-arrow-circle-right"></i> </span></div>
                        </a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- /.content-wrapper -->
@endsection

@section('footer')
    @include('../components.footer')
@endsection


    