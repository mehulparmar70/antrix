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

    $(".contact-inquiry").addClass("menu-is-opening menu-open");
    $(".contact-inquiry a").addClass("active-menu");


</script>
@endsection


@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">

        <div class="row">
          <div class="col-sm-6">
            <ol class="breadcrumb ">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Enquiry List</li>
            </ol>
          </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <a class="btn btn-dark btn-sm ml-1" onclick="goBack()"> ❮ Back</a>
          </ol>
        </div>
        <div class="col-sm-6">
            <h3 class="mb-0">Enquiry List</h3>
          </div>
    </div>
    


    </section>


    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12 card card-theme">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover" id="example2">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Status</th>
                                    <th>Name</th>
                                    <th>Country</th>
                                    <th>Phone No</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th class="col-2">Page Url</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($contactus as $i => $contact)
                                <tr id="{{$contact->id}}">
                                    <td>{{++$i}}</td>
                                    <td>
                                        @if($contact->status == 'success')<p class="badge badge-success text-capitalized">Inquiry</p>
                                        @else
                                            <p class="badge badge-danger text-md text-capitalized">Spam</p>
                                        @endif
                                    </td>

                                    <td>{{$contact->full_name}}</td>
                                    <td>{{$contact->country}}</td>
                                    <td>{{$contact->phone_no}}</td>
                                    <td>{{$contact->email}}</td>
                                    <td>{{$contact->message}}</td>
                                    <td style="max-width:200px" class="col-2">{{$contact->page_url}}</td>
                    </td>
                    <td>
                        <button class="btn btn-xs btn-danger del-modal float-left" title="Delete Enquiry" data-id="{{route('contactus.destroy', $contact->id)}}" data-title="{{ $contact->full_name}}" data-toggle="modal" data-target="#modal-default"><i class="fas fa-trash-alt"></i>
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
                <h4 class="modal-title">Delete Enquiry</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label>Enquiry Name</label>
                <h5 class="modal-title delete-title"></h5>
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