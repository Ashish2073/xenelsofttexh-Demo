<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}


        </h2>
    </x-slot>


    <style>
        body {
            background-color: #e6e6e6;
            width: 100%;
            height: 100%;
        }

        #success_tic .page-body {
            max-width: 300px;
            background-color: #FFFFFF;
            margin: 10% auto;
        }

        #success_tic .page-body .head {
            text-align: center;
        }

        /* #success_tic .tic{
  font-size:186px;
} */
        #success_tic .close {
            opacity: 1;
            position: absolute;
            right: 0px;
            font-size: 30px;
            padding: 3px 15px;
            margin-bottom: 10px;
        }

        #success_tic .checkmark-circle {
            width: 150px;
            height: 150px;
            position: relative;
            display: inline-block;
            vertical-align: top;
        }

        .checkmark-circle .background {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: #1ab394;
            position: absolute;
        }

        #success_tic .checkmark-circle .checkmark {
            border-radius: 5px;
        }

        #success_tic .checkmark-circle .checkmark.draw:after {
            -webkit-animation-delay: 300ms;
            -moz-animation-delay: 300ms;
            animation-delay: 300ms;
            -webkit-animation-duration: 1s;
            -moz-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-timing-function: ease;
            -moz-animation-timing-function: ease;
            animation-timing-function: ease;
            -webkit-animation-name: checkmark;
            -moz-animation-name: checkmark;
            animation-name: checkmark;
            -webkit-transform: scaleX(-1) rotate(135deg);
            -moz-transform: scaleX(-1) rotate(135deg);
            -ms-transform: scaleX(-1) rotate(135deg);
            -o-transform: scaleX(-1) rotate(135deg);
            transform: scaleX(-1) rotate(135deg);
            -webkit-animation-fill-mode: forwards;
            -moz-animation-fill-mode: forwards;
            animation-fill-mode: forwards;
        }

        #success_tic .checkmark-circle .checkmark:after {
            opacity: 1;
            height: 75px;
            width: 37.5px;
            -webkit-transform-origin: left top;
            -moz-transform-origin: left top;
            -ms-transform-origin: left top;
            -o-transform-origin: left top;
            transform-origin: left top;
            border-right: 15px solid #fff;
            border-top: 15px solid #fff;
            border-radius: 2.5px !important;
            content: '';
            left: 35px;
            top: 80px;
            position: absolute;
        }

        @-webkit-keyframes checkmark {
            0% {
                height: 0;
                width: 0;
                opacity: 1;
            }

            20% {
                height: 0;
                width: 37.5px;
                opacity: 1;
            }

            40% {
                height: 75px;
                width: 37.5px;
                opacity: 1;
            }

            100% {
                height: 75px;
                width: 37.5px;
                opacity: 1;
            }
        }

        @-moz-keyframes checkmark {
            0% {
                height: 0;
                width: 0;
                opacity: 1;
            }

            20% {
                height: 0;
                width: 37.5px;
                opacity: 1;
            }

            40% {
                height: 75px;
                width: 37.5px;
                opacity: 1;
            }

            100% {
                height: 75px;
                width: 37.5px;
                opacity: 1;
            }
        }

        @keyframes checkmark {
            0% {
                height: 0;
                width: 0;
                opacity: 1;
            }

            20% {
                height: 0;
                width: 37.5px;
                opacity: 1;
            }

            40% {
                height: 75px;
                width: 37.5px;
                opacity: 1;
            }

            100% {
                height: 75px;
                width: 37.5px;
                opacity: 1;
            }
        }
    </style>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}



                </div>

                @if (Auth::user()->role == 'User')
                    <div class="p-6 text-gray-900">
                        <h1>{{ Auth::user()->name }}<h1>
                    </div>
                    <div class="p-6 text-gray-900">
                        <h1>{{ Auth::user()->username }}<h1>
                    </div>

                    <div class="p-6 text-gray-900">
                        <h1>{{ Auth::user()->email }}<h1>
                    </div>
                    <div class="p-6 text-gray-900">
                        <h1>{{ Auth::user()->mobile }}<h1>
                    </div>

                    <div class="p-6 text-gray-900">
                        <h1>{{ Auth::user()->address }}<h1>
                    </div>
                @endif






            </div>



            @if (Auth::user()->role == 'Admin')
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="p-1 text-gray-900">

                                Total Active Users - {{ $users->count() }}

                            </div>
                        </div>
                        <div class="col-lg-2">
                            <button type="button" class="btn bg-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Add More User
                            </button>

                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center" id="exampleModalLabel">Registration Form
                                            </h5>
                                            <h3 id="successmessageadduser"></h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3 row">
                                                <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control-plaintext" id="username"
                                                        value="">
                                                </div>
                                                <div>
                                                    <h1 id="errorname"></h1>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="useremail"
                                                        name="useremail">
                                                </div>
                                                <div>
                                                    <h1 id="erroremail"></h1>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputPassword"
                                                    class="col-sm-2 col-form-label">Mobile</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="usermobile"
                                                        name="usermobile">
                                                </div>
                                                <div>
                                                    <h1 id="errormobile"></h1>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputPassword"
                                                    class="col-sm-2 col-form-label">Address</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="useraddress"
                                                        name="useraddress">
                                                </div>
                                                <div>
                                                    <h1 id="erroraddress"></h1>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputPassword"
                                                    class="col-sm-2 col-form-label">Status</label>
                                                <select class="form-select" aria-label="Default select example"
                                                    id="userStatus">
                                                    <option selected disabled>Select Status</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>

                                                </select>
                                                <div>
                                                    <h1 id="errorstatus"></h1>
                                                </div>
                                            </div>

                                            <div class="mb-3 row" id="divpassword">
                                                <label for="inputPassword"
                                                    class="col-sm-2 col-form-label">Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="userpassword"
                                                        name="password">
                                                </div>
                                                <div>
                                                    <h1 id="errorpassword"></h1>
                                                </div>
                                            </div>


                                            <div class="mb-3 row" id="divcpassword">
                                                <label for="inputPassword" class="col-sm-2 col-form-label">Confirm
                                                    Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control"
                                                        id="userpassword_confirmation" name="password_confirmation">
                                                </div>
                                                <div>
                                                    <h1 id="errorcpassword"></h1>
                                                </div>
                                            </div>




                                            <button type="button" class="btn bg-success mt-3 m-auto"
                                                data-toggle="modal" id="usersave"
                                                data-target="#success_tic">Save</button>

                                        </div>
                                        {{-- <div class="modal-footer"> --}}
                                        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                        {{-- </div> --}}
                                    </div>
                                </div>
                            </div>



                            <div class="modal fade" id="exampleModal1" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center" id="exampleModalLabel">Update Form
                                            </h5>
                                            <h3 id="successmessageupdateuser"></h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3 row">
                                                <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control-plaintext" hidden
                                                        id="usersId" value="">




                                                    <input type="text" class="form-control-plaintext"
                                                        id="username1" value="">
                                                </div>
                                                <div>
                                                    <h1 id="errornameedit"></h1>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputPassword"
                                                    class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="useremail1"
                                                        name="useremail">
                                                </div>
                                                <div>
                                                    <h1 id="erroremailedit"></h1>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputPassword"
                                                    class="col-sm-2 col-form-label">Mobile</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="usermobile1"
                                                        name="usermobile">
                                                </div>
                                                <div>
                                                    <h1 id="errormobileedit"></h1>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputPassword"
                                                    class="col-sm-2 col-form-label">Address</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="useraddress1"
                                                        name="useraddress">
                                                </div>
                                                <div>
                                                    <h1 id="erroraddressedit"></h1>
                                                </div>
                                            </div>

                                            <select class="form-select" aria-label="Default select example"
                                                id="userStatusEdit">
                                                <option selected disabled>Select Status</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>

                                            </select>

                                            <div>
                                                <h1 id="errorstatusedit"></h1>
                                            </div>



                                            <button type="button" class="btn bg-success mt-3 m-auto"
                                                data-toggle="modal" id="updateButton"
                                                data-target="#success_tic">Update</button>

                                        </div>
                                        {{-- <div class="modal-footer"> --}}
                                        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                        {{-- </div> --}}
                                    </div>
                                </div>
                            </div>





                        </div>

                        {{-- sucess modalll --}}

                        {{-- <div id="success_tic" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <a class="close" href="#" data-dismiss="modal">&times;</a>
                                        <div class="page-body">
                                            <div class="head">
                                                <h3 style="margin-top:5px;">Lorem ipsum dolor sit amet</h3>
                                                <h4>Lorem ipsum dolor sit amet</h4>
                                            </div>

                                            <h1 style="text-align:center;">
                                                <div class="checkmark-circle">
                                                    <div class="background"></div>
                                                    <div class="checkmark draw"></div>
                                                </div>
                                                <h1>

                                        </div>
                                    </div>
                                </div>

                            </div> --}}
























                        {{-- <div class="col-lg-4 p-1">
                  <div class="input-group" style="border-radius: 3px solid">
                    <input class="form-control border-end-0 border rounded-pill" type="search" value="search" id="example-search-input">
                    <span class="input-group-append">
                        <button class="btn btn-outline-secondary border rounded-pill ms-n5"  type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div> --}}
                    </div>
                </div>


        </div>
        <table class="table table-bordered data-table" id="users_table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Address</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">status</th>

                    <th scope="col">Action</th>
                </tr>
            </thead>
            {{-- <tbody>
                  @php $i=1;@endphp
                  @foreach ($users as $data)
                  <tr>

                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->username }}</td>
                    <td>{{ $data->address }}</td>
                    <td>{{ $data->mobile }}</td>
                    <td>{{ $data->email }}</td>
                    <td> <button class="bg-danger">delete<button>&nbsp;&nbsp;<button class="bg-success">edit</button></td>
                  </tr>
                 
                @endforeach
                </tbody> --}}
            <tbody>
            </tbody>
        </table>
        @endif
    </div>

    </div>
    <script>

        let successMessageUser=document.getElementById('successmessageadduser');
        let successMessageUpdate=document.getElementById('successmessageupdateuser');

        let userName = document.getElementById('username');
        let userNameEdit = document.getElementById('username1');
        let userId = document.getElementById('usersId');

        let userEmail = document.getElementById('useremail');
        let userEmailEdit = document.getElementById('useremail1');

        let userMobile = document.getElementById('usermobile');
        let userMobileEdit = document.getElementById('usermobile1');

        let userAddress = document.getElementById('useraddress');
        let userAddressEdit = document.getElementById('useraddress1');


        let userPassword = document.getElementById('userpassword');
        let userConfirmPassword = document.getElementById('userpassword_confirmation');

        let userStatus = document.getElementById('userStatus');
        let userStatusEdit = document.getElementById('userStatusEdit');

        let saveButton = document.getElementById('usersave');
        let updateButton = document.getElementById('updateButton');

        let divpassword = document.getElementById('divpassword');
        let divConfirmpassword = document.getElementById('divcpassword');

        let errorname = document.getElementById('errorname');
        let erroremail = document.getElementById('erroremail');
        let erroraddress = document.getElementById('erroraddress');
        let errormobile = document.getElementById('errormobile');
        let errorstatus = document.getElementById('errorstatus');
        let errorpassword = document.getElementById('errorpassword');
        let errorcpassword = document.getElementById('errorcpassword');



        let errornameedit = document.getElementById('errornameedit');
        let erroremailedit = document.getElementById('erroremailedit');
        let erroraddressedit = document.getElementById('erroraddressedit');
        let errormobileedit = document.getElementById('errormobileedit');
        let errorstatusedit = document.getElementById('errorstatusedit');






        document.getElementById('usersave').addEventListener("click", function saveusersdata() {




            $.ajax({
                type: "POST",
                url: "{{ url('adduser') }}",

                data: {
                    name: userName.value,
                    address: userAddress.value,
                    mobile: userMobile.value,
                    password: userPassword.value,
                    password_confirmation: userConfirmPassword.value,
                    email: userEmail.value,
                    status: userStatus.value,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },

                success: function(response) {
                    var oTable = $('#users_table').dataTable();
                    oTable.fnDraw(false);
                    errorname.style.display = "none";

                    erroremail.style.display = "none";

                    erroraddress.style.display = "none";

                    errormobile.style.display = "none";

                    errorstatus.style.display = "none";

                    errorpassword.style.display = "none";

                    successMessageUser.style.color="green";
                    successMessageUser.style.display="block";
                    successMessageUser.innerHTML="Users Data Add SuccessFully";


                },
                error: function(data) {
                    console.log(data.responseJSON.errors);
                    successMessageUser.style.display="none";
                    errorname.style.display = "block";

                    erroremail.style.display = "block";

                    erroraddress.style.display = "block";

                    errormobile.style.display = "block";

                    errorstatus.style.display = "block";

                    errorpassword.style.display = "block";
                    if (data.responseJSON.errors.name) {
                        errorname.style.color = "red";
                        errorname.innerHTML = data.responseJSON.errors.name[0];
                    }

                    if (data.responseJSON.errors.email) {
                        erroremail.style.color = "red";
                        erroremail.innerHTML = data.responseJSON.errors.email[0];
                    }

                    if (data.responseJSON.errors.address) {
                        erroraddress.style.color = "red";
                        erroraddress.innerHTML = data.responseJSON.errors.address[0];
                    }

                    if (data.responseJSON.errors.mobile) {
                        errormobile.style.color = "red";
                        errormobile.innerHTML = data.responseJSON.errors.mobile[0];
                    }

                    if (data.responseJSON.errors.status) {
                        errorstatus.style.color = "red";
                        errorstatus.innerHTML = data.responseJSON.errors.status[0];
                    }


                    if (data.responseJSON.errors.password) {
                        errorpassword.style.color = "red";
                        errorpassword.innerHTML = data.responseJSON.errors.password[0];
                    }


                }

            });


        });





        function edit(value) {
            $.ajax({
                type: "POST",
                url: "{{ url('edituser') }}",
                data: {
                    id: value,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',

                success: function(res) {
                    console.log(res);
                    userId.value = res[0].id;
                    userNameEdit.value = res[0].name;
                    userEmailEdit.value = res[0].email;
                    userMobileEdit.value = res[0].mobile;
                    userAddressEdit.value = res[0].address;
                    userStatusEdit.value = res[0].status;

                }
            });

        };


        document.getElementById('updateButton').addEventListener("click", function saveusersdata() {




            $.ajax({
                type: "POST",
                url: "{{ url('adduser') }}",

                data: {
                    id: userId.value,
                    name: userNameEdit.value,
                    address: userAddressEdit.value,
                    mobile: userMobileEdit.value,
                    email: userEmailEdit.value,
                    status: userStatusEdit.value,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },

                success: function(response) {
                    console.log(response);
                    var oTable = $('#users_table').dataTable();
                    oTable.fnDraw(false);
                    errornameedit.style.display = "none";

                    erroremailedit.style.display = "none";

                    erroraddressedit.style.display = "none";

                    errormobileedit.style.display = "none";

                    errorstatusedit.style.display = "none";

                    successMessageUpdate.style.color="green";
                    successMessageUpdate.style.display="block";
                    successMessageUpdate.innerHTML="Users Data Update SuccessFully";



                },
                error: function(data) {
                    console.log(data);

                    errornameedit.style.display = "block";

                    erroremailedit.style.display = "block";

                    erroraddressedit.style.display = "block";

                    errormobileedit.style.display = "block";

                    errorstatusedit.style.display = "block";

                    successMessageUpdate.style.display="none";




                    if (data.responseJSON.errors.name) {
                        errornameedit.style.color = "red";
                        errornameedit.innerHTML = data.responseJSON.errors.name[0];
                    }

                    if (data.responseJSON.errors.email) {
                        erroremailedit.style.color = "red";
                        erroremail.innerHTML = data.responseJSON.errors.email[0];
                    }

                    if (data.responseJSON.errors.address) {
                        erroraddressedit.style.color = "red";
                        erroraddressedit.innerHTML = data.responseJSON.errors.address[0];
                    }

                    if (data.responseJSON.errors.mobile) {
                        errormobileedit.style.color = "red";
                        errormobileedit.innerHTML = data.responseJSON.errors.mobile[0];
                    }

                    if (data.responseJSON.errors.status) {
                        errorstatusedit.style.color = "red";
                        errorstatusedit.innerHTML = data.responseJSON.errors.status[0];
                    }

                }

            });


        });






        function deleteuser(value) {
            if (confirm("Delete Record?") == true) {
                var id = value;

                $.ajax({
                    type: "POST",
                    url: "{{ url('deleteuser') }}",
                    data: {
                        id: id,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    success: function(res) {
                        var oTable = $('#users_table').dataTable();
                        oTable.fnDraw(false);
                    }
                });
            }
        };



        $(function() {

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('userlist') }}",
                columns: [{
                        data: 'DT_RowIndex',

                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'mobile',
                        name: 'mobile'
                    },
                    {
                        data: 'status',
                        name: 'status',

                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },

                ]
            });



        });
    </script>
</x-app-layout>
