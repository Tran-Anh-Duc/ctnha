@extends("backend.layout.master")
@section('content')
@section('title', 'Manager User')

<div id="input-container">
    <!-- Ô input mẫu -->
    <div class="input-row" style="display: none" box="0">
        <input type="text" name="field_0" placeholder="Field 0" />
        <input type="text" name="field_a" placeholder="Field 1" />
        <input type="text" name="field_b" placeholder="Field 2" />
        <input type="text" name="field_3" placeholder="Field 3" />
        <button class="remove-row">Xóa</button>
        <!-- Thêm các ô input khác nếu cần -->
    </div>

    @foreach($view as $key => $value)
    <div class="input-row">
    <input type="text" name="field_0" placeholder="Field 0"  value="{{$value['id']}}"/>
    <input type="text" name="field_a" placeholder="Field 1" value="{{$value['name']}}"/>
    <input type="text" name="field_b" placeholder="Field 2" value="{{$value['name_slug']}}" />
    <input type="text" name="field_3" placeholder="Field 3"  value="{{$value['description']}}"/>
    <button class="remove-row">Xóa</button>
    </div>
    @endforeach
</div>
<button type="button" id="add-field">Thêm</button>
<button type="button" id="submit-data">Submit</button>



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
        //     // Sao chép ô input mẫu và thêm vào form
        //     var newRow = $('#input-container .input-row').first().clone();
        //     $('#input-container').append(newRow);
        // });

        // $('#add-field').click(function(){
        //     // Sao chép hàng mẫu ẩn và thêm vào form
        //     var newRow = $('.input-row:hidden').clone().removeAttr('style');
        //     $('#input-container').append(newRow);
        //     //$('.input-row').removeAttr('box')
        // });

        $('#add-field').click(function(){
            // Xóa thuộc tính "box" từ tất cả các hàng hiện có
            $('.input-row').removeAttr('box');

            // In ra hàng mẫu để kiểm tra
            console.log($('#input-container .input-row').first());

            // Sao chép ô input mẫu và thêm vào form
            var newRow = $('#input-container .input-row').first().clone();
            $('#input-container').append(newRow);
        });

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
            console.log(JSON.stringify(formData));
            $.ajax({
                url: '{{route('ctn.createTypeListHouse')}}',
                headers: {
                    "Content-Type": "application/json",
                    Accept: "application/json",
                    'x-csrf-token': csrf
                },
                type: 'POST',
                //data: {data: formData},
                //data: {data:JSON.stringify(formData)},
                data: JSON.stringify(formData),
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response){
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
