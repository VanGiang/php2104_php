<form action="extend.php" method="get">
    <div class="input_money">
        Nhập Số tiền Cần Quy Đổi<br>
        <input type="text" name="so_tien_can_quy_doi" size="20"></input>
    </div>
    <div class="select_money">
        <p>Loại Tiền Cần Đổi </p>
        <select name= "option">
        	<option>VND -> USD</option>
        	<option>USD -> VND</option>
        	<option>EUR -> VND</option>
        	<option>VND -> EUR</option>
            <option>GBP -> VND</option>
            <option>VND -> GBP</option>
        </select>
    </div>
    <div class="submit_money">
        <input type="submit" value="Quy Đổi" size="10">
    </div>
    <div class="output_money">
        Số Tiền Sau Quy Đổi<br>
        <input type="text" name="so_tien_da_quy_doi" size="20"></input>
    </div>
</form>
<style type="text/css">
    .input_money{

        float: left;
    }
    .select_money{
        float: left;
        margin: 34px;
    }
    .select_money{
        float: left;
    }
    .output_money{
        float: left;
    }
    .submit_money {
        width: 90px;
        margin: 40px;
    }
    .select_money{
        float: left;
        margin: -16px 0px 60px 80px;
    }
</style>
