@extends("backend.layout.master")
@section('content')
@section('title', 'Manager User')

<div id="input-container">
    <!-- Ô input mẫu -->
    <div class="input-row">
        <input type="text" name="field_a" placeholder="Field 1" />
        <input type="text" name="field_b" placeholder="Field 2" />
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
            var formData = []; // Khởi tạo mảng để lưu trữ dữ liệu từ tất cả các dòng

            // Tìm tất cả các dòng input và lặp qua từng dòng
            $('#input-container .input-row').each(function(){
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
            });

            console.log(formData); // Hiển thị dữ liệu đã thu thập được trong console
            return false;
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
