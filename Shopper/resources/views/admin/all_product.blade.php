@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê sản phẩm
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <div class="panel-body">
                    <?php
                    $message=Session::get('message');
                    if($message){
                        echo $message;
                        Session::put('message',null);
                    }
                    ?>
                    <table class="table table-striped b-t b-light">
                        <thead>
                        <tr>
                            <th style="width:20px;">
                            </th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Hình sản phẩm</th>
                            <th>Mô tả sản phẩm</th>
                            <th>Nội dung sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Thương hiệu</th>
                            <th>Hiển thị</th>
                            <th style="width:30px;"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($all_product as $key=>$value)
                            <tr>
                                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                                <td>{{$value->product_name}}</td>
                                <td>{{$value->product_price}}</td>
                                <td><img src="public/uploads/product/{{$value->product_image}}" height="50" width="50"/></td>
                                <td>{{$value->product_desc}}</td>
                                <td>{{$value->product_content}}</td>
                                <td>{{$value->category_name}}</td>
                                <td>{{$value->brand_name}}</td>
                                <td><span class="text-ellipsis">
                            <?php
                                        if($value->product_status==0){
                                        ?>
                                        <a href="{{URL::to('unactive-product='.$value->product_id)}}"><span class="fa fa-thumbs-down" style="font-size:25px;color:red"></span></a>
                                        <?php }else{ ?>
                                        <a href="{{URL::to('active-product='.$value->product_id)}}"><span class="fa fa-thumbs-up" style="font-size:25px;color:green"></span></a>
                                        <?php } ?>

                            </span></td>
                                <td>
                                    <a href="{{URL::to('update-product='.$value->product_id)}}" class="active" ui-toggle-class="">
                                        <i class="fa fa-pencil-square-o text-success text-active"></i>
                                    </a>
                                    <a onclick="return confirm('Are you sure to delete?')" href="{{URL::to('delete-product='.$value->product_id)}}" class="active" ui-toggle-class="">
                                        <i class="fa fa-times text-danger text"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            <span>{!!$all_product->render()!!}</span>
                        </ul>
                    </div>
                </footer>
            </div>
        </div>
@endsection