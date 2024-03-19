@extends("backend.layout.master")
@section('content')
@section('title', 'Manager User')

<div id="input-container">
    <!-- Ô input mẫu -->
    <div class="input-row">
        <input type="text" name="field[]" placeholder="Field 1" />
        <input type="text" name="field[]" placeholder="Field 2" />
        <!-- Thêm các ô input khác nếu cần -->
    </div>
</div>
<button type="button" id="add-field">Thêm</button>
<button type="button" id="submit-data">Submit</button>



<script>
    $(document).ready(function(){
        $('#add-field').click(function(){
            // Sao chép ô input mẫu và thêm vào form
            var newRow = $('#input-container .input-row').first().clone();
            $('#input-container').append(newRow);
        });

        // Xử lý khi nhấp vào nút "Submit"
        $('#submit-data').click(function(){
            // Thu thập dữ liệu từ các ô input
            var formData = [];
            $('.input-row').each(function(){
                var inputs = $(this).find('input');
                var rowValues = [];
                inputs.each(function(){
                    rowValues.push($(this).val());
                });
                formData.push(rowValues);
            });

            // Gửi dữ liệu bằng Ajax
            $.ajax({
                url: 'url_xu_ly_logic.php', // Thay đổi thành địa chỉ URL xử lý logic của bạn
                type: 'POST',
                data: {data: formData},
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
