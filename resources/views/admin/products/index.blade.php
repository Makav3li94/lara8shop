@extends('admin.admin_layout')

@section('content')
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">All Products</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                                <li class="breadcrumb-item active" aria-current="page">All Products</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">


                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">All Products</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name (EN)</th>
                                        <th>Name (FA)</th>
                                        <th>Image</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($products as $key => $product)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->name_fa}}</td>
                                            <td><img src="{{asset($product->image)}}" width="70" alt="{{$product->name}}"></td>
                                            <td>{{$product->qty}}</td>
                                            <td>{{$product->status == 1 ? 'Active' : 'Inactive'}}</td>
                                            <td>
                                                <a href="{{route('admin.products.edit',$product->id)}}"  class="btn btn-sm btn-warning">Edit</a>
                                                <form id="delete_brand_{{$product->id}}" action="{{route('admin.products.destroy',$product->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="submit" onclick="deleteElement()" class="btn btn-sm btn-danger" value="Delete">

                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        No Data
                                    @endforelse


                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name (EN)</th>
                                        <th>Name (FA)</th>
                                        <th>Image</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- /.box -->
                </div>

                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection

