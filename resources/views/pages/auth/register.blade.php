@extends('layout.master2')

@section('content')
<div class="page-content d-flex align-items-center justify-content-center">

  <div class="row w-100 mx-0 auth-page">
    <div class="col-md-8 col-xl-6 mx-auto">
      <div class="card">
        <div class="row">
          <div class="col-md-4 pr-md-0">
            <div class="auth-left-wrapper" style="background-image: url({{ url('https://via.placeholder.com/219x452') }})">

            </div>
          </div>
          <div class="col-md-8 pl-md-0">
            <div class="auth-form-wrapper px-4 py-5">
              <a href="#" class="noble-ui-logo d-block mb-2">INVESTORS <span>CONNECT</span></a>
              <h5 class="text-muted font-weight-normal mb-4">Registration Form for Create a free account.</h5>

                <form class="forms-sample" action="{{url('/user/register')}}" method="POST">
                  @csrf
                  <div class="form-group">
                    <label for="username">Username / Email ID</label>
                    <input type="email" class="form-control" id="username" name="username" placeholder="User Name">
                  </div>
                  <!-- <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name">
                  </div>
                  <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name">
                  </div>
                  <div class="form-group">
                    <label for="designation">Designation</label>
                    <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation">
                  </div> -->
                  <div class="form-group">
                    <label for="phone">Mobile Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                  </div>
                  <!-- <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" class="form-control" id="country" name="country" placeholder="Country">
                  </div>
                   <div class="form-group">
                    <label for="organization">Organization</label>
                    <input type="text" class="form-control" id="Organization" name="Organization" placeholder="Organization">
                  </div>

                  <div class="form-group">
                    <label for="about_orgn">About Organization</label>
                    <textarea rows="3" class="form-control" id="about_orgn" name="about_orgn" placeholder="About Organization ....."></textarea>
                  </div>
                 
                  <div class="form-group">
                      <label for="password">Enter Password
                          <span class="text-danger">*</span>
                          <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Password Rule : Should be 8 characters combination of atleast 1 alphabet, 1 numeral and 1 special characters from @!#$%"></i></span>
                      </label>
                      <input type="password" id="password1" name="password1" class="form-control" placeholder="Enter Password">
                  </div>
                  <div class="form-group">
                      <label for="password">Re-Enter Password
                          <span class="text-danger">*</span>
                          <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter Password"></i></span>
                      </label>
                      <input type="password" id="password2" name="password2" class="form-control" placeholder="Enter Password">
                  </div>  -->

                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                      <button class="btn btn-primary submit" type="submit">Signup</button>
                </div>

                <a href="{{ url('/auth/login') }}" class="d-block mt-3 text-muted">Already Signed! login</a>
                
              </form>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection

@push('custom-scripts')
<script>
    $(function() {
        

        $.ajaxSetup({
            animation: "spinner"
        });

        $('.submit').click(function() {

            if($('#phone').val()=="" || $('#username').val()=="") {
                alert("User Name or Email ID, Phone fields should not be blank !!!");
                 return false;
            }

            // if($('#password1').val() === $('#password2').val()) {

            //         var regExp = /[_\-!@#$%;,.:]/;
            //         if(!regExp.test($('#password1').val())){
            //             alert("Need atleast 1 special character !!!");
            //             return false;
            //         } else {
            //             //alert("Yes OKKKK !!!");
            //             var regExp = /^.*(?=.{8,20})(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%&!-_]).*$/;
            //                 if(!regExp.test($('#password1').val())){
            //                     alert("Need atleast 1 Albhabet and 1 Number !!!");
            //                     return false;
            //                 } else {
            //                     //alert("Yes OKKKK !!!");
            //                     return true;
            //                 }
            //             return true;
            //         }

            // } else if(document.getElementById('password1').value.length < 8 || document.getElementById('password1').value.length > 20) {
            //     alert("Password length should between 8 to 30 characters !!!");
            //     return false;
            // }
            // else {
            //     alert("Password and Re-Enter password does not matches");
            //     return false;
            // }
           
            $('.dimback').show();
            $('#psdatasourcSpinner').show();
        });


    });
</script>
@endpush