@extends("backend.layout.master")
@section('content')
@section('title', 'Manager User')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<style>
    .hidden-1{
        display: none;
    }
    .toast-error{
        background-color: red;
    }

    #toast-container .toast-success{
        background-color: green;
    }

    .toast-title{
        /*color: green;*/
    }

    #successModal{
        margin-top: 15%;
    }

    #errorModal{
        margin-top: 15%;
    }

    .modal-backdrop{
        display: none;
    }

    .hide{
        display: none;
    }

    .hidde{
        display: block;
    }

</style>
<?php
$message = \Illuminate\Support\Facades\Session::get('message');

if ($message){
    echo '<span class="text-alert">'.$message.'</span>';
    \Illuminate\Support\Facades\Session::put('message',null);
}
?>
<h2 style="text-align: center;margin-left: 13%;color: #00abf1;margin-top: 20px">Danh sách các loại nhà</h2>
<div id="input-container" style="margin-top: 50px">
    <!-- Ô input mẫu -->

    <div style="margin-bottom: 5px">
        <button type="button" class="btn btn-success" id="add-field">Thêm</button>
        <button type="button" id="submit-data" class="btn btn-success">Submit</button>
    </div>
    @foreach($view as $key => $value)
    <div class="input-row" data-value="{{$value['id']}}">
    <input type="hidden" class="value-id" value="{{$value['id']}}">
    <input type="text" name="field_0"  placeholder="Field 0" class="alert alert-primary"  value="{{$value['id']}}" hidden role="alert"/>
    <input type="text" name="field_a" placeholder="Field 1" value="{{$value['name']}}" class="alert alert-primary" role="alert"/>
    <input type="text" name="field_b" placeholder="Field 2" value="{{$value['name_slug']}}" class="alert alert-primary" role="alert"/>
    <input type="text" name="field_3" placeholder="Field 3"  value="{{$value['description']}}" class="alert alert-primary" role="alert"/>
    <button class="remove-row btn btn-danger @if($value['id'] !='') hide @else hidde @endif"">Xóa</button>
    </div>
    @endforeach

    <div class="input-row hidden-1"  box="0">
        <input type="text" name="field_0" placeholder="Field 0" hidden class="alert alert-primary" role="alert"/>
        <input type="text" name="field_a" placeholder="Field 1" class="alert alert-primary" role="alert"/>
        <input type="text" name="field_b" placeholder="Field 2" class="alert alert-primary" role="alert"/>
        <input type="text" name="field_3" placeholder="Field 3" class="alert alert-primary" role="alert"/>
        <button class="remove-row btn btn-danger" >Xóa</button>
        <!-- Thêm các ô input khác nếu cần -->
    </div>

</div>
<br>
<br>
<br>

<!-- modal success -->
<div class="modal fade" id="successModal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success" id="staticBackdropLabel">Thành công</h5>
            </div>
            <div class="modal-body">
                <p class="msg_success text-primary"></p>
            </div>
            <div class="modal-footer">
                {{--            <a id="redirect-url" class="btn btn-success">Xem</a>--}}
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- modal error -->
<div class="modal fade" id="errorModal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="staticBackdropLabel">Có lỗi xảy ra</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="msg_error"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">--}}

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    const csrf = "{{ csrf_token() }}";

    $(document).ready(function(){
        $('#input-container').on('click', '.remove-row', function(){
            if ($('#input-container .input-row').length > 1) {
                // Lấy giá trị của input field_0 trong dòng hiện tại
                var fieldValue = $(this).closest('.input-row').find('input[name="field_0"]').val();

                // Kiểm tra nếu giá trị của input field_0 khác rỗng
                if (fieldValue !== "") {
                    // Nếu có giá trị, không xóa dòng này
                    alert('Không thể xóa dòng có giá trị Field 0.');
                    return;
                }

                // Nếu không có giá trị, loại bỏ dòng chứa nút "Xóa" được nhấp vào
                $(this).closest('.input-row').remove();
            } else {
                // Nếu chỉ còn một dòng, không làm gì cả
                alert('Không thể xóa dòng cuối cùng.');
            }
        });

        // $('#add-field').click(function(){
        //     // Xóa thuộc tính "box" từ tất cả các hàng hiện có
        //     //$('.input-row').removeAttr('box');
        //
        //     // In ra hàng mẫu để kiểm tra
        //     //console.log($('#input-container .hidden-1').first());
        //
        //     // Sao chép ô input mẫu và thêm vào form
        //     //var newRow = $('#input-container .input-row').first().clone();
        //
        //     var hiddenRow = $('.hidden-1');
        //
        //     // Thay đổi thuộc tính display của div ẩn thành block
        //     hiddenRow.css('display', 'block');
        //
        //     // Sao chép hàng từ div ẩn
        //     var newRow = hiddenRow.clone();
        //
        //     // Đặt giá trị của các ô input về rỗng
        //     newRow.find('input[type="text"]').val('');
        //
        //     // Đặt thuộc tính box của hàng mới
        //     newRow.attr('box', '1');
        //
        //     // Đặt giá trị của các input hidden trong hàng mới về rỗng
        //     newRow.find('.value-id').val('');
        //
        //     // Thay đổi trạng thái hiển thị của div ẩn trở lại
        //     hiddenRow.css('display', 'none');
        //
        //     // newRow.find('input[type="text"]').val('');
        //     // newRow.attr('box', '1');
        //     // if (newRow.attr('box') == '1') {
        //     //     // Đặt giá trị của tất cả các ô input hidden trong hàng mới về rỗng
        //     //     newRow.find('.value-id').val('');
        //     // }
        //     // if(){
        //     //
        //     // }
        //
        //     //newRow.find('[box="1"]').val('');
        //     $('#input-container').append(newRow);
        // });

        $('#add-field').off().click(function(){
            // Sao chép nội dung của hàng mẫu ẩn và thêm vào container
            var newRow = $('.hidden-1').html();
            console.log(newRow)
            $('#input-container').append('<div class="input-row">' + newRow + '</div>');

            // Đặt giá trị của các ô input trong hàng mới về rỗng
            $('#input-container .input-row').last().find('input[type="text"]').val('');

            // Đặt giá trị của các input hidden trong hàng mới về rỗng
            $('#input-container .input-row').last().find('.value-id').val('');
        });

        // $('.input-row').each(function(){
        //     var valueId = $(this).find('.value-id').val();
        //     console.log(valueId)
        //     if (valueId != '' ) {
        //         $(this).find('.remove-row').hide();
        //     } else {
        //         $(this).find('.remove-row').show();
        //     }
        // });

        // Xử lý khi nhấp vào nút "Submit"
        $('#submit-data').click(function(){
            var formData = []; // Khởi tạo mảng để lưu trữ dữ liệu từ tất cả các dòng

            // Tìm tất cả các dòng input và lặp qua từng dòng
            $('#input-container .input-row').each(function(){
                if($(this).attr('box') != '0'){
                    var rowValues = {}; // Khởi tạo đối tượng để lưu trữ dữ liệu từ mỗi dòng

                    // Tìm tất cả các ô input trong dòng hiện tại và lặp qua từng ô
                    $(this).find('input[type="text"]').each(function(){
                        var fieldName = $(this).attr('name');
                        var fieldValue = $(this).val();
                        if (fieldName !== undefined && fieldName !== "") {
                            rowValues[fieldName] = fieldValue;
                        }
                    });

                    // Sau khi thu thập dữ liệu từ một dòng, thêm đối tượng dữ liệu này vào mảng formData
                    formData.push(rowValues);
                }
            });
            //console.log(formData); // Hiển thị dữ liệu đã thu thập được trong console
            //console.log(JSON.stringify(formData));
            $.ajax({
                url: '{{route('ctn.createTypeListHouse')}}',
                headers: {
                    "Content-Type": "application/json",
                    Accept: "application/json",
                    'x-csrf-token': csrf
                },
                type: 'POST',
                //data: {data: formData},
                data: JSON.stringify(formData),
                processData: false,
                contentType: false,
                dataType: 'json',

                success: function(response){
                    console.log(response.status)
                    if(response.status == 200){
                        console.log(response)
                        $('#successModal').modal('show');
                        $('.msg_success').text(response.message);
                        $('#submit-data').css('display','none')
                        window.scrollTo(0, 0);
                        setTimeout(function () {
                            window.location.href = "{{route('ctn.typeListHouse')}}";
                        }, 500);
                    }else{
                        $('#errorModal').modal('show');
                        $('.msg_error').text(response.message);
                    }
                    // Xử lý phản hồi từ máy chủ (nếu cần)
                },
                error: function(xhr, status, error){
                    // Xử lý lỗi (nếu có)
                }
            });
        });
    });





</script>



@endsection
