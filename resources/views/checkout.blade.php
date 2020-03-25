@extends('layouts.app')

@section('content')

@include('shared.breadcrumb', ['title' => 'Checkout'])

<!--================Checkout Area =================-->
<section class="checkout_area section-margin--small">
<div class="container">
	@guest
    <div class="returning_customer">
        <div class="check_title">
            <h2>Returning Customer? <a href="#">Click here to login</a></h2>
        </div>
        <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new
            customer, please proceed to the Billing & Shipping section.</p>
        <form class="row contact_form" action="#" method="post" novalidate="novalidate">
            <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" placeholder="Username or Email*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Username or Email*'" id="name" name="name">
                <!-- <span class="placeholder" data-placeholder="Username or Email"></span> -->
            </div>
            <div class="col-md-6 form-group p_star">
                <input type="password" class="form-control" placeholder="Password*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Password*'" id="password" name="password">
                <!-- <span class="placeholder" data-placeholder="Password"></span> -->
            </div>
            <div class="col-md-12 form-group">
                <button type="submit" value="submit" class="button button-login">login</button>
                <div class="creat_account">
                    <input type="checkbox" id="f-option" name="selector">
                    <label for="f-option">Remember me</label>
                </div>
                <a class="lost_pass" href="#">Lost your password?</a>
            </div>
        </form>
    </div>
    @endguest
    <div class="cupon_area">
        <div class="check_title">
            <h2>Have a coupon? <a href="#">Click here to enter your code</a></h2>
        </div>
        <input type="text" placeholder="Enter coupon code">
        <a class="button button-coupon" href="#">Apply Coupon</a>
    </div>
    <div class="billing_details">
        <div class="row">
            <div class="col-lg-8">
                <h3>Billing Details</h3>
                <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                    <div class="col-md-6 form-group p_star">
                        <input type="text" class="form-control" id="first" name="name">
                        <span class="placeholder" data-placeholder="First name"></span>
                    </div>
                    <div class="col-md-6 form-group p_star">
                        <input type="text" class="form-control" id="last" name="name">
                        <span class="placeholder" data-placeholder="Last name"></span>
                    </div>
                    <div class="col-md-12 form-group">
                        <input type="text" class="form-control" id="company" name="company" placeholder="Company name">
                    </div>
                    <div class="col-md-6 form-group p_star">
                        <input type="text" class="form-control" id="number" name="number">
                        <span class="placeholder" data-placeholder="Phone number"></span>
                    </div>
                    <div class="col-md-6 form-group p_star">
                        <input type="text" class="form-control" id="email" name="compemailany">
                        <span class="placeholder" data-placeholder="Email Address"></span>
                    </div>
                    <div class="col-md-12 form-group p_star">
                        <select class="country_select">
                            <option value="1">Country</option>
                            <option value="2">Country</option>
                            <option value="4">Country</option>
                        </select>
                    </div>
                    <div class="col-md-12 form-group p_star">
                        <input type="text" class="form-control" id="add1" name="add1">
                        <span class="placeholder" data-placeholder="Address line 01"></span>
                    </div>
                    <div class="col-md-12 form-group p_star">
                        <input type="text" class="form-control" id="add2" name="add2">
                        <span class="placeholder" data-placeholder="Address line 02"></span>
                    </div>
                    <div class="col-md-12 form-group p_star">
                        <input type="text" class="form-control" id="city" name="city">
                        <span class="placeholder" data-placeholder="Town/City"></span>
                    </div>
                    <div class="col-md-12 form-group p_star">
                        <select class="country_select">
                            <option value="1">District</option>
                            <option value="2">District</option>
                            <option value="4">District</option>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode/ZIP">
                    </div>
                    <div class="col-md-12 form-group">
                        <div class="creat_account">
                            <input type="checkbox" id="f-option2" name="selector">
                            <label for="f-option2">Create an account?</label>
                        </div>
                    </div>
                    <div class="col-md-12 form-group mb-0">
                        <div class="creat_account">
                            <h3>Shipping Details</h3>
                            <input type="checkbox" id="f-option3" name="selector">
                            <label for="f-option3">Ship to a different address?</label>
                        </div>
                        <textarea class="form-control" name="message" id="message" rows="1" placeholder="Order Notes"></textarea>
                    </div>
                </form>
            </div>
            <payment-card></payment-card>
        </div>
    </div>
</div>
</section>
<!--================End Checkout Area =================-->

@endsection