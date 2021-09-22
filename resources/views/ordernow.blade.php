@extends('master')
@section('content')
    <div class="custom-product">
        <div class="col-sm-10">
            <table class="table">
                <tbody>
                <tr>
                    <td>Amount</td>
                    <td>{{ $totalPrice }}</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>0 $</td>
                </tr>
                <tr>
                    <td>Delivery</td>
                    <td>10 $</td>
                </tr>
                <tr>
                    <td>Total Amount</td>
                    <td>{{ $totalPrice + 10 }}$</td>
                </tr>
                </tbody>
            </table>
            <div>
                <form action="/action_page.php">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" placeholder="Enter your address ..."></textarea>
                    </div>
                    <div class="form-group">
                        <label>Payment method</label>
                        <input type="radino" class="form-control" name="payment"> <span>online payment</span><br>
                        <input type="radino" class="form-control" name="payment"> <span>EMI payment</span><br>
                        <input type="radino" class="form-control" name="payment"> <span>Payment on delivery</span><br>
                    </div>
                    <button type="submit" class="btn btn-default">Order now</button>
                </form>
            </div>
        </div>
@endsection
