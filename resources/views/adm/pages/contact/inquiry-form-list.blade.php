@extends('adm.layout.admin-index')
@section('title','Add: Client')

@section('toast')
@include('adm.widget.toast')
@endsection

@section('custom-js')
<script>
    $(document).ready(function() {
        $(".del-modal").click(function() {
            var delete_id = $(this).attr('data-id');
            var data_title = $(this).attr('data-title');

            $('.delete-form').attr('action', delete_id);
            $('.delete-title').html(data_title);
        });
    });

    $(".block-control").addClass("menu-is-opening menu-open");
    $(".block-control a").addClass("active-menu");


    function updateStatus($id) {
        $.ajax({
            url: "{{route('status.update')}}",
            type: 'post',
            data: {
                id: $id,
                table: 'client'
            },
            success: function(result) {
                console.log(result);
                location.reload();

            }
        })
    }

    $(".row_position").sortable({
        stop: function() {
            var selectedData = new Array();
            $('.row_position>tr').each(function() {
                selectedData.push($(this).attr("id"));
            });
            updateOrder(selectedData);

        }
    });

    function updateOrder(data) {
        $.ajax({
            url: "{{url('api')}}/admin/item/update-item-priority",
            type: 'post',
            data: {
                position: data,
                table: 'client'
            },
            success: function(result) {
                console.log(result);
            }
        })
    }
</script>
@endsection


@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">


            <div class="row">

                <div class="col-sm-6">
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
                        <li class="breadcrumb-item active">Inquiry List</li>
                    </ol>
                </div>


                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a class="btn btn-dark btn-sm ml-1" onclick="goBack()"> ❮ Back</a>

                    </ol>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Inquiry List</h1>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <section class="content">
        <div class="container-fluid">

            <div class="row">


                <div class="col-md-12 card card-theme">
                    <div class="card-header">
                        <h3 class="card-title">Inquiry Lists</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap" id="example2">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Client</th>
                                    <th>Product Name</th>
                                    <th>Image</th>
                                    <th>Country</th>
                                    <th>Phone No</th>
                                    <th width="300">Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody class="row_position">
                                @foreach($inquiryForms as $i => $inquiryForm)
                                <tr id="{{$inquiryForm->id}}">
                                    <td>{{++$i}}</td>
                                    <td>{{$inquiryForm->client_name}}</td>
                                    <td>{{$inquiryForm->title}}</td>
                                    <td><img width="120" src="{{url('web')}}/media/sm/{{$inquiryForm->item_image}}" ></td>
                                    <td>{{$inquiryForm->client_country}}</td>
                                    <td>{{$inquiryForm->client_phone}}</td>
                                    <td>{{$inquiryForm->client_message}}</td>
                    </div>

                    </td>
                    <td>
                        <button class="btn btn-xs btn-danger del-modal float-left" title="Delete Inquiry" 
                        data-id="{{route('inquiry-form.destroy', $inquiryForm->id)}}" data-title="{{ $inquiryFormus->name}}"
                         data-toggle="modal" data-target="#modal-default"><i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                    </tr>
                    @endforeach

                    </tbody>
                    </table>

                </div>
            </div>
        </div>

</div>


</div>
</section>
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Inquiry</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-footer justify-content-between d-block ">

                <form class="delete-form float-right" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="button" class="btn btn-default mr-4" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger float-right" title="Delete Record"><i class="fas fa-trash-alt"></i> Delete</button>


                </form>
            </div>
        </div>
    </div>
</div>

@endsection